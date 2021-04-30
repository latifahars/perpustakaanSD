<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPeraga;
use App\Models\Peraga;
use Illuminate\Support\Facades\DB;


class KategoriPeragaController extends Controller
{
    public function tampilKategori() {

    	$peraga = Peraga::all();
    	$kategori = KategoriPeraga::withCount('peraga')->get();
    	return view('peraga.kategori_peraga', compact('kategori'));
    }

    public function tambahKategori(Request $request)
	{
		$request->validate([
	    'nama' => 'required',
		]);

		$kategori = new KategoriPeraga();
		$kategori->nama = $request->nama;
		$kategori->save();

		return back()->with('sukses', 'Tambah Kategori Berhasil!');
	}

    public function editKategori(Request $request, $idkategori)
	{
		$request->validate([
	    'nama' => 'required',
		]);
		
		$kategori = KategoriPeraga::find($idkategori);
	    $kategori->nama =$request->nama;

		$kategori->save();
		return redirect('/data_peraga/kategori')->with('sukses', 'Edit Kategori Berhasil!');
	}

	public function hapusKategori($idkategori) {
    	$kategori = KategoriPeraga::find($idkategori);
    	if ($kategori) {
    		$kategori->delete();
    	}

    	return redirect('/data_peraga/kategori')->with('hapus', 'Kategori Telah Dihapus!');
    }
}
