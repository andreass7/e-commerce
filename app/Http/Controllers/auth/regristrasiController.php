<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class regristrasiController extends Controller
{
    public function index()
    {
        return view('auth.registrasi');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
        ], [
            'name.required' => 'Nama Wajib Di isi.',
            'phone.required' => 'No Telepon Wajib Di isi.',
            'phone.unique' => 'No Telp Sudah Terdaftar',
            'email.unique' => 'Email Sudah Terdaftar',
            'email.required' => 'Email Wajib Di isi.',
            'email.email' => 'Format Email anda salah',
            'password.required' => 'Password Wajib Di isi.',
            'password.min' => 'Password Minimal 8 Karakter.',
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Set default role to 'customer'
        ]);

        return redirect()->route('front.login')->with('success', 'Regristrasi Berhasil, Silahkan Login!');
    }
}
