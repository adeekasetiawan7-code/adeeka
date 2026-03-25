<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;

Route::get('/', [PenggunaController::class, 'showLogin']);
Route::get('/login', [PenggunaController::class, 'showLogin']);
Route::post('/login', [PenggunaController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index']);