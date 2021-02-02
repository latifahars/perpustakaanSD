<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function tampilBuku() {
        return view('data.data_buku');
    }
    public function tampilTambahBuku() {
        return view('data.tambah_buku');
    }
    public function tampilEditBuku() {
        return view('data.edit_buku');
    }
    public function tampilDetailBuku() {
        return view('data.detail_buku');
    }
    public function tampilImportBuku() {
        return view('data.import_buku');
    }
}
