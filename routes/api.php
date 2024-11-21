<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WisataController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth');


Route::middleware('auth')->group(function () {

    // Wisata
    Route::get('/getWisata', [WisataController::class, 'index']);
    Route::post('/postWisata', [WisataController::class, 'store']);

    // Produk UMKM
    Route::get('/getProduk', [ProdukController::class, 'index']);
    Route::post('/postProduk', [ProdukController::class, 'store']);

    // Auth
    Route::post('/register', [AuthController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/login', [AuthController::class, 'login'])->name('login-api');
