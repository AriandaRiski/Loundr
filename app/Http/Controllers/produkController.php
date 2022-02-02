<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\transaksi;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
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
        $c_produk->save();

        return redirect('/produk');
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

        return redirect('/produk');
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

        return redirect('/produk');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
