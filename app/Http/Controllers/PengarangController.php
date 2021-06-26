<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengarang;

class PengarangController extends Controller
{
    public function tampilPengarang() {

        $pengarang = Pengarang::all();
        
        return view('buku.pengarang', compact('pengarang'));
    }

    public function tambahPengarang(Request $request)
	{
		$request->validate([
	    'nama' => 'required',
		]);

		$pengarang = new Pengarang();
		$pengarang->nama = $request->nama;
		$pengarang->email = $request->email;
		$pengarang->save();

		return back()->with('sukses', 'Tambah Pengarang Buku Berhasil!');
	}

	public function editPengarang(Request $request, $idpengarang)
	{
		$request->validate([
	    'nama' => 'required',
		]);

		$pengarang = Pengarang::where('id', $idpengarang)
            ->update([
                'nama' => $request->get('nama'),
                'email' => $request->get('email'),
            ]);
		return redirect('/data_buku/pengarang')->with('sukses', 'Edit Pengarang Buku Berhasil!');
	}

	public function hapusPengarang($idpengarang) {
    	$pengarang = Pengarang::find($idpengarang);
    	if ($pengarang) {
    		$pengarang->delete();
    	}

    	return back()->with('hapus', 'Hapus Pengarang Buku Berhasil!');
    }
}
