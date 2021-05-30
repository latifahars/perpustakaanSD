<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;

class StrukturController extends Controller
{
    public function tampilStruktur() {

    	$kepsek = Struktur::where('jabatan','Kepala Sekolah')->first();
    	$keppus = Struktur::where('jabatan','Kepala Perpustakaan')->first();
    	$tu = Struktur::where('jabatan','Tata Usaha Perpustakaan')->first();
    	$bpt = Struktur::where('jabatan','Bagian Pelayanan Teknis')->first();
    	$bpp = Struktur::where('jabatan' ,'Bagian Pelayanan Pembaca')->first();
        return view('struktur_org', compact('kepsek', 'keppus', 'tu', 'bpt', 'bpp'));
    }

    public function editStruktur(Request $request, $idstruktur)
	{
		
		$request->validate([
	    'nama' => ['required', 'max:25'],
	    'jabatan' => 'required'
		]);
		
		$struktur = Struktur::find($idstruktur); 
		$struktur->nama = $request->nama;
	    $struktur->jabatan=$request->jabatan;

		$struktur->save();
		return redirect('/struktur_org')->with('struktur', 'Edit Nama Berhasil!');
	}
}
