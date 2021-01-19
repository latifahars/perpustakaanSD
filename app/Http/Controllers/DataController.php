<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function tampilDataBuku() {
        return view('data_buku');
    }
    public function tampilDataAnggota() {
        return view('data_anggota');
    }
   	public function tampilDataPeraga() {
        return view('data_peraga');
    }
    public function tampilStruktur() {
        return view('struktur_org');
    }
}
