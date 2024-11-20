<?php

use App\Http\Controllers\WisataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/getWisata', [WisataController::class, 'index']);
Route::post('/postWisata', [WisataController::class, 'store']);

