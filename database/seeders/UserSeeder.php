<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KategoriBuku;
use App\Models\Struktur;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////////////////////////////////////////User
        if (User::where('email', 'petugas@gmail.com')->get()->isEmpty()) {
            $user = new User();
            $user->name = 'Petugas Perpus';
            $user->email = 'petugas@gmail.com';
            $user->password = Hash::make('petugas');

            $user->save();
        }

        //////////////////////////////////Kategori Buku
        $kategoribuku = new KategoriBuku();
        $kategoribuku->nama = 'Buku Pelajaran';
        $kategoribuku->deadline = '24';

        $kategoribuku->save();

        ///////////////////////////////Struktur Organisasi
        $struktur = new Struktur();
        $struktur->nama = 'Isi Nama 1';
        $struktur->jabatan = 'Kepala Sekolah';

        $struktur->save();

        $struktur = new Struktur();
        $struktur->nama = 'Isi Nama 2';
        $struktur->jabatan = 'Kepala Perpustakaan';

        $struktur->save();

        $struktur = new Struktur();
        $struktur->nama = 'Isi Nama 3';
        $struktur->jabatan = 'Tata Usaha Perpustakaan';

        $struktur->save();

        $struktur = new Struktur();
        $struktur->nama = 'Isi Nama 4';
        $struktur->jabatan = 'Bagian Pelayanan Teknis';

        $struktur->save();

        $struktur = new Struktur();
        $struktur->nama = 'Isi Nama 5';
        $struktur->jabatan = 'Bagian Pelayanan Pembaca';

        $struktur->save();
    }
}