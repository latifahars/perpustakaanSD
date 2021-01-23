<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function tampilProfil() {
        return view('edit_profil');
    }
}
