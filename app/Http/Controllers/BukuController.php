<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function tampilBuku() {
        return view('buku.data_buku');
    }
    public function tampilTambahBuku() {
        return view('buku.tambah_buku');
    }
    public function tampilEditBuku() {
        return view('buku.edit_buku');
    }
    public function tampilDetailBuku() {
        return view('buku.detail_buku');
    }
    public function tampilImportBuku() {
        return view('buku.import_buku');
    }
}
