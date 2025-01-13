<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Media;
use App\Models\Video;
use App\Models\Produk;
use App\Models\Image360;
use App\Models\Video360;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        $media = Media::first();
        $image = Image::all();
        return view('product', compact('produk', 'media', 'image'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        $validated = $request->validated();

        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->satuan = $request->satuan;
        $produk->save();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images/produk', 'public');
                $image = new Image;
                $image->produk_id = $produk->id;
                $image->path = $path;
                $image->save();
            }
        }

        if ($request->hasFile('360gambar')) {
            $validated['360gambar'] = $request->file('360gambar')->store('images/360/produk', 'public');
            $image360 = new Image360;
            $image360->produk_id = $produk->id;
            $image360->path = $validated['360gambar'];
            $image360->save();
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos/produk', 'public');
            $video = new Video;
            $video->produk_id = $produk->id;
            $video->path = $validated['video'];
            $video->save();
        }

        if ($request->hasFile('360video')) {
            $validated['360video'] = $request->file('360video')->store('videos/360/produk', 'public');
            $video360 = new Video360;
            $video360->produk_id = $produk->id;
            $video360->path = $validated['360video'];
            $video360->save();
        }

        // Add SweetAlert success message
        alert()->success('Success', 'Produk berhasil ditambahkan');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $validated = $request->validated();

        $_produk = Produk::findOrFail($produk->id);
        $_produk->nama = $request->nama;
        $_produk->deskripsi = $request->deskripsi;
        $_produk->harga = $request->harga;
        $_produk->satuan = $request->satuan;
        $_produk->save();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            foreach (Image::where('produk_id', $produk->id)->get() as $image) {
                Storage::disk('public')->delete($image->path);
            }
            Image::where('produk_id', $produk->id)->delete();
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images/produk', 'public');
                $image = new Image;
                $image->produk_id = $produk->id;
                $image->path = $path;
                $image->save();
            }
        }

        if ($request->hasFile('360gambar')) {
            Storage::disk('public')->delete(Image360::where('produk_id', $produk->id)->pluck('path')->toArray());
            Image360::where('produk_id', $produk->id)->delete();
            $validated['360gambar'] = $request->file('360gambar')->store('images/360/produk', 'public');
            $image360 = new Image360;
            $image360->produk_id = $produk->id;
            $image360->path = $validated['360gambar'];
            $image360->save();
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            Storage::disk('public')->delete(Video::where('produk_id', $produk->id)->pluck('path')->toArray());
            Video::where('produk_id', $produk->id)->delete();
            $validated['video'] = $request->file('video')->store('videos/produk', 'public');
            $video = new Video;
            $video->produk_id = $produk->id;
            $video->path = $validated['video'];
            $video->save();
        }

        if ($request->hasFile('360video')) {
            Storage::disk('public')->delete(Video360::where('produk_id', $produk->id)->pluck('path')->toArray());
            Video360::where('produk_id', $produk->id)->delete();
            $validated['360video'] = $request->file('360video')->store('videos/360/produk', 'public');
            $video360 = new Video360;
            $video360->produk_id = $produk->id;
            $video360->path = $validated['360video'];
            $video360->save();
        }

        // Add SweetAlert success message
        alert()->success('Success', 'Produk berhasil diubah');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Delete associated images
        foreach (Image::where('produk_id', $produk->id)->get() as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        // Delete associated 360 images
        foreach (Image360::where('produk_id', $produk->id)->get() as $image360) {
            Storage::disk('public')->delete($image360->path);
            $image360->delete();
        }

        // Delete associated videos
        foreach (Video::where('produk_id', $produk->id)->get() as $video) {
            Storage::disk('public')->delete($video->path);
            $video->delete();
        }

        // Delete associated 360 videos
        foreach (Video360::where('produk_id', $produk->id)->get() as $video360) {
            Storage::disk('public')->delete($video360->path);
            $video360->delete();
        }

        // Delete the product
        $produk->delete();

        // Add SweetAlert success message
        alert()->success('Success', 'Produk berhasil dihapus');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }
}
