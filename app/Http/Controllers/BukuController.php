<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function tampilBuku() {
        return view('data.data_buku');
    }
    public function tambahBuku() {
        return view('data.tambah_buku');
    }
    public function editBuku() {
        return view('data.edit_buku');
    }
    public function detailBuku() {
        return view('data.detail_buku');
    }
    public function importBuku() {
        return view('data.import_buku');
    }
}
