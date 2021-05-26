<?php

namespace App\Imports;

use App\Models\SumberBuku;
use App\Models\Buku;
use App\Models\User;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\KategoriBuku;
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
        foreach ($collection as $key => $row) {
            if ($key >= 1) {

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
    }
}
