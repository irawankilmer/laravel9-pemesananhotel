<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ], [
            'username.required' => 'Kolom Email tidak boleh kosong',
            'password.required' => 'Kolom Password tidak boleh kosong'
        ]);

        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember  = $request->remember ? true : false;

        if (Auth::attempt([$loginType => $request->username, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('backend')->with('success', 'Selamat! Anda berhasil login');
        }

        return back()->withErrors([
            'username'  => 'Email/username ataupun password salah....'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('auth/login')->with('success', 'Selamat! Anda berhasil logout');
    }
}
