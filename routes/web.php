<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/ukm', [UkmController::class, 'index'])->name('ukm.index');
Route::get('/ukm/{id}', [UkmController::class, 'show'])->name('ukm.show');
Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/status', [MahasiswaController::class, 'statusPage'])->name('status.index');
Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
Route::get('/notifikasi/read/{id}', [NotifikasiController::class, 'read'])->name('notifikasi.read');
Route::get('/register', [MahasiswaController::class, 'registerPage'])->name('register');
Route::post('/register', [MahasiswaController::class, 'register']);
Route::get('/login', [MahasiswaController::class, 'loginPage'])->name('login');
Route::post('/login', [MahasiswaController::class, 'login']);

// logout umum (buat mahasiswa/admin dari 1 controller)
Route::post('/logout', [MahasiswaController::class, 'logout'])->name('logout');

/*
| ADMIN
*/
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::post('/admin/logout', function () {
        session()->forget(['admin_id', 'admin_email', 'admin_id_ukm']);
        return redirect('/login');
    })->name('admin.logout');
});
