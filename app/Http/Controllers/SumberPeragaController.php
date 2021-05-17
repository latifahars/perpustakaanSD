<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SumberPeraga;

class SumberPeragaController extends Controller
{
    public function tampilSumber() {

        $sumber = SumberPeraga::all();
        
        return view('peraga.sumber_peraga', compact('sumber'));
    }

    public function tambahSumber(Request $request)
	{
		$request->validate([
	    'nama' => 'required|unique:App\Models\SumberPeraga,nama',
		]);

		$sumber = new SumberPeraga();
		$sumber->nama = $request->nama;
		$sumber->save();

		return back()->with('sukses', 'Tambah Asal Peraga Berhasil!');
	}

	public function editSumber(Request $request, $idsumber)
	{
		$request->validate([
	    'nama' => 'required'
		]);

		$sumber = SumberPeraga::where('id', $idsumber)
            ->update([
                'nama' => $request->get('nama'),
            ]);
		return redirect('/data_peraga/asal_perolehan')->with('sukses', 'Edit Asal Peraga Berhasil!');
	}

	public function hapusSumber($idsumber) {
    	$sumber = SumberPeraga::find($idsumber);
    	if ($sumber) {
    		$sumber->delete();
    	}

    	return back()->with('hapus', 'Hapus Asal Peraga Berhasil!');
    }
}
