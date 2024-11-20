<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/admin', function () {
    return view('login');
})->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about', function () {
    return view('about');
})->name('tentang');

Route::get('/product', function () {
    return view('product');
})->name('produk');

Route::get('/wisata', function () {
    return view('wisata');
})->name('wisata');