<?php

namespace App\Imports;

use App\Models\Anggota;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UpdateAnggota implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key >= 1) {

                $data = Anggota::where('nis',$row[0])
                    ->update([
                        'nama' => $row[1],
                        'kelas' => $row[2],
                    ])
            }
        }
    }
}