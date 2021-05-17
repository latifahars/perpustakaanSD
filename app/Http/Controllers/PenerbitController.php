<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    public function tampilPenerbit() {

        $penerbit = Penerbit::all();
        
        return view('buku.penerbit', compact('penerbit'));
    }

    public function tambahPenerbit(Request $request)
	{
		$request->validate([
	    'nama' => 'required|unique:App\Models\Penerbit,nama',
	    'kota' => 'required'
		]);

		$penerbit = new Penerbit();
		$penerbit->nama = $request->nama;
		$penerbit->kota =$request->kota;
		$penerbit->save();

		return back()->with('sukses', 'Tambah Penerbit Berhasil!');
	}

	public function editPenerbit(Request $request, $idpenerbit)
	{
		$request->validate([
	    'nama' => 'required',
	    'kota' => 'required'
		]);

		$penerbit = Penerbit::where('id', $idpenerbit)
            ->update([
                'nama' => $request->get('nama'),
                'kota' => $request->get('kota'),
            ]);
		return redirect('/data_buku/penerbit')->with('sukses', 'Edit Penerbit Berhasil!');
	}

	public function hapusPenerbit($idpenerbit) {
    	$penerbit = Penerbit::find($idpenerbit);
    	if ($penerbit) {
    		$penerbit->delete();
    	}

    	return back()->with('hapus', 'Hapus Penerbit Berhasil!');
    }
}
