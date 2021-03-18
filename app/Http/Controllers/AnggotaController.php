<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use App\Imports\ImportAnggota;

class AnggotaController extends Controller
{
    public function tampilAnggota() 
    {

        $anggota = Anggota::all();
        
        return view('anggota.data_anggota', compact('anggota'));
    }

    public function tampilTambahAnggota() 
    {
        return view('anggota.tambah_anggota');
    }

    public function tambahAnggota(Request $request) 
    {
        $request->validate([
        'nama' => ['required', 'max:30'],
        'nis' => 'required|numeric|unique:App\Models\Anggota,nis',
        'kelas' => 'required'
        ]);

        $anggota = new Anggota();
        $anggota->nama = $request->nama;
        $anggota->nis =$request->nis;
        $anggota->kelas =$request->kelas;
        $anggota->save();

        return redirect('/data_anggota')->with('sukses', 'Tambah Anggota Berhasil!');
    }

    public function tampilEditAnggota($idanggota)
    {
        $anggota = Anggota::find($idanggota);
        return view('anggota.edit_anggota', compact('anggota'));
    }

    public function editAnggota(Request $request, $idanggota)
    {
        $request->validate([
        'nama' => ['required', 'max:30'],
        'nis' => 'required|numeric',
        'kelas' => 'required'
        ]);
        
        $anggota = Anggota::find($idanggota);
        $anggota->nama =$request->nama;
        $anggota->nis =$request->nis;
        $anggota->kelas =$request->kelas;

        $anggota->save();
        return redirect('/data_anggota')->with('sukses', 'Edit Anggota Berhasil!');
    }

    public function hapusAnggota($idanggota)
    {
        $anggota = Anggota::find($idanggota);
        if ($anggota) {
            $anggota->delete();
        }

        return redirect('/data_anggota')->with('hapus', 'Hapus Anggota Berhasil!');
    }

    public function tampilImportAnggota() {
        return view('anggota.import_anggota');
    }

    public function importAnggota(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Anggota', $namaFile);

        Excel::import(new ImportAnggota, public_path('/Anggota/' . $namaFile));
        File::delete(public_path('/Anggota/' . $namaFile));

        return redirect('/data_anggota')->with('sukses', 'Import Data Anggota Berhasil!');
    }
}
