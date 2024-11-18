<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
