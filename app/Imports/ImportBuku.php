<?php

namespace App\Imports;

use App\Models\SumberBuku;
use App\Models\Buku;
use App\Models\User;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\DB;
use App\Imports\ImportBuku;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportBuku implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
    		 // dd($collection);
        DB::beginTransaction();
        if($collection->count() <= 1){
            DB::rollback();
            return back()->with('error', 'Import Data Buku Gagal, File Kosong!');
        }
        foreach ($collection as $key => $row) {
            if ($key >= 1) {

                if(empty($row[0])||empty($row[1])||empty($row[2])||empty($row[3])||empty($row[4])||empty($row[5])||empty($row[6])||empty($row[7])||empty($row[8])){
                    DB::rollback();
                    return back()->with('error', 'Import Data Buku Gagal, Perhatikan Format!');
                }
                if(!is_numeric($row[2])||!is_numeric($row[4])||!is_numeric($row[5])||!is_numeric($row[6])||!is_numeric($row[7])){
                    DB::rollback();
                    return back()->with('error', 'Import Data Buku Gagal, Perhatikan Format Pengisian! Kode harus ditulis dalam bentuk angka');
                }

                $tgl = ($row[8] - 25569) * 86400;
                $tanggal = gmdate('Y-m-d', $tgl);

                $user = auth()->user();

                $semua_pengarang = explode(".",$row[3]);

                $buku = new Buku();
                $buku->nomor_rak = $row[0];
                $buku->judul = $row[1];
                $buku->kategori_buku_id = $row[2];
                $buku->penerbit_id = $row[4];
                $buku->sumber_buku_id = $row[5];
                $buku->halaman = $row[6];
                $buku->eksemplar = $row[7];
                $buku->user_id = $user->id;
                $buku->tgl_diterima = $tanggal;
                
                $buku->save();
                $buku->kode =  str_pad($buku->nomor_rak, 2, 0, STR_PAD_LEFT) . '-' . str_pad($buku->kategori_buku_id, 2, 0, STR_PAD_LEFT) . '-' . str_pad($buku->id, 2, 0, STR_PAD_LEFT);
                $buku->save();
                $buku->pengarang()->sync($semua_pengarang);  

            }
        }
        DB::commit();
            return back()->with('sukses', 'Import Data Buku Berhasil!');
    }
}
