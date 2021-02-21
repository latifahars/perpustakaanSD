<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;

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
	    'deadline' => 'required'
		]);

		$kategori = new KategoriBuku();
		$kategori->nama = $request->nama;
		$kategori->deadline =$request->deadline;
		$kategori->save();

		return back()->with('sukses', 'Tambah Kategori Berhasil!');
	}

	public function tampilEditKategori($idkategori)
	{
		$kategori = KategoriBuku::find($idkategori);
		return view('buku.edit_kategori', compact('kategori'));
	}

	public function editKategori(Request $request, $idkategori)
	{
		
		$request->validate([
	    'nama' => 'required',
	    'deadline' => 'required'
		]);
		
		$kategori = KategoriBuku::find($idkategori);
	    $kategori->nama =$request->nama;
	    $kategori->deadline =$request->deadline;

		$kategori->save();
		return redirect('data_buku/kategori')->with('sukses', 'Edit Kategori Berhasil!');
	}

	public function hapusKategori($idkategori) {
    	$kategori = KategoriBuku::find($idkategori);
    	if ($kategori) {
    		$kategori->delete();
    	}

    	return back()->with('hapus', 'Hapus Kategori Berhasil!');
    }
}
