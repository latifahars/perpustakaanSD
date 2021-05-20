<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Penerbit;
use App\Models\SumberBuku;
use App\Models\Pengarang;


class AMAnggotaController extends Controller
{
    public function tampilPencarian() 
    {      
        return view('antarmuka_anggota.halaman_awal');
    }

    public function tampilSemuaBuku()
    {
    	$buku = Buku::with('kategori','sumber','pengarang','penerbit')->get();

        return view('antarmuka_anggota.semua_buku', compact('buku'));
    }

    public function cariBuku(Request $request)
    {
        $buku = Buku::whereHas('kategori', function($query) use ($request){
            return $query->where('nama','like', '%' . $request->cari . '%')
            ->orWhere('judul', 'like', '%' . $request->cari . '%')
            ->orWhere('kode', 'like', '%' . $request->cari . '%');
        })->orWhereHas('penerbit', function($query) use ($request){
            return $query->where('nama','like', '%' . $request->cari . '%');
        })->orWhereHas('pengarang', function($query) use ($request){
            return $query->where('nama','like', '%' . $request->cari . '%');
        })->get();
        $katakunci = $request->cari;
 
        return view('antarmuka_anggota.hasil_cari', compact('buku', 'katakunci'));
    }

    public function tampilPencarianDetail() 
    {    
        $kategori = KategoriBuku::all();
        return view('antarmuka_anggota.pencarian_detail', compact('kategori'));
    }
    public function cariDetail(Request $request)
    {
        // if($request->kategori){
        //         $buku = Buku::whereHas('kategori', function($query) use ($request){
        //         return $query->where('nama','like', '%' . $request->kategori . '%');
        //     })->get();
        // }elseif($request->judul){
        //     $buku = Buku::where();
        // }

        $kode = $request->kode;
        $judul = $request->judul;
        $penerbit = $request->penerbit;
        $kategori = $request->kategori;
        $pengarang = $request->pengarang;

        if ($kode == '' and $judul == '' and $penerbit == '' and $kategori == '' and $pengarang == '') {
            $data = Buku::all();
        }
        else{
            $data = Buku::orderBy('created_at', 'desc')->get();

            if($kode != ''){
                $data = $data->where('kode', $kode);
            }
            if($judul != ''){
                $data = $data->where('judul', 'like', '%' . $judul . '%');
            dd($data);
            }
            if($penerbit != ''){
                $data = $data->where('penerbit', $penerbit);
            }
            if($kategori != ''){
                $data = $data->where('kategori', $kategori);
            }
            if($pengarang != ''){
                $data = $data->where('pengarang', $pengarang);
            }
        }

        // $buku = Buku::whereHas('kategori', function($query) use ($request){
        //     return $query->where('nama','like', '%' . $request->kategori . '%')
        //     ->orWhere('judul', 'like', '%' . $request->judul . '%')
        //     ->orWhere('kode', 'like', '%' . $request->kode . '%');
        // })->orWhereHas('penerbit', function($query) use ($request){
        //     return $query->where('nama','like', '%' . $request->penerbit . '%');
        // })->orWhereHas('pengarang', function($query) use ($request){
        //     return $query->where('nama','like', '%' . $request->pengarang . '%');
        // })->get();
 
        return view('antarmuka_anggota.hasil_cari_detail', compact('data'));
    }
}
