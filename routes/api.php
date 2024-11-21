<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WisataController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth');

Route::get('/getProduk', [ProdukController::class, 'index'])->name('produk');
Route::get('/getWisata', [WisataController::class, 'index'])->name('wisata');

Route::middleware('auth')->group(function () {

    // Wisata
    Route::post('/postWisata', [WisataController::class, 'store'])->name('wisata-post');

    // Produk UMKM
    Route::post('/postProduk', [ProdukController::class, 'store'])->name('produk-post');

    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login'])->name('login-api');
