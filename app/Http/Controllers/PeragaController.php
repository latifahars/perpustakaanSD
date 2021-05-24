<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peraga;
use App\Models\User;
use App\Models\KategoriPeraga;
use App\Models\SumberPeraga;

class PeragaController extends Controller
{
   	public function tampilPeraga() {

   		$peraga = Peraga::with('kategori')->orderBy('created_at', 'desc')->get();

        return view('peraga.data_peraga', compact('peraga'));
    }

    public function tampilTambahPeraga() {

    	$kategori= KategoriPeraga::all();
        $asal = SumberPeraga::all();

        return view('peraga.tambah_peraga', compact('kategori', 'asal'));
    }

    public function tambahPeraga(Request $request) 
    {
        $request->validate([
        'nama' => 'required','max:30',
        'kategori' => 'required',
        'asal' => 'required',
        'tgl_diterima' => 'required|date',
        'jumlah' => 'required|numeric',
        ]);

        $user = auth()->user();
        $peraga = new Peraga();
        $peraga->nama = $request->nama;
        $peraga->user_id = $user->id;
        $peraga->kategori_peraga_id = $request->kategori;
        $peraga->sumber_peraga_id = $request->asal;
        $peraga->tgl_diterima = $request->tgl_diterima;
        $peraga->jumlah = $request->jumlah;

        $peraga->save();
        $peraga->kode =  str_pad($peraga->kategori_peraga_id, 2, 0, STR_PAD_LEFT) . '-' . str_pad($peraga->sumber_peraga_id, 2, 0, STR_PAD_LEFT) . '-' . str_pad($peraga->id, 2, 0, STR_PAD_LEFT);
        $peraga->save();
        return redirect('/data_peraga')->with('sukses', 'Tambah Peraga Berhasil!');
    }

    public function tampilEditPeraga($idperaga) {

    	$peraga = Peraga::find($idperaga);
    	$kategori= KategoriPeraga::all();
        $nama = $peraga->kategori_peraga_id;
        $asal = SumberPeraga::all();
        $namas = $peraga->sumber_peraga_id;

        return view('peraga.edit_peraga', compact('peraga','kategori', 'nama', 'asal', 'namas'));
    }

    public function editPeraga(Request $request, $idperaga)
    {
        $request->validate([
        'nama' => 'required','max:30',
        'kategori' => 'required',
        'asal' => 'required',
        'tgl_diterima' => 'required|date',
        'jumlah' => 'required|numeric',
        ]);
        $user = auth()->user();

       	$peraga = Peraga::find($idperaga)
                ->update([
                    'nama' => $request->get('nama'),
                    'kode' => str_pad($request->kategori, 2, 0, STR_PAD_LEFT) . '-' . str_pad($request->asal, 2, 0, STR_PAD_LEFT) . '-' . str_pad($idperaga, 2, 0, STR_PAD_LEFT),
                    'user_id' => $user->id,
                    'kategori_peraga_id' => $request->get('kategori'),
                    'sumber_peraga_id' => $request->get('asal'),
                    'tgl_diterima' => $request->get('tgl_diterima'),
                    'jumlah' => $request->get('jumlah'),
        ]);

        return redirect('/data_peraga')->with('sukses', 'Edit Peraga Berhasil!');
    }

     public function hapusPeraga($idperaga) 
     {
        $peraga = Peraga::find($idperaga);
        if ($peraga) {
            $peraga->delete();
        }

        return redirect('/data_peraga')->with('hapus', 'Peraga Telah Dihapus!');
    }

}
