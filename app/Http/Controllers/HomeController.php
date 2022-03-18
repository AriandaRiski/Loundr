<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Transaksi;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_produk = produk::count();
        $total_transaksi = transaksi::count();
        $produk_user = produk::where('user_id_produk', Auth::user()->id)->count();
        $transaksi_user = transaksi::where('user_id', Auth::user()->id)->count();
        return view('admin.home',compact('total_produk', 'total_transaksi','produk_user','transaksi_user'));
        
    }

    
}
