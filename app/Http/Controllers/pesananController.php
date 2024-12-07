<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Models\payment_method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pesananController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->check()) {
            alert()->error('Error', 'You must be logged in to view this page.');
            return redirect()->route('user-login')->with('error', 'You must be logged in to view this page.');
        }
        $item = [
            'id_produk' => $request->id_produk,
            'type' => $request->type,
            'nama_produk' => $request->nama_produk, // Match the input name
            'harga' => $request->harga,
            'gambar_produk' => $request->gambar_produk, // Match the input name
        ];

        $method = payment_method::all();
        // Pass the data to the 'book' view
        return view('book', compact('item', 'method'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required',
            'id_produk' => 'required',
            'type' => 'required',
            'nama_produk' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jumlah' => 'required',
            'total_harga' => 'required',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('images/bukti_pembayaran', 'public');
        }

        pesanan::create($validated);

        alert()->success('Success', 'Pesanan berhasil dibuat, untuk informasi lebih lanjut silahkan untuk menghubungi whatsapp');

        return redirect()->route('index')->with('success', 'Pesanan created successfully');
    }
}
