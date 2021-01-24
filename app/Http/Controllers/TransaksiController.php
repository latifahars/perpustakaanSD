<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TransaksiController extends Controller
{
    public function tampilPeminjaman() {
        return view('transaksi.peminjaman');
    }
    public function tampilPengembalian() {
        return view('transaksi.pengembalian');
    }
    public function tambahPeminjaman() {
        return view('transaksi.tambah_peminjaman');
    }

}