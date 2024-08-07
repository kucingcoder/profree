<?php

use App\Http\Controllers\Aktivasi;
use App\Http\Controllers\Bicara;
use App\Http\Controllers\Kantor;
use App\Http\Controllers\LamanLabuh;
use App\Http\Controllers\Otentikas;
use App\Http\Controllers\Profil;
use App\Http\Controllers\Readme;
use App\Http\Controllers\Skills;
use App\Http\Controllers\SPK;
use Illuminate\Support\Facades\Route;

Route::view('/', 'Ikhtisar');
Route::view('/ikhtisar', 'Ikhtisar');

Route::middleware('NonSesi')->group(
    function () {
        Route::view('/daftar', 'Daftar');
        Route::post('/daftar', [Otentikas::class, 'Daftar']);

        Route::view('/masuk', 'Masuk');
        Route::post('/masuk', [Otentikas::class, 'Masuk']);

        Route::get('/oauth/google', [Otentikas::class, 'AksesGoogle']);
        Route::get('/oauth/google/callback', [Otentikas::class, 'AkunGoogle']);

        Route::get('/aktivasi/{email}', [Aktivasi::class, 'Index']);
        Route::get('/aktivasi/kirim-ulang/{email}', [Otentikas::class, 'KirimUlangKonfirmasi']);

        Route::get('/konfirmasi-email/{Kode}', [Otentikas::class, 'KonfirmasiEmail']);

        Route::view('/lupa-sandi', 'LupaSandi');
        Route::post('/lupa-sandi', [Otentikas::class, 'KirimLupaSandi']);
        Route::get('/atur-ulang-sandi/{Kode}', [Otentikas::class, 'AturUlangSandi']);
        Route::post('/ganti-sandi', [Otentikas::class, 'GantiSandi']);
    }
);

Route::middleware('Sesi')->group(
    function () {
        Route::get('/dashboard', [SPK::class, 'Index']);
        Route::post('/dashboard', [SPK::class, 'Hitung']);

        Route::get('/readme/{nama}', [Readme::class, 'Index']);

        Route::get('/kemampuan', [Skills::class, 'Index']);
        Route::post('/kemampuan/tambah', [Skills::class, 'Tambah']);
        Route::get('/kemampuan/hapus/{id}', [Skills::class, 'Hapus']);

        Route::get('/bahasa-komunikasi', [Bicara::class, 'Index']);
        Route::post('/bahasa-komunikasi/tambah', [Bicara::class, 'Tambah']);
        Route::get('/bahasa-komunikasi/hapus/{id}', [Bicara::class, 'Hapus']);

        Route::get('/platform', [Kantor::class, 'Index']);
        Route::post('/platform/tambah', [Kantor::class, 'Tambah']);
        Route::get('/platform/hapus/{id}', [Kantor::class, 'Hapus']);

        Route::get('/laman-labuh', [LamanLabuh::class, 'Index']);
        Route::post('/laman-labuh/update-deskripsi', [LamanLabuh::class, 'UpdateDeskripsi']);

        Route::get('/profil', [Profil::class, 'Index']);
        Route::post('/profil/update-data-diri', [Profil::class, 'UpdateDataDiri']);
        Route::post('/profil/update-riwayat', [Profil::class, 'UpdateRiwayat']);
        Route::post('/profil/update-sandi', [Profil::class, 'UpdateSandi']);

        Route::get('/keluar', [Otentikas::class, 'Keluar']);
    }
);
