<?php

namespace App\Http\Controllers;

use App\Models\About;
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
        return view('dashboard', compact('wisata', 'produk', 'about'));
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
}
