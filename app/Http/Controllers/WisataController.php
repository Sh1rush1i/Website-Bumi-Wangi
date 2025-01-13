<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Media;
use App\Models\Video;
use App\Models\Wisata;
use App\Models\Image360;
use App\Models\Video360;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreWisataRequest;
use App\Http\Requests\UpdateWisataRequest;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wisata = Wisata::all();
        $media = Media::first();
        $image = Image::all();
        return view('wisata', compact('wisata', 'media', 'image'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWisataRequest $request)
    {
        $validated = $request->validated();

        $wisata = new Wisata;
        $wisata->nama = $request->nama;
        $wisata->deskripsi = $request->deskripsi;
        $wisata->harga = $request->harga;
        $wisata->satuan = $request->satuan;
        $wisata->save();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images/wisata', 'public');
                $image = new Image;
                $image->wisata_id = $wisata->id;
                $image->path = $path;
                $image->save();
            }
        }

        if ($request->hasFile('360gambar')) {
            $validated['360gambar'] = $request->file('360gambar')->store('images/360/wisata', 'public');
            $image360 = new Image360;
            $image360->wisata_id = $wisata->id;
            $image360->path = $validated['360gambar'];
            $image360->save();
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos/wisata', 'public');
            $video = new Video;
            $video->wisata_id = $wisata->id;
            $video->path = $validated['video'];
            $video->save();
        }

        if ($request->hasFile('360video')) {
            $validated['360video'] = $request->file('360video')->store('videos/360/wisata', 'public');
            $video360 = new Video360;
            $video360->wisata_id = $wisata->id;
            $video360->path = $validated['360video'];
            $video360->save();
        }

        // Add SweetAlert success message
        alert()->success('Success', 'Wisata berhasil ditambahkan');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWisataRequest $request, Wisata $wisata)
    {
        $validated = $request->validated();

        $_wisata = Wisata::findOrFail($wisata->id);
        $_wisata->nama = $request->nama;
        $_wisata->deskripsi = $request->deskripsi;
        $_wisata->harga = $request->harga;
        $_wisata->satuan = $request->satuan;
        $_wisata->save();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            foreach (Image::where('wisata_id', $wisata->id)->get() as $image) {
                Storage::disk('public')->delete($image->path);
            }
            Image::where('wisata_id', $wisata->id)->delete();
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images/wisata', 'public');
                $image = new Image;
                $image->wisata_id = $wisata->id;
                $image->path = $path;
                $image->save();
            }
        }

        if ($request->hasFile('360gambar')) {
            Storage::disk('public')->delete(Image360::where('wisata_id', $wisata->id)->pluck('path')->toArray());
            Image360::where('wisata_id', $wisata->id)->delete();
            $validated['360gambar'] = $request->file('360gambar')->store('images/360/wisata', 'public');
            $image360 = new Image360;
            $image360->wisata_id = $wisata->id;
            $image360->path = $validated['360gambar'];
            $image360->save();
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            Storage::disk('public')->delete(Video::where('wisata_id', $wisata->id)->pluck('path')->toArray());
            Video::where('wisata_id', $wisata->id)->delete();
            $validated['video'] = $request->file('video')->store('videos/wisata', 'public');
            $video = new Video;
            $video->wisata_id = $wisata->id;
            $video->path = $validated['video'];
            $video->save();
        }

        if ($request->hasFile('360video')) {
            Storage::disk('public')->delete(Video360::where('wisata_id', $wisata->id)->pluck('path')->toArray());
            Video360::where('wisata_id', $wisata->id)->delete();
            $validated['360video'] = $request->file('360video')->store('videos/360/wisata', 'public');
            $video360 = new Video360;
            $video360->wisata_id = $wisata->id;
            $video360->path = $validated['360video'];
            $video360->save();
        }

        // Add SweetAlert success message
        alert()->success('Success', 'Wisata berhasil diubah');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisata $wisata)
    {

        // Delete associated images
        foreach (Image::where('wisata_id', $wisata->id)->get() as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        // Delete associated 360 images
        foreach (Image360::where('wisata_id', $wisata->id)->get() as $image360) {
            Storage::disk('public')->delete($image360->path);
            $image360->delete();
        }

        // Delete associated videos
        foreach (Video::where('wisata_id', $wisata->id)->get() as $video) {
            Storage::disk('public')->delete($video->path);
            $video->delete();
        }

        // Delete associated 360 videos
        foreach (Video360::where('wisata_id', $wisata->id)->get() as $video360) {
            Storage::disk('public')->delete($video360->path);
            $video360->delete();
        }

        // Delete the wisata
        $wisata->delete();

        // Add SweetAlert success message
        alert()->success('Success', 'Wisata berhasil dihapus');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }
}
