<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Peserta\BiodataController;
use App\Http\Controllers\Peserta\DashboardController;
use App\Http\Controllers\Peserta\DataOrangTuaController;
use App\Http\Controllers\Peserta\DataPrestasiController;
use App\Http\Controllers\Peserta\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->name('peserta.')->group(function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'checkLogin'])->name('login.check');
    Route::get('daftar-akun', [AuthController::class, 'daftarView'])->name('daftar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('peserta.index');
    Route::prefix('dash')->name('peserta.')->group(function () {
        Route::post('pilih_jalur', [PendaftaranController::class, 'pilih_jalur'])->name('pendaftaran.pilih_jalur');
        Route::get('formulir-pendaftaran', [PendaftaranController::class, 'isi_formulir'])->name('pendaftaran.form');

        Route::prefix('form')->name('pendaftaran.form.')->group(function () {
            Route::get('biodata/{id?}', [BiodataController::class, 'index'])->name('biodata');
            Route::put('biodata/{id?}', [BiodataController::class, 'simpan'])->name('biodata.simpan');

            // //data orang tua
            Route::get('orang-tua/{id?}', [DataOrangTuaController::class, 'index'])->name('data-orang-tua');
            Route::put('orang-tua/{id?}', [DataOrangTuaController::class, 'simpan'])->name('data-orang-tua.simpan');
            // data prestasi
            Route::get('/prestasi/{id?}', [DataPrestasiController::class, 'index'])->name('data-prestasi');
            Route::put('/prestasi/{id?}', [DataPrestasiController::class, 'simpan'])->name('data-prestasi.simpan');
        });
    });
    Route::prefix('backoffices')->name('backoffice.')->group(function () {
    });
});
