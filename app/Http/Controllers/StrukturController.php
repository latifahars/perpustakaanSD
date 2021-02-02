<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function tampilStruktur() {
        return view('data.struktur_org');
    }
}
