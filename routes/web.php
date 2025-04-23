<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/akun', function () {
    return view('akun');
})->name('akun');

Route::get('/jadwal', function () {
    return view('jadwal');
})->name('jadwal');

Route::get('/berita', function () {
    return view('berita');
})->name('berita');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/form-pendaftaran', function () {
    return view('form-pendaftaran');
})->name('form-pendaftaran');

Route::get('/unggah-berkas', function () {
    return view('unggah-berkas');
})->name('unggah-berkas');

Route::get('/peringkat', function () {
    return view('peringkat');
})->name('peringkat');

Route::get('/data-siswa', [App\Http\Controllers\DataSiswaController::class, 'index'])->name('data-siswa');  

Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])->name('riwayat');

Route::get('/pesan',  [App\Http\Controllers\GeneralController::class, 'pesan'])->name('pesan'); 

Route::get('/pengajuan-biaya', function () {
    return view('pengajuan-biaya');
})->name('pengajuan-biaya');  