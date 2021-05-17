<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SumberBuku;

class SumberBukuController extends Controller
{
    public function tampilSumber() {

        $sumber = SumberBuku::all();
        
        return view('buku.sumber_buku', compact('sumber'));
    }

    public function tambahSumber(Request $request)
	{
		$request->validate([
	    'nama' => 'required|unique:App\Models\SumberBuku,nama',
		]);

		$sumber = new SumberBuku();
		$sumber->nama = $request->nama;
		$sumber->save();

		return back()->with('sukses', 'Tambah Asal Buku Berhasil!');
	}

	public function editSumber(Request $request, $idsumber)
	{
		$request->validate([
	    'nama' => 'required'
		]);

		$sumber = SumberBuku::where('id', $idsumber)
            ->update([
                'nama' => $request->get('nama'),
            ]);
		return redirect('/data_buku/asal_perolehan')->with('sukses', 'Edit Asal Buku Berhasil!');
	}

	public function hapusSumber($idsumber) {
    	$sumber = SumberBuku::find($idsumber);
    	if ($sumber) {
    		$sumber->delete();
    	}

    	return back()->with('hapus', 'Hapus Asal Buku Berhasil!');
    }
}
