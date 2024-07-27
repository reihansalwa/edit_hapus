<?php

use App\Http\Controllers\PenyimpananBarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PenyimpananBarangController::class, 'index']);
Route::get('/create', [PenyimpananBarangController::class, 'create']);
Route::post('/store', [PenyimpananBarangController::class, 'store']);
Route::get('/edit/{barang}', [PenyimpananBarangController::class, 'edit']);
Route::put('/update/{barang}', [PenyimpananBarangController::class, 'update']);
Route::delete('/delete/{barang}', [PenyimpananBarangController::class, 'delete']);
