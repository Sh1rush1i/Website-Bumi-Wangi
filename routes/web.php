<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'homepage'])->name('index');

Route::get('/admin', function () {
    return view('login');
})->middleware('guest')->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::get('/about', function () {
    return view('about');
})->name('tentang');

Route::get('/product', function () {
    return view('product');
})->name('produk');

Route::get('/wisata', function () {
    return view('wisata');
})->name('wisata');
