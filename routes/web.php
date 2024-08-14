<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\regristrasiController;
use App\Http\Controllers\customer\homeController as CustomerHomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', [loginController::class, 'index'])->name('front.login');
Route::post('/login', [loginController::class, 'login'])->name('auth.login');

Route::get('/regristrasi', [regristrasiController::class, 'index'])->name('auth.registrasi');
Route::post('/regristrasi', [regristrasiController::class, 'register'])->name('store.registrasi');
// Route::get('/login', function () {
//     return view('auth.login');
// });
// Route::get('/regristrasi', function () {
//     return view('auth.registrasi');
// });
// Route::get('/nav', function () {
// Route::get('/nav', function () {
//     return view('register.nav.nav');
// });
// Route::get('/bread', function () {
//     return view('admin.breadcumb.index');
// });
// Route::get('/home-admin', function () {
//     return view('admin.dashboard.home');
// });
// Route::get('/user-admin', function () {
//     return view('admin.user.user');
// });
// Route::get('/produk-admin', function () {
//     return view('admin.produk.produk');
// });

// ADMIN
Route::group(['middleware' => 'admin'], function () {
    Route::get('/home-admin', [homeController::class, 'index'])->name('admin.dashboard.home');
    Route::get('/user-admin', [UserController::class, 'index'])->name('admin.user.user');
    Route::get('/produk-admin', [ProdukController::class, 'index'])->name('admin.produk.produk');
    Route::post('/produk-admin', [ProdukController::class, 'store'])->name('store.produk');

    Route::put('/products/{id}', [ProdukController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProdukController::class, 'destroy'])->name('products.destroy');

    Route::post('/logout', [loginController::class, 'logout'])->name('logout');
});


// CUSTOMER
Route::group(['middleware' => 'customer'], function () {
    Route::get('/dashboard', [CustomerHomeController::class, 'index'])->name('home.customer');
});
