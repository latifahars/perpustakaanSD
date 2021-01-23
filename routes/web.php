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
Route::get('/pengembalian', [TransaksiController::class, 'tampilPengembalian']);

//data
Route::get('/data_buku', [DataController::class, 'tampilDataBuku']);
Route::get('/data_anggota', [DataController::class, 'tampilDataAnggota']);
Route::get('/data_peraga', [DataController::class, 'tampilDataPeraga']);
Route::get('/struktur_org', [DataController::class, 'tampilStruktur']);

//profil
Route::get('/edit_profil', [ProfilController::class, 'tampilProfil']);