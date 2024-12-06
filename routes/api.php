<?php

use App\Http\Controllers\DashboardController;
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
    Route::put('/update-wisata/{wisata}', [WisataController::class, 'update'])->name('wisata-update');

    // Produk UMKM
    Route::post('/postProduk', [ProdukController::class, 'store'])->name('produk-post');
    Route::put('/update-produk/{produk}', [ProdukController::class, 'update'])->name('produk-update');

    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //About
    Route::post('/postAbout', [DashboardController::class, 'about'])->name('about-post');

    //Media
    Route::post('/postMedia', [DashboardController::class, 'media'])->name('media-post');
});

Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login'])->name('login-api');

Route::post('/user/register', [AuthController::class, 'userRegister'])->name('user-register-api');
Route::post('/user/login', [AuthController::class, 'userLogin'])->name('user-login-api');
