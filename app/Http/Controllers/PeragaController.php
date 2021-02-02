<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeragaController extends Controller
{
   	public function tampilDataPeraga() {
        return view('data.data_peraga');
    }
    public function tambahDataPeraga() {
        return view('data.tambah_peraga');
    }
    public function editDataPeraga() {
        return view('data.edit_peraga');
    }

}
