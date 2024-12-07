<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Produk;
use App\Http\Controllers\Controller;
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
    public function store(StoreProdukRequest $request)
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

        // Create a new Produk entry
        $produk = Produk::create($validated);

        // Add SweetAlert success message
        alert()->success('Success', 'Produk berhasil ditambahkan');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
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
        //
    }
}
