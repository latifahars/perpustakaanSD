<?php

namespace App\Imports;

use App\Models\SumberBuku;
use App\Models\Buku;
use App\Models\User;
use App\Models\Penerbit;
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
        foreach ($collection as $key => $row) {
            if ($key >= 1) {

            	$tgl = ($row[8] - 25569) * 86400;
                $tanggal = gmdate('Y-m-d', $tgl);

            	if ($penerbit = Penerbit::where('nama', $row[3])->first()){

		        } else{
		            $penerbit = new Penerbit();
		            $penerbit->nama = $row[3];
		            $penerbit->kota = $row[4];
		            $penerbit->save();
		        }
		        if ($sumber = SumberBuku::where('nama', $row[5])->first()){
		            
		        } else{
		            $sumber = new SumberBuku();
		            $sumber->nama = $row[5];
		            $sumber->save();
		        }
    			$user = auth()->user();

		        $buku = new Buku();
		        $buku->kode = $row[0];
		        $buku->judul = $row[1];
		        $buku->kategori_buku_id = $row[2];
		        $buku->penerbit_id = $penerbit->id;
		        $buku->eksemplar = $row[7];
		        $buku->user_id = $user->id;
		        $buku->halaman = $row[6];
		        $buku->sumber_buku_id = $sumber->id;
		        $buku->tgl_diterima = $tanggal;
		        
		        $buku->save();
            }
        }
    }
}
