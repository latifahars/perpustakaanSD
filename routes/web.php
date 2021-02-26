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
use App\Http\Controllers\AMAnggotaController;
use App\Http\Controllers\FlashMessageController;

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
Route::get('/logout', function () {
    auth()->logout();
    return redirect('login');
});

//dashboard
Route::get('dashboard', [DashboardController::class, 'tampilDashboard']);

//transaksi
Route::get('peminjaman', [TransaksiController::class, 'tampilPeminjaman']);
Route::get('peminjaman/kembali{idtransaksi}', [TransaksiController::class, 'pengembalian']);
Route::get('peminjaman/tambah_peminjaman', [TransaksiController::class, 'tampilTambahPeminjaman']);
Route::post('peminjaman/tambah_peminjaman', [TransaksiController::class, 'tambahPeminjaman']);
Route::get('peminjaman/lewat_deadline', [TransaksiController::class, 'tampilLewatDeadline']);
Route::get('riwayat', [TransaksiController::class, 'tampilRiwayat']);

//data
Route::get('data_buku', [BukuController::class, 'tampilBuku']);
Route::get('data_buku/tambah_buku', [BukuController::class, 'tampilTambahBuku']);
Route::post('data_buku/tambah_buku', [BukuController::class, 'tambahBuku']);
Route::get('data_buku/edit_buku/{idbuku}', [BukuController::class, 'tampilEditBuku']);
Route::post('data_buku/edit_buku/{idbuku}', [BukuController::class, 'editBuku']);
Route::get('data_buku/hapus_buku/{idbuku}', [BukuController::class, 'hapusBuku']);
Route::get('data_buku/detail_buku/{idbuku}', [BukuController::class, 'tampilDetailBuku']);
Route::get('data_buku/import_buku', [BukuController::class, 'tampilImportBuku']);

Route::get('data_buku/kategori', [KategoriBukuController::class, 'tampilKategori']);
Route::post('data_buku/kategori', [KategoriBukuController::class, 'tambahKategori']);
Route::get('data_buku/edit_kategori/{idkategori}', [KategoriBukuController::class, 'tampilEditKategori']);
Route::post('data_buku/edit_kategori/{idkategori}', [KategoriBukuController::class, 'editKategori']);
Route::get('data_buku/hapus_kategori/{idkategori}', [KategoriBukuController::class, 'hapusKategori']);

Route::get('data_anggota', [AnggotaController::class, 'tampilAnggota']);
Route::get('data_anggota/tambah_anggota', [AnggotaController::class, 'tampilTambahAnggota']);
Route::post('data_anggota/tambah_anggota', [AnggotaController::class, 'tambahAnggota']);
Route::get('data_anggota/edit_anggota/{idanggota}', [AnggotaController::class, 'tampilEditAnggota']);
Route::post('data_anggota/edit_anggota/{idanggota}', [AnggotaController::class, 'editAnggota']);
Route::get('data_anggota/hapus_anggota/{idanggota}', [AnggotaController::class, 'hapusAnggota']);
Route::get('data_anggota/import_anggota', [AnggotaController::class, 'tampilImportAnggota']);

Route::get('data_peraga', [PeragaController::class, 'tampilPeraga']);
Route::get('data_peraga/tambah_peraga', [PeragaController::class, 'tampilTambahPeraga']);
Route::post('data_peraga/tambah_peraga', [PeragaController::class, 'tambahPeraga']);
Route::get('data_peraga/edit_peraga/{idperaga}', [PeragaController::class, 'tampilEditPeraga']);
Route::post('data_peraga/edit_peraga/{idperaga}', [PeragaController::class, 'editPeraga']);
Route::get('data_peraga/hapus_peraga/{idperaga}', [PeragaController::class, 'hapusPeraga']);

Route::get('data_peraga/kategori', [KategoriPeragaController::class, 'tampilKategori']);
Route::post('data_peraga/kategori', [KategoriPeragaController::class, 'tambahKategori']);
Route::get('data_peraga/edit_kategori/{idkategori}', [KategoriPeragaController::class, 'tampilEditKategori']);
Route::post('data_peraga/edit_kategori/{idkategori}', [KategoriPeragaController::class, 'editKategori']);
Route::get('data_peraga/hapus_kategori/{idkategori}', [KategoriPeragaController::class, 'hapusKategori']);

Route::get('struktur_org', [StrukturController::class, 'tampilStruktur']);

//profil
Route::get('edit_profil', [ProfilController::class, 'tampilProfil']);
Route::post('edit_profil', [ProfilController::class, 'simpanProfil']);

//antarmuka anggota
Route::get('pencarian_buku', [AMAnggotaController::class, 'tampilPencarian']);
Route::get('pencarian_buku/semua_buku', [AMAnggotaController::class, 'tampilSemuaBuku']);
Route::get('pencarian_buku/hasil_pencarian', [AMAnggotaController::class, 'cariBuku']);