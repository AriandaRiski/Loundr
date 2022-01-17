<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

use DB;
class produkController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function produk(Request $request)
    {
        $product = Produk::all();
        return view('admin.produk.produk', compact('product'));
    }

    public function tambah_produk(Request $request)
    {
        $validator = Validator::make($request->all(),
        array (
            'nama_produk' => 'required',
            'tarif_produk' => 'required'
        )
        );

        if ($validator->fails()) {
            $eror = $validator->messages()->all();
            return redirect('/produk')->withInput($request->input())->withErrors($validator);
        }else {
            $produkTambah = Produk::where('nama_produk',$request->nama_produk)->first();
            $tambahlagi = new Produk;
            $tambahlagi->tarif_produk = $request->tarif_produk;
        }
        $tambahlagi->save();
        return redirect('/produk')->with('success','Berhasil di tambahkan');
    }

    public function tambah_produkView(Request $request)
    {
        $s_produk = new Produk;
        return view ('admin.produk',compact('s_produk'));
    }

    public function tambah_produkAksi(Request $request)
    {
        $s_produk = new Produk;
        $s_produk->nama_produk = $request->nama_produk;
        $s_produk->tarif_produk = $request->tarif_produk;
        $s_produk->save();

        return redirect('/produk');
    }
}
