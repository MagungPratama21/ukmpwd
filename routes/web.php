<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NotifikasiController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/ukm', [UkmController::class, 'index'])->name('ukm.index');
Route::get('/ukm/{id}', [UkmController::class, 'show'])->name('ukm.show');
Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/status', [MahasiswaController::class, 'status'])->name('status.index');
Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
Route::get('/notifikasi/read/{id}', [NotifikasiController::class, 'read'])->name('notifikasi.read');
Route::get('/register', [MahasiswaController::class, 'create'])->name('register');
Route::post('/register', [MahasiswaController::class, 'store']);
Route::get('/login', [MahasiswaController::class, 'loginForm'])->name('login');
Route::post('/login', [MahasiswaController::class, 'login']);

