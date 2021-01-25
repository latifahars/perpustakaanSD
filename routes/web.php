<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DataController;
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
Route::get('/data_buku', [DataController::class, 'tampilDataBuku']);
Route::get('data_buku/tambah_buku', [DataController::class, 'tambahDataBuku']);
Route::get('data_buku/edit_buku', [DataController::class, 'editDataBuku']);
Route::get('data_buku/detail_buku', [DataController::class, 'detailDataBuku']);

Route::get('/data_anggota', [DataController::class, 'tampilDataAnggota']);
Route::get('data_anggota/tambah_anggota', [DataController::class, 'tambahDataAnggota']);
Route::get('data_anggota/edit_anggota', [DataController::class, 'editDataAnggota']);

Route::get('/data_peraga', [DataController::class, 'tampilDataPeraga']);
Route::get('data_peraga/tambah_peraga', [DataController::class, 'tambahDataPeraga']);
Route::get('data_peraga/edit_peraga', [DataController::class, 'editDataPeraga']);

Route::get('/struktur_org', [DataController::class, 'tampilStruktur']);

//profil
Route::get('/edit_profil', [ProfilController::class, 'tampilProfil']);