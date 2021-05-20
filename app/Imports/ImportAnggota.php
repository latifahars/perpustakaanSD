<?php

namespace App\Imports;

use App\Models\Anggota;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportAnggota implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key >= 1) {

                $ada = Anggota::where('nis', $row[0])->first();

                if($ada == null){  
                    Anggota::create([
                        'nis' => $row[0],
                        'nama' => $row[1],
                        'kelas' => $row[2],
                    ]);
                }
                else{
                    $data = Anggota::where('nis',$row[0])
                        ->update([
                            'nama' => $row[1],
                            'kelas' => $row[2],
                        ]); 
                }
            }
        }
    }
}