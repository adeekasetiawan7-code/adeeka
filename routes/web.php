

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/daftar_pengguna', [AuthController::class, 'daftarPengguna']);
Route::get('/daftar_pengguna', [PenggunaController::class, 'index']);
Route::get('/tambah_pengguna', [PenggunaController::class, 'create']);
Route::post('/store', [PenggunaController::class, 'store']);
Route::get('/edit/{id}', [PenggunaController::class, 'edit']);
Route::post('/update/{id}', [PenggunaController::class, 'update']);
Route::get('/delete/{id}', [PenggunaController::class, 'destroy']);