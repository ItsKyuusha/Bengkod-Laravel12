<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'pasien') {
                return redirect()->route('pasien.dashboard');
            } elseif ($user->role === 'dokter') {
                return redirect()->route('dokter.dashboard');
            }

            // Default fallback
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Login gagal. Cek email/password.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}