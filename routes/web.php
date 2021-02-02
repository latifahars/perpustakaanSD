<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeragaController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\ProfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//login
Route::view('login', 'login');
Route::post('login', [AuthenticationController::class, 'login']);

//dashboard
Route::get('/dashboard', [DashboardController::class, 'tampilDashboard']);

//transaksi
Route::get('/peminjaman', [TransaksiController::class, 'tampilPeminjaman']);
Route::get('peminjaman/tambah_peminjaman', [TransaksiController::class, 'tambahPeminjaman']);
Route::get('/pengembalian', [TransaksiController::class, 'tampilPengembalian']);

//data
Route::get('/data_buku', [BukuController::class, 'tampilBuku']);
Route::get('data_buku/tambah_buku', [BukuController::class, 'tambahBuku']);
Route::get('data_buku/edit_buku', [BukuController::class, 'editBuku']);
Route::get('data_buku/detail_buku', [BukuController::class, 'detailBuku']);
Route::get('data_buku/import_buku', [BukuController::class, 'importBuku']);

Route::get('/data_anggota', [AnggotaController::class, 'tampilAnggota']);
Route::get('data_anggota/tambah_anggota', [AnggotaController::class, 'tambahAnggota']);
Route::get('data_anggota/edit_anggota', [AnggotaController::class, 'editAnggota']);
Route::get('data_anggota/import_anggota', [AnggotaController::class, 'importAnggota']);

Route::get('/data_peraga', [PeragaController::class, 'tampilDataPeraga']);
Route::get('data_peraga/tambah_peraga', [PeragaController::class, 'tambahDataPeraga']);
Route::get('data_peraga/edit_peraga', [PeragaController::class, 'editDataPeraga']);

Route::get('/struktur_org', [StrukturController::class, 'tampilStruktur']);

//profil
Route::get('/edit_profil', [ProfilController::class, 'tampilProfil']);