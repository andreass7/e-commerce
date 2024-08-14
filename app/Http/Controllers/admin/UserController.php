<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna dengan role 'customer'
        $customers = User::where('role', 'customer')->get();
        return view('admin.user.user', compact('customers'), [
            'title' => 'User-Admin',
        ]);
    }
}
