<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use App\Imports\ImportAnggota;
use PDF;

class AnggotaController extends Controller
{
    public function tampilAnggota() 
    {
        $anggota = Anggota::orderBy('created_at', 'desc')->get();
        
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
    public function updateAnggota(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Anggota', $namaFile);

        Excel::import(new UpdateAnggota, public_path('/Anggota/' . $namaFile));
        File::delete(public_path('/Anggota/' . $namaFile));

        return redirect('/data_anggota')->with('sukses', 'Import Data Anggota Berhasil!');
    }

    public function tampilCetakAnggota()
    {
        $anggota = Anggota::all();

        // return view('anggota.cetak_kartu', compact('anggota'));
        return view('anggota.cetak_kartu');
    }

    public function cetakKartu(Request $request)
    {
        $request->validate([
            'cetak' => ['required'],
        ]);

        $cetak = $request->cetak;
        foreach ($cetak as $key => $value) {
            $array[] = $value;
        }
        $data = Anggota::findMany($array);

        $pdf = PDF::loadView('anggota.kartu_anggota', compact('data'))->setPaper('A4', 'potrait');
        // return $pdf->download('Kartu Anggota.pdf');

        return $pdf->stream('Kartu Anggota Perpustakaan.pdf');
        // return view('anggota.kartu_anggota', compact('data'));
    }

    public function cariAnggota(Request $request)

    {
        if($request->ajax())
         {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
               $data = Anggota::where('nama', 'like', '%'.$query.'%')
                 ->orWhere('nis', 'like', '%'.$query.'%')
                 ->orWhere('kelas', 'like', '%'.$query.'%')
                 ->orWhere('updated_at', 'like', '%'.$query.'%')
                 ->orderBy('nama', 'asc')
                 ->get();  
            }
            else
              {
                   $data = Anggota::all();
              }
          $total_row = $data->count();
          if($total_row > 0)
          {
           foreach($data as $key=>$a)
           {
            $output .= '
            <tr>'.
                '<td>'.($key+1).'</td>'.

                '<td>'.$a->nis.'</td>'.

                '<td>'.$a->nama.'</td>'.

                '<td>'.$a->kelas.'</td>'.

                '<td>'.\Carbon\Carbon::parse($a->updated_at)->format('d-m-Y H:i').'</td>'.

                '<td>'.'<center>'.
                        '<div class="form-check">'.
                          '<input class="form-check-input" type="checkbox" value="'.$a->id.'"  name="cetak[]">'
                        .'</div>'
                    .'</center>'.'</td>'.
            '</tr>';
           }
          }
          else
          {
           $output = '
           <tr>
            <td align="center" colspan="6">Data tidak ditemukan</td>
           </tr>
           ';
          }
          $data = array(
           'table_data'  => $output,
          );

          return response()->json($data);
         }

    }    

}
