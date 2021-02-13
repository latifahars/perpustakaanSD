<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TransaksiController extends Controller
{
    public function tampilPeminjaman() 
    {
    	$peminjaman = Peminjaman::where('tgl_kembali', null)->get();

        return view('transaksi.peminjaman', compact('peminjaman'));
    }

	public function tampilTambahPeminjaman() 
    {
        return view('transaksi.tambah_peminjaman');
    }

    public function tambahPeminjaman(Request $request) 
    {
    	$request->validate([
    		'nis' => 'required|numeric',
    		'kode' => 'required',
        ]);

    	$peminjaman = new Peminjaman();

        $anggota = Anggota::where('nis', $request->nis)->first();
        $peminjaman->anggota_id = $anggota->id;

        $buku = Buku::where('kode', $request->kode)->first();
        $peminjaman->buku_id = $buku->id;

        $date = Carbon::today();
        $peminjaman->tgl_pinjam = Carbon::today();
        $peminjaman->deadline = $date->addWeeks($buku->kategori->deadline); 
        $peminjaman->save();

        return redirect('/peminjaman')->with('sukses', 'Tambah Peminjaman Berhasil!');
    }

    public function pengembalian($idtransaksi) 
    {
        $peminjaman = Peminjaman::find($idtransaksi);
        $peminjaman->tgl_kembali = new \DateTime();
        $peminjaman->save();
        return redirect('peminjaman')->with('sukses', 'Pengembalian Buku Berhasil!');
    }

    public function tampilRiwayat() 
    {
        $riwayat = Peminjaman::whereNotNull('tgl_kembali')->get();

        return view('transaksi.riwayat', compact('riwayat'));
    }
}