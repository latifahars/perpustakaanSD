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
    public function tampilTambahPeminjaman() {
        return view('transaksi.tambah_peminjaman');
    }

}