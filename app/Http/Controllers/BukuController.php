<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Penerbit;
use App\Models\SumberBuku;

class BukuController extends Controller
{
    public function tampilBuku() {

        $buku = Buku::with('kategori','sumber')->get();

        return view('buku.data_buku', compact('buku'));
    }

    public function cariBuku(Request $request)
    {
        $buku = Buku::whereHas('kategori', function($query) use ($request){
            return $query->where('nama','like', '%' . $request->cari . '%')
            ->orWhere('judul', 'like', '%' . $request->cari . '%')
            ->orWhere('tgl_diterima', 'like', '%' . $request->cari . '%')
            ->orWhere('kode', 'like', '%' . $request->cari . '%');
        })->orWhereHas('penerbit', function($query) use ($request){
            return $query->where('nama','like', '%' . $request->cari . '%')
            ->orWhere('kota','like', '%' . $request->cari . '%');
        })->orWhereHas('sumber', function($query) use ($request){
            return $query->where('nama','like', '%' . $request->cari . '%');
        })->get();
 
        return view('buku.cari_buku', compact('buku'));
    }

    public function tampilTambahBuku() {

        $kategori = KategoriBuku::all();
        return view('buku.tambah_buku', compact('kategori'));
    }

    public function tambahBuku(Request $request) 
    {
        $request->validate([
        'kode' => 'required',
        'judul' => 'required',
        'kategori' => 'required',
        'penerbit' => 'required',
        'kota' => 'required',
        'eksemplar' => 'required|numeric',
        'halaman' => 'required|numeric',
        'sumber' => 'required',
        'tgl_diterima' => 'required|date',
        ]);

        if ($penerbit = Penerbit::where('nama', $request->penerbit)->first()){

        } else{
            $penerbit = new Penerbit();
            $penerbit->nama = $request->penerbit;
            $penerbit->kota = $request->kota;
            $penerbit->save();
        }
        if ($sumber = SumberBuku::where('nama', $request->sumber)->first()){
            
        } else{
            $sumber = new SumberBuku();
            $sumber->nama = $request->sumber;
            $sumber->save();
        }

        $buku = new Buku();
        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori_buku_id = $request->kategori;
        $buku->penerbit_id = $penerbit->id;
        $buku->eksemplar = $request->eksemplar;
        $buku->halaman = $request->halaman;
        $buku->sumber_buku_id = $sumber->id;
        $buku->tgl_diterima = $request->tgl_diterima;
        
        $buku->save();
        return redirect('/data_buku')->with('sukses', 'Tambah Buku Berhasil!');
    }

    public function tampilEditBuku($idbuku) 
    {
        $buku = Buku::find($idbuku);
        $kategori= KategoriBuku::all();

        return view('buku.edit_buku', compact('buku','kategori'));
    }

    public function editBuku(Request $request, $idbuku)
    {
        $buku = Buku::find($idbuku);

        if ($penerbit = Penerbit::where('nama', $request->penerbit)->first()){
            
        } else{
            $penerbit = new Penerbit();
            $penerbit->nama = $request->penerbit;
            $penerbit->kota = $request->kota;
            $penerbit->save();
        }
        if ($sumber = SumberBuku::where('nama', $request->sumber)->first()){
            
        } else{
            $sumber = new SumberBuku();
            $sumber->nama = $request->sumber;
            $sumber->save();
        }

        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori_buku_id = $request->kategori;
        $buku->penerbit_id = $penerbit->id;
        $buku->eksemplar = $request->eksemplar;
        $buku->halaman = $request->halaman;
        $buku->sumber_buku_id = $sumber->id;
        $buku->tgl_diterima = $request->tgl_diterima;

        $buku->save();
        return redirect('/data_buku')->with('sukses', 'Edit Buku Berhasil!');
    }

    public function hapusBuku($idbuku)
    {
        $buku = Buku::find($idbuku);
        if ($buku) {
            $buku->delete();
        }

        return redirect('data_buku')->with('hapus', 'Hapus Buku Berhasil!');
    }

    public function tampilDetailBuku($idbuku) 
    {
        $buku = Buku::find($idbuku);
        return view('buku.detail_buku', compact('buku'));
    }
    public function tampilImportBuku() 
    {
        return view('buku.import_buku');
    }
}
