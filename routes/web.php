<?php

use App\Models\Media;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'homepage'])->name('index');

Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return view('dashboard');
    } else {
        return view('login');
    }
})->name('login');

Route::get('/contact', function () {
    $media = Media::first();
    return view('contact', compact('media'));
})->name('contact');

Route::get('/booking', function () {
    return view('book');
})->name('book');

Route::get('/login', function () {
    if (auth()->check() && auth()->user()->role === 'user') {
        return redirect()->route('index');
    } else {
        return view('userlogin');
    }
})->name('user-login');

Route::get('/register', function () {
    if (auth()->check() && auth()->user()->role === 'user') {
        return redirect()->route('index');
    } else {
        return view('userregist');
    }
})->name('regist');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('index');
        }
        return app(DashboardController::class)->dashboard();
    })->name('dashboard');
});

Route::get('/about', function () {
    $media = Media::first();
    return view('about', compact('media'));
})->name('tentang');

Route::get('/product', [ProdukController::class, 'index'])->name('produk');

Route::get('/wisata', [WisataController::class, 'index'])->name('wisata');
