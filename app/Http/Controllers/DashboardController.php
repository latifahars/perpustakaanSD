<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use App\Models\Peraga;
use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function tampilDashboard() {
    	$peraga = DB::table('peraga')->sum('jumlah');

    	$anggota = DB::table('anggota')->count();

    	$buku = DB::table('buku')->sum('eksemplar');

    	$peminjaman = DB::table('peminjaman')->where('tgl_kembali', null)->count();

    	$deadline = DB::table('peminjaman')
    				->where('tgl_kembali', null)
    				->whereDate('deadline','<',Carbon::today())
    				->count();

    	return view('dashboard', compact('peraga','anggota', 'peminjaman', 'buku', 'deadline'));
    }
}
