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

        $buku = Buku::with('kategori')->get();

        return view('buku.data_buku', compact('buku'));
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
            $sumber = new SumberBuku();
            $sumber->nama = $request->sumber;
            $sumber->save();
        } else{
            $sumber = SumberBuku::where('nama', $request->sumber)->first();
        }

        $buku = new Buku();
        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori_buku_id = $request->kategori;
        $penerbit->id;
        $buku->eksemplar = $request->eksemplar;
        $buku->halaman = $request->halaman;
        $sumber->id;
        $buku->tgl_diterima = $request->tgl_diterima;
        
        $buku->save();
        return redirect('/data_buku')->with('sukses', 'Tambah Buku Berhasil!');
    }

    public function tampilEditBuku($idbuku) 
    {
        $buku = Buku::find($idbuku);

        return view('buku.edit_buku', compact('buku'));
    }

    public function editBuku(Request $request, $idbuku)
    {
        $buku = Buku::find($idbuku);
        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori = $request->kategori;
        $buku->penerbit = $request->penerbit;
        $buku->eksemplar = $request->eksemplar;
        $buku->halaman = $request->halaman;
        $buku->sumber = $request->sumber;
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

        return redirect('data_anggota')->with('hapus', 'Hapus Anggota Berhasil!');
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
