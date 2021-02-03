<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriPeragaController extends Controller
{
    public function tampilKategori() {
    	return view('peraga.kategori_peraga');
    }
    public function tampilEditKategori() {
    	return view('peraga.edit_kategori');
    }
}
