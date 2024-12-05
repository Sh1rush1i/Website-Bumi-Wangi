<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Media;
use App\Models\Produk;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $wisata = Wisata::all();
        $produk = Produk::all();
        $about = About::first();
        $media = Media::first();
        return view('dashboard', compact(
            'wisata',
            'produk',
            'about',
            'media'
        ));
    }

    public function homepage()
    {
        $wisata = Wisata::all();
        $produk = Produk::all();
        $about = About::first();
        return view('index', compact('wisata', 'produk', 'about'));
    }

    public function about(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);

        $about = About::first();

        if ($about) {
            $about->update($validated);

            return redirect()->route('dashboard')->with('success', 'About berhasil diupdate');
        } else {
            About::create($validated);

            return redirect()->route('dashboard')->with('success', 'About berhasil ditambahkan');
        }
    }

    public function media(Request $request)
    {
        $validated = $request->validate([
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'tiktok' => 'nullable',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'nullable',
            'whatsapp' => 'nullable',
        ]);

        $media = Media::first();

        if ($media) {
            $media->update($validated);

            return redirect()->route('dashboard')->with('success', 'Media sosial berhasil diupdate');
        } else {
            Media::create($validated);

            return redirect()->route('dashboard')->with('success', 'Media sosial berhasil ditambahkan');
        }

    }
}
