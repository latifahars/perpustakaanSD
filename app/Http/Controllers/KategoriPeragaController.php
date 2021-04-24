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
    	$kategori = KategoriPeraga::all();
    	$kategori1 = Peraga::where('kategori_peraga_id', '2')->sum('jumlah');
    	
    	$semua = Peraga::groupBy('kategori_peraga_id');
		$semua1 = DB::table('peraga')
                 ->select('kategori_peraga_id',DB::raw('sum(jumlah) as jumlah'))
                 ->groupBy('kategori_peraga_id')
                 ->get();
        $level1 = KategoriPeraga::join('peraga', 'peraga.kategori_peraga_id', '=', 'kategori_peraga.id')
            ->select('peraga.kategori_peraga_id',DB::raw('sum(jumlah) as jumlah'))
            ->groupBy('peraga.kategori_peraga_id')
            ->distinct()
            ->get();
    	return view('peraga.kategori_peraga', compact('peraga', 'level1','kategori','semua1'));
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
