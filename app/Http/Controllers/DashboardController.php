<?php

namespace App\Http\Controllers;

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
        return view('dashboard', compact('wisata', 'produk'));
    }

    public function homepage()
    {
        $wisata = Wisata::all();
        $produk = Produk::all();
        return view('index', compact('wisata', 'produk'));
    }
}
