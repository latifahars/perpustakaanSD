<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function tampilAnggota() {
        return view('anggota.data_anggota');
    }
    public function tampilTambahAnggota() {
        return view('anggota.tambah_anggota');
    }
    public function tampilEditAnggota() {
        return view('anggota.edit_anggota');
    }
    public function tampilImportAnggota() {
        return view('anggota.import_anggota');
    }
}
