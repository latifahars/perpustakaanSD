<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;


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
        
        $bukupinjam = Buku::withCount('peminjaman')->where('kode', $request->kode)->first();
        if($bukupinjam->eksemplar == 0){
            return back()->with('hapus', 'Buku sudah tidak tersedia!');
        }else{
            $bukupinjam->decrement('eksemplar', 1);
        }

        // $anggotapinjam = Anggota::withCount('peminjaman')->where('nis', $request->nis)->where('tgl_kembali', null)->first();
        // dd($request->nis);
        $anggotapinjam = Anggota::where('nis', $request->nis)
                        ->withCount(['peminjaman' => function ($query) use ($request) {
                            $query->where('tgl_kembali', null)
                            ->whereHas('buku', function ($query) {
                                $query->whereHas('kategori', function($query){
                                    $query->where('nama', '!=', 'Buku Pelajaran');
                                });
                            });
                        }])->first();
        $sudahpinjam = $anggotapinjam->peminjaman()
                        ->where('tgl_kembali', null)
                        ->whereDate('tgl_pinjam', '=', Carbon::today())
                        ->first();

        if($anggotapinjam->peminjaman_count == 3){
            return back()->with('hapus', 'Anggota telah meminjam 3 buku!');
        }elseif($sudahpinjam){
            return back()->with('hapus', 'Anggota belum mengembalikan buku yang dipinjam sebelumnya!');
        }else{

        }


    	$peminjaman = new Peminjaman();
        $peminjaman->anggota_id = $anggotapinjam->id;

        $peminjaman->buku_id = $bukupinjam->id;

        $date = Carbon::today();
        $peminjaman->tgl_pinjam = Carbon::today();
        $peminjaman->deadline = $date->addWeeks($bukupinjam->kategori->deadline); 
        $peminjaman->save();

        return redirect('/peminjaman')->with('sukses', 'Tambah Peminjaman Berhasil!');
    }

    public function pengembalian($idtransaksi) 
    {
        $peminjaman = Peminjaman::find($idtransaksi);
        $buku = Buku::where('id', 'buku_id');
        $tambahbuku = new Buku;
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