<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\transaksiController;
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

// Route::get('/', function () {
//     return view('admin/home');
// });

// Route::view('/',('admin.home'));
Route::get('/',[produkController::class,'home']);
 //Route::get('/produk',[produkController::class,'produk']);
Route::resource('/produk',produkController::class);
Route::resource('/transaksi',transaksiController::class);
// Route::resource('/laporan',laporanController::class);
Route::get('/transaksi/status/{id}',[transaksiController::class,'status']);
Route::get('/transaksi/struk/{id}',[transaksiController::class,'cetak']);
Route::get('/laporan',[transaksiController::class,'laporan']);

