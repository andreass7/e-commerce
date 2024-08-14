<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class loginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Ambil peran pengguna saat ini
            $role = Auth::user()->role;

            // Cek peran pengguna dan redirect ke halaman yang sesuai
            if ($role === 'admin') {
                return redirect()->intended('/home-admin');
            } elseif ($role === 'customer') {
                return redirect()->intended('/dashboard');
            }

            // Tambahkan kondisi peran lainnya jika ada

            // Default redirect jika peran tidak dikenali
            return redirect()->intended('front.login');
        }
        $user = User::where('email', $request->email)->first();

        if ($user) {
            return back()->withErrors(['password' => 'Kata sandi salah.'])->withInput(); // Pesan error jika password salah
        } else {
            return back()->withErrors(['email' => 'Email tidak terdaftar.'])->withInput(); // Pesan error jika email salah
        }

        // return back()->withErrors([
        //     'email' => 'Email Salah',
        //     'Password' => 'Password Salah',
        // ])->onlyInput('email', 'password');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
