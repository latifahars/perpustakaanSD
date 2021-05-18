<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\User;
use App\Models\SumberBuku;
use App\Imports\ImportBuku;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


class BukuController extends Controller
{
    public function tampilBuku() {

        $buku = Buku::with('kategori','sumber')->orderBy('created_at', 'desc')->get();
        
        return view('buku.data_buku', compact('buku'));
    }

    public function tampilTambahBuku() {

        $kategori = KategoriBuku::all();
        $penerbit = Penerbit::all();
        $asal = SumberBuku::all();
        $pengarang = Pengarang::all();

        return view('buku.tambah_buku', compact('kategori', 'penerbit', 'asal', 'pengarang'));
    }

    public function tambahBuku(Request $request) 
    {
        $request->validate([
        'kode' => 'required|unique:App\Models\Buku,kode',
        'judul' => 'required',
        'kategori' => 'required',
        'penerbit' => 'required',
        'pengarang' => 'required',
        'jumlah' => 'required|numeric',
        'halaman' => 'required|numeric',
        'asal' => 'required',
        'tanggal_diterima' => 'required|date',
        ]);
         // dd($request->pengarang);
        $user = auth()->user();
        $buku = new Buku();
        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori_buku_id = $request->kategori;
        $buku->penerbit_id = $request->penerbit;
        $buku->user_id = $user->id;
        $buku->eksemplar = $request->jumlah;
        $buku->halaman = $request->halaman;
        $buku->sumber_buku_id = $request->asal;
        $buku->tgl_diterima = $request->tanggal_diterima;

        // dd($buku->pengarang());
        $buku->save();
        $buku->pengarang()->sync($request->pengarang);
        return redirect('/data_buku')->with('sukses', 'Tambah Buku Berhasil!');
    }

    public function tampilEditBuku($idbuku) 
    {
        $buku = Buku::find($idbuku);
        $kategori= KategoriBuku::all();
        $nama = $buku->kategori_buku_id;
        $penerbit= Penerbit::all();
        $namap = $buku->penerbit_id;
        $asal = SumberBuku::all();
        $namas = $buku->sumber_buku_id;
        $pengarang= Pengarang::all();
        $namape = $buku->pengarang;


        return view('buku.edit_buku', compact('buku','kategori', 'nama', 'penerbit', 'namap', 'asal', 'namas', 'pengarang', 'namape'));
    }

    public function editBuku(Request $request, $idbuku)
    {   
        $request->validate([
        'kode' => 'required',
        'judul' => 'required',
        'kategori' => 'required',
        'penerbit' => 'required',
        'penerbit' => 'required',
        'jumlah' => 'required|numeric',
        'halaman' => 'required|numeric',
        'asal' => 'required',
        'tanggal_diterima' => 'required|date',
        ]);
        $user = auth()->user();
        
        $buku = Buku::where('id', $idbuku)
            ->update([
                'kode' => $request->get('kode'),
                'judul' => $request->get('judul'),
                'kategori_buku_id' => $request->get('kategori'),
                'penerbit_id' => $request->get('penerbit'),
                'eksemplar' => $request->get('jumlah'),
                'user_id' =>$user->id,
                'halaman' => $request->get('halaman'),
                'sumber_buku_id' => $request->get('asal'),
                'tgl_diterima' => $request->get('tanggal_diterima'),
            ]);
        
        // $buku = Buku::find($idbuku);

        // if ($penerbit = Penerbit::where('nama', $request->penerbit)->first()){
            
        // } else{
        //     $penerbit = new Penerbit();
        //     $penerbit->nama = $request->penerbit;
        //     $penerbit->kota = $request->kota;
        //     $penerbit->save();
        // }
        // if ($sumber = SumberBuku::where('nama', $request->asal)->first()){
            
        // } else{
        //     $sumber = new SumberBuku();
        //     $sumber->nama = $request->asal;
        //     $sumber->save();
        // }
        // dd($buku->kode);
        // $buku->kode = $request->kode;
        // $buku->judul = $request->judul;
        // $buku->kategori_buku_id = $request->kategori;
        // $buku->penerbit_id = $request->penerbit;
        // $buku->eksemplar = $request->jumlah;
        // $buku->halaman = $request->halaman;
        // $buku->sumber_buku_id = $request->asal;
        // $buku->tgl_diterima = $request->tanggal_diterima;
        return redirect('/data_buku')->with('sukses', 'Edit Buku Berhasil!');
    }

    public function hapusBuku($idbuku)
    {
        $buku = Buku::find($idbuku);
        if ($buku) {
            $buku->delete();
        }

        return redirect('/data_buku')->with('hapus', 'Hapus Buku Berhasil!');
    }

    public function tampilDetailBuku($idbuku) 
    {
        $buku = Buku::find($idbuku);
        // dd($buku->user_id);
        return view('buku.detail_buku', compact('buku'));
    }

    public function tampilImportBuku() 
    {
        return view('buku.import_buku');
    }

    public function importBuku(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Buku', $namaFile);

        Excel::import(new ImportBuku, public_path('/Buku/' . $namaFile));
        File::delete(public_path('/Buku/' . $namaFile));

        return redirect('/data_buku')->with('sukses', 'Import Data Buku Berhasil!');
    }
}
