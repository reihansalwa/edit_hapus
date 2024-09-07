<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenyimpananBarangController;
use App\Http\Controllers\UploadFileController;
use App\Http\Middleware\Authentication;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login-form');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login-post');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/', [DashboardController::class, 'index'])->name('welcome-page')->middleware(Authentication::class);

Route::get('/penyimpanan/', [PenyimpananBarangController::class, 'index'])->name('index-penyimpanan')->middleware(Authentication::class);
Route::get('/penyimpanan/create', [PenyimpananBarangController::class, 'create'])->name('create-penyimpanan')->middleware(Authentication::class);
Route::post('/penyimpanan/store', [PenyimpananBarangController::class, 'store'])->name('store-penyimpanan')->middleware(Authentication::class);
Route::get('/penyimpanan/edit/{penyimpananBarang}', [PenyimpananBarangController::class, 'edit'])->name('edit-penyimpanan')->middleware(Authentication::class);
Route::put('/penyimpanan/update/{penyimpananBarang}', [PenyimpananBarangController::class, 'update'])->name('update-penyimpanan')->middleware(Authentication::class);
Route::delete('/penyimpanan/delete/{penyimpananBarang}', [PenyimpananBarangController::class, 'delete'])->name('delete-penyimpanan')->middleware(Authentication::class);

Route::get('/profile', [UploadFileController::class, 'FormAvatar'])->name('profile')->middleware(Authentication::class);
Route::put('/profile/avatar/{user}', [UploadFileController::class, 'store'])->name('profile-store')->middleware(Authentication::class);