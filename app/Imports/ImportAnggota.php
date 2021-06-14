<?php

namespace App\Imports;

use App\Models\Anggota;
use App\Models\User;
use App\Imports\ImportAnggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportAnggota implements ToCollection
{
    public function collection(Collection $collection)
    {
        if($collection->count() <= 1){
            DB::rollback();
            return back()->with('error', 'Import Data Anggota Gagal, File Kosong!');
        }
        DB::beginTransaction();
        foreach ($collection as $key => $row) {
            if ($key >= 1) {

                if(empty($row[0])||empty($row[1])||empty($row[2])){
                    DB::rollback();
                    return back()->with('error', 'Import Data Anggota Gagal, Perhatikan Format!');
                }
                if(!is_numeric($row[0])){
                    DB::rollback();
                    return back()->with('error', 'Import Data Anggota Gagal, Perhatikan Format Pengisian!');
                }

                $ada = Anggota::where('nis', $row[0])->first();
                $user = auth()->user();

                if($ada == null){  
                    Anggota::create([
                        'nis' => $row[0],
                        'nama' => $row[1],
                        'kelas' => $row[2],
                        'user_id' => $user->id,
                    ]);
                }
                else{
                    $data = Anggota::where('nis',$row[0])
                        ->update([
                            'nama' => $row[1],
                            'kelas' => $row[2],
                            'user_id' => $user->id,
                        ]); 
                }
            }
        }
        DB::commit();
            return back()->with('sukses', 'Import Data Anggota Berhasil!');  
    }
}