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