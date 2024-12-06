<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'homepage'])->name('index');

Route::get('/admin', function () {
    return view('login');
})->middleware('guest')->name('login');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/booking', function () {
    return view('book');
})->name('book');

Route::get('/login', function () {
    return view('userlogin');
})->name('login');

Route::get('/register', function () {
    return view('userregist');
})->name('regist');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::get('/about', function () {
    return view('about');
})->name('tentang');

Route::get('/product', [ProdukController::class, 'index'])->name('produk');

Route::get('/wisata', [WisataController::class, 'index'])->name('wisata');
