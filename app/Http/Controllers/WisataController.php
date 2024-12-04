<?php

namespace App\Http\Controllers;

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
        return view('wisata', compact('wisata'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWisataRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('images/wisata', 'public');
        }

        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos/wisata', 'public');
        }

        $wisata = Wisata::create($validated);

        return redirect()->route('dashboard')->with('success', 'Wisata berhasil ditambahkan');
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

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('images/wisata', 'public');
        }

        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos/wisata', 'public');
        }

        $wisata->update($validated);

        return redirect()->route('dashboard')->with('success', 'Wisata berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisata $wisata)
    {
        //
    }
}
