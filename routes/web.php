<?php

use App\Http\Controllers\Otentikas;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::view('/', 'Ikhtisar');
Route::view('/ikhtisar', 'Ikhtisar');

// Otentikasi
Route::view('/daftar', 'Daftar');
Route::post('/daftar', [Otentikas::class, 'Daftar']);
Route::view('/masuk', 'Masuk');
Route::post('/masuk', [Otentikas::class, 'Masuk']);
Route::get('/oauth/google', [Otentikas::class, 'AksesGoogle']);
Route::get('/oauth/google/callback', [Otentikas::class, 'AkunGoogle']);
Route::get('/oauth/github', [Otentikas::class, 'AksesGithub']);
Route::get('/oauth/github/callback', [Otentikas::class, 'AkunGithub']);
Route::view('/aktivasi', 'AkunTidakAktif');
Route::get('/konfirmasi-email/{Kode}', [Otentikas::class, 'KonfirmasiEmail']);
Route::get('/keluar', [Otentikas::class, 'Keluar']);
Route::view('/lupa-sandi', '');
Route::get('/lupa-sandi/{Kode}', [Otentikas::class, 'LupaSandi']);
Route::post('/atur-ulang-sandi', [Otentikas::class, 'AturUlangSandi']);

Route::view('/dashboard', 'Dashboard');
