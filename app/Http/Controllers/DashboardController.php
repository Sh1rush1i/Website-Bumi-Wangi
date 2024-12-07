<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Media;
use App\Models\payment_method;
use App\Models\Produk;
use App\Models\Wisata;
use App\Models\pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Yajra\DataTables\DataTables;

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
            'metode'
        ));
    }

    public function homepage()
    {
        $wisata = Wisata::all();
        $produk = Produk::all();
        $media = Media::first();
        return view('index', compact('wisata', 'produk', 'media'));
    }

    public function about(Request $request)
    {
        try {
            // Validate the input
            $validated = $request->validate([
                'text' => 'required',
            ], [
                'text.required' => 'Field "text" harus diisi.', // Custom error message
            ]);

            // Check if an 'About' record already exists
            $about = About::first();

            if ($about) {
                // Update the existing record
                $about->update($validated);

                // SweetAlert success message for update
                alert()->success('Success', 'About berhasil diupdate');
            } else {
                // Create a new record
                About::create($validated);

                // SweetAlert success message for creation
                alert()->success('Success', 'About berhasil ditambahkan');
            }

            // Redirect to the dashboard
            return redirect()->route('dashboard');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // SweetAlert error for validation failure
            alert()->error('Error', 'Field "text" harus diisi.');

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
