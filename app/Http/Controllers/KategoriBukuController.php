<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use Carbon\Carbon;

class KategoriBukuController extends Controller
{
    public function tampilKategori()
    {
        // SELECT * FROM Kategori
        $kategori = KategoriBuku::all();
        
        return view('buku.kategori_buku', compact('kategori'));
    }

    public function tambahKategori(Request $request)
	{
		$request->validate([
	    'nama' => 'required',
	    'batas_peminjaman' => 'required|numeric'
		]);

		$kategori = new KategoriBuku();
		$kategori->nama = $request->nama;
		$kategori->deadline =$request->batas_peminjaman;
		$kategori->save();

		return back()->with('sukses', 'Tambah Kategori Berhasil!');
	}

	public function editKategori(Request $request, $idkategori)
	{
		
		$request->validate([
	    'nama' => 'required',
	    'batas_peminjaman' => 'required|numeric'
		]);
		$kategori = KategoriBuku::where('id', $idkategori)
            ->update([
                'nama' => $request->get('nama'),
                'deadline' => $request->get('batas_peminjaman'),
            ]);
        // $date = Carbon::today();
        // $peminjaman = Peminjaman::whereHas('buku', function ($query) {
        //                         $query->whereHas('kategori', function($query){
        //                             $query->where('id', "=", $idkategori);
        //                         });
        //                     })->update([
        //     							'deadline' => $date->addWeeks($request->get('batas_peminjaman'))
        // 							]);
		return redirect('/data_buku/kategori')->with('sukses', 'Edit Kategori Berhasil!');
	}

	public function hapusKategori($idkategori) {
    	$kategori = KategoriBuku::find($idkategori);
    	if ($kategori) {
    		$kategori->delete();
    	}

    	return back()->with('hapus', 'Hapus Kategori Berhasil!');
    }
}
