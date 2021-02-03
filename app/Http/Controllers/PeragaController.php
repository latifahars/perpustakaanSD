<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeragaController extends Controller
{
   	public function tampilPeraga() {
        return view('peraga.data_peraga');
    }
    public function tampilTambahPeraga() {
        return view('peraga.tambah_peraga');
    }
    public function tampilEditPeraga() {
        return view('peraga.edit_peraga');
    }

}
