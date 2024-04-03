<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Peserta\BiodataController;
use App\Http\Controllers\Peserta\DashboardController;
use App\Http\Controllers\Peserta\DataOrangTuaController;
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
            Route::get('data-orang-tua/{id?}',[DataOrangTuaController::class,'index'])->name('data-orang-tua');
            Route::put('data-orang-tua/{id?}',[DataOrangTuaController::class,'simpan'])->name('data-orang-tua.simpan');
            
        });
    });
    Route::prefix('backoffices')->name('backoffice.')->group(function () {
    });
});
