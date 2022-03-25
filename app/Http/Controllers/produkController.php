<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\transaksi;
use DB;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::table('produk')
        ->where('user_id_produk', Auth::user()->id)->get();
        return view('admin.produk.v_produk',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c_produk = new Produk;
        return view('admin.produk/tambahProduk',compact('c_produk'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c_produk = new Produk;
        $c_produk->nama_produk = $request->nama_produk;
        $c_produk->tarif_produk = $request->tarif_produk;
        $c_produk->user_id_produk = Auth::user()->id;
        $c_produk->save();

        return redirect('/produk')->with('success','Data Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c_produk = Produk::find($id);
        return view('admin.produk/editProduk',compact('c_produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $c_produk = Produk::find($id);
        $c_produk->nama_produk = $request->nama_produk;
        $c_produk->tarif_produk = $request->tarif_produk;
        $c_produk->save();

        return redirect('/produk')->with('success','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c_produk = Produk::find($id);
        $c_produk->delete();

        return redirect('/produk')->with('success','Data Berhasil Di Hapus!');
    }

    public function home()
    {
        $total_produk = produk::count();
        $total_transaksi = transaksi::count();
        return view('admin.home',compact('total_produk', 'total_transaksi'));
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
