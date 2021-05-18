<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\SumberBukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeragaController;
use App\Http\Controllers\SumberPeragaController;
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
Route::view('/login', 'login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/login');
});

//dashboard
Route::get('/dashboard', [DashboardController::class, 'tampilDashboard']);

//transaksi
Route::get('/peminjaman', [TransaksiController::class, 'tampilPeminjaman']);
Route::get('/peminjaman/kembali{idtransaksi}', [TransaksiController::class, 'pengembalian']);
Route::get('/peminjaman/tambah_peminjaman', [TransaksiController::class, 'tampilTambahPeminjaman'])->name('tambah');
Route::post('/peminjaman/tambah_peminjaman', [TransaksiController::class, 'tambahPeminjaman']);
Route::get('/peminjaman/lewat_deadline', [TransaksiController::class, 'tampilLewatDeadline']);
Route::get('/riwayat', [TransaksiController::class, 'tampilRiwayat']);
Route::post('/peminjaman/cetak_laporan', [TransaksiController::class, 'cetakLaporan']);

//data
Route::get('/data_buku', [BukuController::class, 'tampilBuku']);
Route::get('/data_buku/tambah_buku', [BukuController::class, 'tampilTambahBuku']);
Route::post('/data_buku/tambah_buku', [BukuController::class, 'tambahBuku']);
Route::get('/data_buku/edit_buku/{idbuku}', [BukuController::class, 'tampilEditBuku']);
Route::post('/data_buku/edit_buku/{idbuku}', [BukuController::class, 'editBuku']);
Route::get('/data_buku/hapus_buku/{idbuku}', [BukuController::class, 'hapusBuku']);
Route::get('/data_buku/detail_buku/{idbuku}', [BukuController::class, 'tampilDetailBuku']);
Route::get('/data_buku/import_buku', [BukuController::class, 'tampilImportBuku']);
Route::post('/data_buku/import_buku', [BukuController::class, 'importBuku']);

Route::get('/data_buku/kategori', [KategoriBukuController::class, 'tampilKategori']);
Route::post('/data_buku/kategori', [KategoriBukuController::class, 'tambahKategori']);
Route::post('/data_buku/edit_kategori/{idkategori}', [KategoriBukuController::class, 'editKategori']);
Route::get('/data_buku/hapus_kategori/{idkategori}', [KategoriBukuController::class, 'hapusKategori']);

Route::get('/data_buku/penerbit', [PenerbitController::class, 'tampilPenerbit']);
Route::post('/data_buku/penerbit', [PenerbitController::class, 'tambahPenerbit']);
Route::post('/data_buku/edit_penerbit/{idpenerbit}', [PenerbitController::class, 'editPenerbit']);
Route::get('/data_buku/hapus_penerbit/{idpenerbit}', [PenerbitController::class, 'hapusPenerbit']);

Route::get('/data_buku/asal_perolehan', [SumberBukuController::class, 'tampilSumber']);
Route::post('/data_buku/asal_perolehan', [SumberBukuController::class, 'tambahSumber']);
Route::post('/data_buku/edit_asal/{idsumber}', [SumberBukuController::class, 'editSumber']);
Route::get('/data_buku/hapus_asal/{idsumber}', [SumberBukuController::class, 'hapusSumber']);

Route::get('/data_buku/pengarang', [PengarangController::class, 'tampilPengarang']);
Route::post('/data_buku/pengarang', [PengarangController::class, 'tambahPengarang']);
Route::post('/data_buku/edit_pengarang/{idPengarang}', [PengarangController::class, 'editPengarang']);
Route::get('/data_buku/hapus_pengarang/{idPengarang}', [PengarangController::class, 'hapusPengarang']);

Route::get('/data_anggota', [AnggotaController::class, 'tampilAnggota']);
Route::get('/data_anggota/tambah_anggota', [AnggotaController::class, 'tampilTambahAnggota']);
Route::post('/data_anggota/tambah_anggota', [AnggotaController::class, 'tambahAnggota']);
Route::get('/data_anggota/edit_anggota/{idanggota}', [AnggotaController::class, 'tampilEditAnggota']);
Route::post('/data_anggota/edit_anggota/{idanggota}', [AnggotaController::class, 'editAnggota']);
Route::get('/data_anggota/hapus_anggota/{idanggota}', [AnggotaController::class, 'hapusAnggota']);
Route::get('/data_anggota/import_anggota', [AnggotaController::class, 'tampilImportAnggota']);
Route::post('/data_anggota/import_anggota', [AnggotaController::class, 'importAnggota']);
Route::get('/data_anggota/cetak_anggota', [AnggotaController::class, 'tampilCetakAnggota']);
Route::post('/data_anggota/cetak_kartu', [AnggotaController::class, 'cetakKartu']);
Route::get('/data_anggota/cari_anggota', [AnggotaController::class, 'cariAnggota'])->name('cari');

Route::get('/data_peraga', [PeragaController::class, 'tampilPeraga']);
Route::get('/data_peraga/tambah_peraga', [PeragaController::class, 'tampilTambahPeraga']);
Route::post('/data_peraga/tambah_peraga', [PeragaController::class, 'tambahPeraga']);
Route::get('/data_peraga/edit_peraga/{idperaga}', [PeragaController::class, 'tampilEditPeraga']);
Route::post('/data_peraga/edit_peraga/{idperaga}', [PeragaController::class, 'editPeraga']);
Route::get('data_peraga/hapus_peraga/{idperaga}', [PeragaController::class, 'hapusPeraga']);

Route::get('/data_peraga/kategori', [KategoriPeragaController::class, 'tampilKategori']);
Route::post('/data_peraga/kategori', [KategoriPeragaController::class, 'tambahKategori']);
Route::post('/data_peraga/edit_kategori/{idkategori}', [KategoriPeragaController::class, 'editKategori']);
Route::get('/data_peraga/hapus_kategori/{idkategori}', [KategoriPeragaController::class, 'hapusKategori']);

Route::get('/data_peraga/asal_perolehan', [SumberPeragaController::class, 'tampilSumber']);
Route::post('/data_peraga/asal_perolehan', [SumberPeragaController::class, 'tambahSumber']);
Route::post('/data_peraga/edit_asal/{idsumber}', [SumberPeragaController::class, 'editSumber']);
Route::get('/data_peraga/hapus_asal/{idsumber}', [SumberPeragaController::class, 'hapusSumber']);

Route::get('/struktur_org', [StrukturController::class, 'tampilStruktur']);
Route::post('/struktur_org/edit/{idstruktur}', [StrukturController::class, 'editStruktur']);

//profil
Route::get('/edit_profil', [ProfilController::class, 'tampilProfil']);
Route::post('/edit_profil', [ProfilController::class, 'editProfil']);
Route::get('edit_profil/tambah_akun', [ProfilController::class, 'tampilTambahAkun']);
Route::post('/edit_profil/tambah_akun', [ProfilController::class, 'tambahAkun']);


//antarmuka anggota
Route::get('/pencarian_buku', [AMAnggotaController::class, 'tampilPencarian']);
Route::get('/pencarian_buku/semua_buku', [AMAnggotaController::class, 'tampilSemuaBuku']);
Route::get('/pencarian_buku/hasil_pencarian', [AMAnggotaController::class, 'cariBuku']);