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
use PDF;


class TransaksiController extends Controller
{
    public function tampilPeminjaman() 
    {
    	$peminjaman = Peminjaman::where('tgl_kembali', null)->orderBy('created_at', 'desc')->get();
        $today = Carbon::now()-> format('Y-m-d');
        $tahun = Peminjaman::selectRaw('YEAR(tgl_pinjam) as tahun')->groupBy('tahun')->get();


        return view('transaksi.peminjaman', compact('peminjaman', 'today', 'tahun'));
    }

	public function tampilTambahPeminjaman() 
    {  
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('transaksi.tambah_peminjaman', compact('anggota', 'buku'));
    }

    public function tambahPeminjaman(Request $request) 
    {
    	$request->validate([
    		'nis' => 'required|numeric',
    		'kode' => 'required',
        ]);
        
        $bukupinjam = Buku::withCount('peminjaman')->where('kode', $request->kode)->first();

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
                        ->whereHas('buku', function ($query) {
                                $query->whereHas('kategori', function($query){
                                    $query->where('nama', '!=', 'Buku Pelajaran');
                                });
                            })
                        ->where('tgl_kembali', null)
                        ->whereDate('tgl_pinjam', '<', Carbon::today())
                        ->first();

        if($anggotapinjam->peminjaman_count == 3){
            return back()->with('hapus', 'Anggota telah meminjam 3 buku!');
        }elseif($bukupinjam->kategori->nama != 'Buku Pelajaran' && $sudahpinjam){
            return back()->with('hapus', 'Anggota belum mengembalikan buku yang dipinjam sebelumnya!');
        }elseif($bukupinjam->eksemplar == 0){
            return back()->with('hapus', 'Buku sudah tidak tersedia!');
        }else{
            $bukupinjam->decrement('eksemplar', 1);
        }

        $nis = $request->nis;
        $kode = $request->kode;
        $namaBelum = Anggota::where('nis', $nis)->first();
        $nama = $namaBelum->nama;
        $judulBelum = Buku::where('kode', $kode)->first();
        $judul = $judulBelum->judul;

    	$peminjaman = new Peminjaman();
        $peminjaman->anggota_id = $anggotapinjam->id;

        $peminjaman->buku_id = $bukupinjam->id;

        $date = Carbon::today();
        $peminjaman->tgl_pinjam = Carbon::today();
        $peminjaman->deadline = $date->addWeeks($bukupinjam->kategori->deadline);
        $peminjaman->save();
        $anggota = Anggota::all();
        $buku = Buku::all();
        $id = Peminjaman::orderBy('created_at', 'desc')->first()->id;

        // return view('transaksi.tambah_peminjaman',compact('nis', 'anggota', 'buku'),['tulisan'=>'Property is updated .']);
        // return redirect()->route('tambah')->with( ['nis' => $nis] );
        return view('transaksi.tambah_peminjaman')->with('anggota', $anggota)->with('kode', $kode)->with('buku', $buku)->with('nis', $nis)->with('nama', $nama)->with('judul', $judul)->with('id', $id);
        // return view('transaksi.tambah_peminjaman', compact('nis','nama','kode', 'judul'));
        // return redirect('/peminjaman/tambah_peminjaman')->with('anggota', $anggota)->with('kode', $kode)->with('buku', $buku)->with('nis', $nis)->with('nama', $nama)->with('judul', $judul);
    }

    public function pengembalian($idtransaksi) 
    {
        $peminjaman = Peminjaman::find($idtransaksi);
        $peminjaman->tgl_kembali = Carbon::now()->format('Y-m-d H:i');;
        $buku = $peminjaman->buku();
        $buku->increment('eksemplar', 1);
        $peminjaman->save();
        return redirect('/peminjaman')->with('sukses', 'Pengembalian Buku Berhasil!');
    }

    public function tampilLewatDeadline() 
    {
        $lewat = Peminjaman::where('tgl_kembali', null)
                    ->whereDate('deadline','<',Carbon::today())
                    ->get();
        $today = Carbon::now()-> format('Y-m-d');

        return view('transaksi.lewat_deadline', compact('lewat', 'today'));
    }

    public function tampilRiwayat() 
    {
        $riwayat = Peminjaman::whereNotNull('tgl_kembali')->orderBy('tgl_kembali', 'desc')->get();


        return view('transaksi.riwayat', compact('riwayat'));
    }

    public function cetakLaporan(Request $request)
    {
        $request->validate([
            'bulan_awal' => ['required'],
            'bulan_akhir' => ['required'],
            'tahun' => ['required'],
        ]);
        // $tahun = Peminjaman::selectRaw('MONTH(tgl_pinjam) as tahun')->groupBy('tahun')->get();
        $data = Peminjaman::whereMonth('tgl_pinjam', '>=', $request->bulan_awal)
                ->whereMonth('tgl_pinjam', '<=', $request->bulan_akhir)
                ->whereYear('tgl_pinjam', $request->tahun)
                ->orderBy('tgl_pinjam', 'asc')->get();
        $tahun = $request->tahun;
        $test1 = '2000'.$request->bulan_awal.'01';
        $test2 = '2000'.$request->bulan_akhir.'01';
        $bulan_awal = Carbon::parse($test1)->translatedFormat('F');
        $bulan_akhir = Carbon::parse($test2)->translatedFormat('F'); 

        $pdf = PDF::loadView('transaksi.cetak_laporan', compact('data', 'bulan_awal', 'bulan_akhir', 'tahun'))->setPaper('A4', 'landscape');
        // return $pdf->download('Laporan.pdf');

        return $pdf->stream('Laporan Peminjaman Buku.pdf');
    }
}