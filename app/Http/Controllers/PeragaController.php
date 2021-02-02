<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeragaController extends Controller
{
   	public function tampilPeraga() {
        return view('data.data_peraga');
    }
    public function tampilTambahPeraga() {
        return view('data.tambah_peraga');
    }
    public function tampilEditPeraga() {
        return view('data.edit_peraga');
    }

}
