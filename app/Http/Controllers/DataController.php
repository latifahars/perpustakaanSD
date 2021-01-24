<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    // data buku
    public function tampilDataBuku() {
        return view('data.data_buku');
    }

    // data anggota
    public function tampilDataAnggota() {
        return view('data.data_anggota');
    }
    public function tambahDataAnggota() {
        return view('data.tambah_anggota');
    }
    public function editDataAnggota() {
        return view('data.edit_anggota');
    }


    //data alat peraga
   	public function tampilDataPeraga() {
        return view('data.data_peraga');
    }
    public function tambahDataPeraga() {
        return view('data.tambah_peraga');
    }
    public function editDataPeraga() {
        return view('data.edit_peraga');
    }


    //struktur organisasi
    public function tampilStruktur() {
        return view('data.struktur_org');
    }
}
