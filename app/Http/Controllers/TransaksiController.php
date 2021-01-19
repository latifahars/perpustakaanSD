<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TransaksiController extends Controller
{
    public function tampilPeminjaman() {
        return view('peminjaman');
    }
    public function tampilPengembalian() {
        return view('pengembalian');
    }
}