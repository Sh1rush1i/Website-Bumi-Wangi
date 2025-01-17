<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\DashboardController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth');

Route::get('/getProduk', [ProdukController::class, 'index'])->name('produk');
Route::get('/getWisata', [WisataController::class, 'index'])->name('wisata');

Route::middleware('auth')->group(function () {

    // Wisata
    Route::post('/postWisata', [WisataController::class, 'store'])->name('wisata-post');
    Route::put('/update-wisata/{wisata}', [WisataController::class, 'update'])->name('wisata-update');
    Route::delete('/delete-wisata/{wisata}', [WisataController::class, 'destroy'])->name('wisata-delete');

    // Produk UMKM
    Route::post('/postProduk', [ProdukController::class, 'store'])->name('produk-post');
    Route::put('/update-produk/{produk}', [ProdukController::class, 'update'])->name('produk-update');
    Route::delete('/delete-produk/{produk}', [ProdukController::class, 'destroy'])->name('produk-delete');

    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin-logout');
    Route::post('/logout-user', [AuthController::class, 'userLogout'])->name('logout');

    //About
    Route::post('/postAbout', [DashboardController::class, 'about'])->name('about-post');

    //Media
    Route::post('/postMedia', [DashboardController::class, 'media'])->name('media-post');

    //Pesanan
    Route::post('/booking/post', [pesananController::class, 'store'])->name('pesanan-post');

    //Metode Pembayaran
    Route::post('/metode/post', [DashboardController::class, 'storeMetode'])->name('metode-post');
    Route::put('/metode/update/{metode}', [DashboardController::class, 'updateMetode'])->name('metode-update');
    Route::delete('/metode/delete/{metode}', [DashboardController::class, 'deleteMetode'])->name('metode-delete');

    //Carousel Image
    Route::post('/carousel/post', [DashboardController::class, 'storeCarousel'])->name('carousel-post');
    Route::put('/carousel/update/{carousel}', [DashboardController::class, 'updateCarousel'])->name('carousel-update');
    Route::delete('/carousel/delete/{carousel}', [DashboardController::class, 'deleteCarousel'])->name('carousel-delete');
});

Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login'])->name('login-api');

Route::post('/user/register', [AuthController::class, 'userRegister'])->name('user-register-api');
Route::post('/user/login', [AuthController::class, 'userLogin'])->name('user-login-api');
