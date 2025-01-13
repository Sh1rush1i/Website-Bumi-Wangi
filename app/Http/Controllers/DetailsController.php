<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Video;
use App\Models\Produk;
use App\Models\Wisata;
use App\Models\Image360;
use App\Models\Video360;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController
{
    public function show($type, $id)
    {
        if ($type === 'produk') {
            $detail = Produk::find($id);
            $image = Image::where('produk_id', $id)->get();
            $video = Video::where('produk_id', $id)->first();
            $image360 = Image360::where('produk_id', $id)->first();
            $video360 = Video360::where('produk_id', $id)->first();
        } elseif ($type === 'wisata') {
            $detail = Wisata::find($id);
            $image = Image::where('wisata_id', $id)->get();
            $video = Video::where('wisata_id', $id)->first();
            $image360 = Image360::where('wisata_id', $id)->first();
            $video360 = Video360::where('wisata_id', $id)->first();
        } else {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        if (!$detail) {
            return response()->json(['error' => 'Detail not found'], 404);
        }

        return view('details', compact('detail', 'image', 'video', 'image360', 'video360'));
    }
}
