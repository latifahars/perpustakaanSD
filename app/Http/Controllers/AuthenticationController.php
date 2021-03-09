<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $emailPassword = $request->only('email', 'password');

        if (auth()->attempt($emailPassword)) {
            return redirect()->intended('/dashboard');
        }

        return back()->with(['error' => 'Nama Pengguna atau Password Salah!']);

    }
}
