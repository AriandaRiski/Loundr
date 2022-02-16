<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\HomeController;
// use App\Model\transaksi;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::view('/home',('admin.home'));
// Route::get('/home',[HomeController::class,'home']);
 //Route::get('/produk',[produkController::class,'produk']);
Route::resource('/produk',produkController::class);
Route::resource('/transaksi',transaksiController::class)->middleware('auth');
// Route::resource('/laporan',laporanController::class);
Route::get('/transaksi/status/{id}',[transaksiController::class,'status']);
Route::get('/transaksi/struk/{id}',[transaksiController::class,'cetak']);
Route::get('/laporan',[transaksiController::class,'laporan']);


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/logout',('home'));

