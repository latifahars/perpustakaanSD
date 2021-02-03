<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeragaController;
use App\Http\Controllers\KategoriPeragaController;
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
Route::get('dashboard', [DashboardController::class, 'tampilDashboard']);

//transaksi
Route::get('peminjaman', [TransaksiController::class, 'tampilPeminjaman']);
Route::get('peminjaman/tambah_peminjaman', [TransaksiController::class, 'tampilTambahPeminjaman']);
Route::get('pengembalian', [TransaksiController::class, 'tampilPengembalian']);

//data
Route::get('data_buku', [BukuController::class, 'tampilBuku']);
Route::get('data_buku/tambah_buku', [BukuController::class, 'tampilTambahBuku']);
Route::get('data_buku/edit_buku', [BukuController::class, 'tampilEditBuku']);
Route::get('data_buku/detail_buku', [BukuController::class, 'tampilDetailBuku']);
Route::get('data_buku/import_buku', [BukuController::class, 'tampilImportBuku']);

Route::get('data_buku/kategori', [KategoriBukuController::class, 'tampilKategori']);
Route::post('data_buku/kategori', [KategoriBukuController::class, 'tambahKategori']);
Route::get('data_buku/edit_kategori/{idkategori}', [KategoriBukuController::class, 'tampilEditKategori']);
Route::post('data_buku/edit_kategori/{idkategori}', [KategoriBukuController::class, 'editKategori']);
Route::get('data_buku/hapus_kategori/{idkategori}', [KategoriBukuController::class, 'hapusKategori']);

Route::get('data_anggota', [AnggotaController::class, 'tampilAnggota']);
Route::get('data_anggota/tambah_anggota', [AnggotaController::class, 'tampilTambahAnggota']);
Route::get('data_anggota/edit_anggota', [AnggotaController::class, 'tampilEditAnggota']);
Route::get('data_anggota/import_anggota', [AnggotaController::class, 'tampilImportAnggota']);

Route::get('data_peraga', [PeragaController::class, 'tampilPeraga']);
Route::get('data_peraga/tambah_peraga', [PeragaController::class, 'tampilTambahPeraga']);
Route::get('data_peraga/edit_peraga', [PeragaController::class, 'tampilEditPeraga']);

Route::get('data_peraga/kategori', [KategoriPeragaController::class, 'tampilKategori']);
Route::get('data_peraga/edit_kategori', [KategoriPeragaController::class, 'tampilEditKategori']);


Route::get('struktur_org', [StrukturController::class, 'tampilStruktur']);

//profil
Route::get('edit_profil', [ProfilController::class, 'tampilProfil']);