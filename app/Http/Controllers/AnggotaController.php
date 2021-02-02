<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function tampilAnggota() {
        return view('data.data_anggota');
    }
    public function tampilTambahAnggota() {
        return view('data.tambah_anggota');
    }
    public function tampilEditAnggota() {
        return view('data.edit_anggota');
    }
    public function tampilImportAnggota() {
        return view('data.import_anggota');
    }
}
