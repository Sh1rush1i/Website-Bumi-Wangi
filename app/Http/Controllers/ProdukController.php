<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Media;
use App\Models\Video;
use App\Models\Produk;
use App\Models\Image360;
use App\Models\Video360;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('product', compact('produk', 'media'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'satuan' => 'required|string|max:100',
            // 'gambar' => 'required|array|min:1',
            'gambar.*' => 'required|image|mimes:jpg,jpeg,png|max:10240', // Max size: 10MB per image
            'video' => 'nullable|mimes:mp4,mov,avi,mkv|max:51200', // Max size: 50MB
            '360gambar.360' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Max size: 20MB
            '360video.360' => 'nullable|mimes:mp4|max:51200', // Max size: 50MB
        ]);

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

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('images/produk', 'public');
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos/produk', 'public');
        }

        // Update the Produk entry
        $produk->update($validated);

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
        $produk->delete();

        // Add SweetAlert success message
        alert()->success('Success', 'Produk berhasil dihapus');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }
}
