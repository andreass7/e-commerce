<?php

namespace App\Http\Controllers\customer;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('customer.home.dashboard', [
            'title' => 'Dashboard-Customer',
            'products' => $products
        ]);
    }
}
