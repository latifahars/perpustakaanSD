<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Routing\Redirector;

class ProfilController extends Controller
{
    public function tampilProfil() {
    	$user = auth()->user();

        return view('edit_profil', compact('user'));
    }
    public function simpanProfil(Request $request) {
		$request->validate([
			'name' => ['required', 'max:30'],
			'email' => ['required','email'],
			'password'=> ['nullable'],
		]);

		$user = auth()->user();
		$user->name = $request->name;
		$user->email = $request->email;
		if ($request->password) {
			$user->password = Hash::make($request->password);
		}

		$user->save();
    	return back()->with('status', 'Edit Profil Berhasil!');
	}
}
