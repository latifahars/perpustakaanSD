<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function tampilAnggota() {
        return view('data.data_anggota');
    }
    public function tambahAnggota() {
        return view('data.tambah_anggota');
    }
    public function editAnggota() {
        return view('data.edit_anggota');
    }
    public function ImportAnggota() {
        return view('data.import_anggota');
    }
}
