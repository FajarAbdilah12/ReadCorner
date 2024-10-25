<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Buat view auth/login.blade.php
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
    return redirect()->intended('/books/index');
} else {
    dd('Login gagal. Data:', $request->only('email', 'password'));
}

        // return back()->withErrors([
        //     'email' => 'Email atau password salah.',
        // ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
