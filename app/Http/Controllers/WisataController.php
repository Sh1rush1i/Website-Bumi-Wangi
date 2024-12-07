<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Wisata;
use App\Http\Controllers\Controller;
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
        return view('wisata', compact('wisata', 'media'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWisataRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('images/wisata', 'public');
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos/wisata', 'public');
        }

        // Create a new Wisata entry
        $wisata = Wisata::create($validated);

        // Add SweetAlert success message
        alert()->success('Success', 'Wisata berhasil ditambahkan');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisata $wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWisataRequest $request, Wisata $wisata)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('images/wisata', 'public');
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos/wisata', 'public');
        }

        // Update the Wisata entry
        $wisata->update($validated);

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
        $wisata->delete();

        // Add SweetAlert success message
        alert()->success('Success', 'Wisata berhasil dihapus');

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }
}
