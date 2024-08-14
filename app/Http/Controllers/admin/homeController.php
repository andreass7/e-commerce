<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $adminNames = User::where('role', 'admin')->pluck('name')->toArray();
        $adminNamesString = implode(', ', $adminNames);
        // Mengambil jumlah produk
        $productCount = Product::count();
        $userCount = User::count();
        // Mengambil jumlah produk dengan status 'aktif'
        $activeProductCount = Product::where('status', 'aktif')->count();
        // Mengambil produk terbaru berdasarkan waktu pembuatan
        $products = Product::orderBy('created_at', 'desc')->take(10)->get();

        return view('admin.dashboard.home', ['adminNamesString' => $adminNamesString, 'productCount' => $productCount, 'activeProductCount' => $activeProductCount, 'userCount' => $userCount, 'products' => $products,  'title' => 'Home-Admin']);
    }
}
