<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        'nomor_rak' => 'required',
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
        $buku->nomor_rak = $request->nomor_rak;
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
        $buku->kode =  str_pad($buku->nomor_rak, 2, 0, STR_PAD_LEFT) . '-' . str_pad($buku->kategori_buku_id, 2, 0, STR_PAD_LEFT) . '-' . str_pad($buku->id, 2, 0, STR_PAD_LEFT);
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

        $pengarang2 = DB::table('buku_pengarang')->where('buku_id',$idbuku)->get();
        $array = array();
        foreach ($pengarang2 as $key => $a) {
            $array[] = $a->pengarang_id;
        }
        $semuapengarang = Pengarang::whereIn('id', $array)->get('id');
        // dd($semuapengarang);
        return view('buku.edit_buku', compact('buku','kategori', 'nama', 'penerbit', 'namap', 'asal', 'namas', 'pengarang', 'namape', 'semuapengarang'));
    }

    public function editBuku(Request $request, $idbuku)
    {   
        $request->validate([
        'nomor_rak' => 'required',
        'judul' => 'required',
        'kategori' => 'required',
        'penerbit' => 'required',
        'pengarang' => 'required',
        'jumlah' => 'required|numeric',
        'halaman' => 'required|numeric',
        'asal' => 'required',
        'tanggal_diterima' => 'required|date',
        ]);
        $user = auth()->user();
        // dd($request->all());
        
        $buku = Buku::where('id', $idbuku)
            ->update([
                'kode' => str_pad($request->nomor_rak, 2, 0, STR_PAD_LEFT) . '-' . str_pad($request->kategori, 2, 0, STR_PAD_LEFT) . '-' . str_pad($idbuku, 2, 0, STR_PAD_LEFT),
                'judul' => $request->get('judul'),
                'kategori_buku_id' => $request->get('kategori'),
                'penerbit_id' => $request->get('penerbit'),
                'eksemplar' => $request->get('jumlah'),
                'user_id' =>$user->id,
                'halaman' => $request->get('halaman'),
                'sumber_buku_id' => $request->get('asal'),
                'tgl_diterima' => $request->get('tanggal_diterima'),
            ]);

        // $data = DB::table('buku_pengarang')->where('buku_id',$idbuku)->delete();
        // $pengarang = $request->pengarang;
        $buku2 = Buku::find($idbuku);
        $buku2->pengarang()->sync($request->pengarang);

        // foreach ($pengarang as $key => $p) {
        //     $baru = new 
        // }

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
