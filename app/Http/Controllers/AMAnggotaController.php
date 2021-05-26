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
            $data = Buku::query();

            if($kode != ''){
                $data->where('kode', $kode);
            }
            if($judul != ''){
                $data->where('judul', 'like', '%' . $judul . '%');
            }
            if($penerbit != ''){
                $data->whereHas('penerbit', function($query) use ($penerbit){
                    return $query->where('nama','like', '%' . $penerbit . '%');
                });
            }
            if($kategori != ''){
                $data->whereHas('kategori', function($query) use ($kategori){
                    return $query->where('nama','like', '%' . $kategori . '%');
                });
            }
            if($pengarang != ''){
                $data->whereHas('pengarang', function($query) use ($pengarang){
                    return $query->where('nama','like', '%' . $pengarang . '%');
                });
            }
         $data = $data->get();   
        }
        // dd($data);
 
        return view('antarmuka_anggota.hasil_cari_detail', compact('data'));
    }
}
