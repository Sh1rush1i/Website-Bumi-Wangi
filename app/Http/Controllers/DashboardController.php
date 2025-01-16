<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Image;
use App\Models\Media;
use App\Models\Video;
use App\Models\Produk;
use App\Models\Wisata;
use App\Models\pesanan;
use App\Models\Image360;
use App\Models\Video360;
use Illuminate\Http\Request;
use App\Models\payment_method;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $wisata = Wisata::all();
        $produk = Produk::all();
        $about = About::first();
        $media = Media::first();
        $pesanan = pesanan::all();
        $metode = payment_method::all();
        $image = Image::all();
        $image360 = Image360::all();
        $video = Video::all();
        $video360 = Video360::all();

        if (request()->ajax()) {
            return DataTables::of($pesanan)
                ->addColumn('nama_produk', function ($pesanan) {
                    return $pesanan->nama_produk;
                })
                ->addColumn('name', function ($pesanan) {
                    return $pesanan->name;
                })
                ->addColumn('alamat', function ($pesanan) {
                    return $pesanan->alamat;
                })
                ->addColumn('no_hp', function ($pesanan) {
                    return $pesanan->no_hp;
                })
                ->addColumn('jumlah', function ($pesanan) {
                    return $pesanan->jumlah;
                })
                ->addColumn('harga', function ($pesanan) {
                    return $pesanan->total_harga;
                })
                ->make(true);
        }

        return view('dashboard', compact(
            'wisata',
            'produk',
            'about',
            'media',
            'pesanan',
            'metode',
            'image',
            'image360',
            'video',
            'video360'
        ));
    }

    public function homepage()
    {
        $wisata = Wisata::all();
        $produk = Produk::all();
        $media = Media::first();
        $image = Image::all();
        $image360 = Image360::all();
        $video = Video::all();
        $video360 = Video360::all();
        return view('index', compact(
            'wisata',
            'produk',
            'media',
            'image',
            'image360',
            'video',
            'video360'
        ));
    }

    public function about(Request $request)
    {
        try {
            // Validate the input
            $validated = $request->validate([
            'text' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            ]);

            // Check if an 'About' record already exists
            $about = About::first();

            if ($about) {

            if ($request->hasFile('image')) {
                if ($about->image) {
                // Delete the existing image
                Storage::disk('public')->delete($about->image);
                }

                // Store the new image
                $validated['image'] = $request->file('image')->store('images/about', 'public');
            }

            // Update the existing record, only if 'text' is not empty
            if (!empty($validated['text'])) {
                $about->text = $validated['text'];
            }

            // Update the image if it exists in the request
            if (isset($validated['image'])) {
                $about->image = $validated['image'];
            }

            $about->save();

            // SweetAlert success message for update
            alert()->success('Success', 'About berhasil diupdate');
            } else {

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('images/about', 'public');
            }

            // Create a new record
            About::create($validated);

            // SweetAlert success message for creation
            alert()->success('Success', 'About berhasil ditambahkan');
            }

            // Redirect to the dashboard
            return redirect()->route('dashboard');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // SweetAlert error for validation failure
            alert()->error('Error', 'Validation error: ' . $e->getMessage());

            // Redirect back with input and validation errors
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    public function media(Request $request)
    {
        try {
            // Validate the input
            $validated = $request->validate([
                'facebook' => 'nullable',
                'instagram' => 'nullable',
                'twitter' => 'nullable',
                'youtube' => 'nullable',
                'tiktok' => 'nullable',
                'telepon' => 'required',
                'email' => 'required',
                'alamat' => 'nullable',
                'whatsapp' => 'required',
            ]);

            // Check if a Media record already exists
            $media = Media::first();

            if ($media) {
                // Update the existing record
                $media->update($validated);

                // SweetAlert success message for update
                alert()->success('Success', 'Media sosial berhasil diupdate');
            } else {
                // Create a new record
                Media::create($validated);

                // SweetAlert success message for creation
                alert()->success('Success', 'Media sosial berhasil ditambahkan');
            }

            // Redirect to the dashboard
            return redirect()->route('dashboard');

        } catch (QueryException $e) {
            // Log the error (optional for debugging)

            // SweetAlert error message for failure
            alert()->error('Error', 'Terjadi kesalahan saat menyimpan data media sosial');

            // Redirect back with input and error
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            // Log the error (optional for debugging)

            // SweetAlert error message for unexpected failures
            alert()->error('Error', 'Nomor Telepon, email, dan link chat whatsapp harus diisi');

            // Redirect back with input and error
            return redirect()->back()->withInput();
        }
    }

    public function storeMetode(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
            'pemilik' => 'required',
            'no_rek' => 'required',
        ]);

        payment_method::create($validated);

        alert()->success('Success', 'Metode pembayaran berhasil ditambahkan');

        return redirect()->route('dashboard');
    }

    public function updateMetode(Request $request, payment_method $metode)
    {
        $validated = $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
            'pemilik' => 'required',
            'no_rek' => 'required',
        ]);

        $metode->update($validated);

        alert()->success('Success', 'Metode pembayaran berhasil diupdate');

        return redirect()->route('dashboard');
    }

    public function deleteMetode(payment_method $metode)
    {
        $metode->delete();

        alert()->success('Success', 'Metode pembayaran berhasil dihapus');

        return redirect()->route('dashboard');
    }
}
