<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Dashboard berdasarkan role
Route::middleware(['auth'])->group(function () {
    Route::get('/pasien/dashboard', [DashboardController::class, 'pasienDashboard'])->name('pasien.dashboard');
    Route::get('/dokter/dashboard', [DashboardController::class, 'dokterDashboard'])->name('dokter.dashboard');
});

Route::middleware(['auth'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/dashboard', [PasienController::class, 'dashboard'])->name('dashboard');
    Route::get('/periksa', [PasienController::class, 'periksaForm'])->name('periksa');
    Route::post('/periksa', [PasienController::class, 'periksaStore'])->name('periksa.store');
    Route::get('/riwayat', [PasienController::class, 'riwayat'])->name('riwayat');
    Route::get('/profil', function () {
        return view('pasien.profile');
    })->name('profile');
});

Route::middleware(['auth'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/dashboard', [DokterController::class, 'dashboard'])->name('dashboard');
    
    // Pemeriksaan
    Route::get('/periksa', [DokterController::class, 'listPemeriksaan'])->name('periksa');
    Route::get('/periksa/{id}', [DokterController::class, 'formPemeriksaan'])->name('periksa.form');
    Route::post('/periksa/{id}', [DokterController::class, 'simpanPemeriksaan'])->name('periksa.store');

    // Riwayat
    Route::get('/riwayat', [DokterController::class, 'riwayat'])->name('riwayat');

    // Obat
    Route::get('/obat', [DokterController::class, 'kelolaObat'])->name('obat');
    Route::post('/obat', [DokterController::class, 'tambahObat'])->name('obat.store');
    Route::get('/obat/{id}/edit', [DokterController::class, 'editObat'])->name('obat.edit');
    Route::put('/obat/{id}', [DokterController::class, 'updateObat'])->name('obat.update');
    Route::delete('/obat/{id}', [DokterController::class, 'hapusObat'])->name('obat.destroy');

    // Profil
    Route::get('/profil', [DokterController::class, 'profil'])->name('profile');
});



