<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Support\Str;


class TransaksiController extends Controller
{
    public function tampilPeminjaman() 
    {
    	$peminjaman = Peminjaman::all();

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
        return view('transaksi.peminjaman', compact('peminjaman'));
    }

    public function tampilPengembalian() 
    {
        return view('transaksi.pengembalian');
    }
}