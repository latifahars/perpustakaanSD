<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Penerbit;
use App\Models\SumberBuku;


class AMAnggotaController extends Controller
{
    public function tampilPencarian() 
    {      
        return view('antarmuka_anggota.halaman_awal');
    }

    public function tampilSemuaBuku()
    {
    	$buku = Buku::with('kategori','sumber')->get();

        return view('antarmuka_anggota.semua_buku', compact('buku'));
    }
}
