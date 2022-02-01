<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Models\transaksi;
use App\Models\produk;

use DB;
use SUM;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $trans = transaksi::all();

        $trans = DB::table('transaksi as a')
                ->select('a.*','b.id as id_pro','b.nama_produk','b.tarif_produk')
                ->leftJoin('produk as b','a.id_produk','=','b.id')
                ->orderBy('a.created_at','DESC')
                ->get();
                
        return view('admin.transaksi.v_transaksi',compact('trans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c_trans =DB::table('transaksi as a')
        ->select('a.*','b.id as id_pro','b.nama_produk','b.tarif_produk')
        ->leftJoin('produk as b','a.id_produk','=','b.id')
        ->get();
 
        //  $c_trans = new transaksi;
        $pro = produk::all();
        return view('admin.transaksi/tambahTransaksi',compact('c_trans','pro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $c_trans =DB::table('transaksi as a')
        // ->select(DB::raw('(a.berat * b.tarif_produk)as total'),'a.*','b.id as id_pro','b.nama_produk','b.tarif_produk')
        // ->leftJoin('produk as b','a.id_produk','=','b.id')
        // ->get();
        $c_trans = new transaksi;
        
        $c_trans->nama = $request->nama;
        $c_trans->hp = $request->hp;
        $c_trans->tgl_pesan = $request->tgl_pesan;
        $c_trans->tgl_ambil = $request->tgl_ambil;
        $c_trans->berat = $request->berat;
        $c_trans->keterangan = $request->keterangan;
        $c_trans->id_produk = $request->id_produk;
        $c_trans->total_harga = $request->total_harga;
        $c_trans->bayar = $request->sisa;
        $c_trans->save();
        return redirect('/transaksi');
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
        // $c_trans = DB::table('transaksi as a')
        // ->select(DB::raw('(a.berat * b.tarif_produk)as total'),'a.*','b.id as id_pro','b.nama_produk','b.tarif_produk')
        // ->leftJoin('produk as b','a.id_produk','=','b.id')
        // ->get();
        $c_trans = transaksi::find($id);
        $pro = produk::all();
        return view('admin.transaksi/editTransaksi',compact('c_trans','pro'));
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
        $c_trans = transaksi::find($id);
        $c_trans->nama = $request->nama;
        $c_trans->hp = $request->hp;
        $c_trans->tgl_pesan = $request->tgl_pesan;
        $c_trans->tgl_ambil = $request->tgl_ambil;
        $c_trans->berat = $request->berat;
        $c_trans->keterangan = $request->keterangan;
        $c_trans->id_produk = $request->id_produk;
        //$c_trans->total_harga = $request->total_harga;
        $c_trans->bayar = $request->sisa2;
        $c_trans->save();
        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c_trans = transaksi::find($id);
        $c_trans->delete();
        return redirect('/transaksi');
    }

    public function status($id)
    {
        $stat = DB::table('transaksi')->where('id',$id)->first();

        $status = $stat->diambilORbelum;
        
        if ($status ==1) {
            DB::table('transaksi')->where('id',$id)->update(['diambilORbelum'=>0]);
            
        }
        else {
            DB::table('transaksi')->where('id',$id)->update(['diambilORbelum'=>1]);

        }
        return redirect('/transaksi');
    }

    public function cetak($id)
    {
        $cetak = DB::table('transaksi as a')
        ->select('a.*','b.*','b.id as idpro')
        ->leftJoin('produk as b','a.id_produk','=','b.id')
        ->where('a.id',$id)
        ->first();
        return view('admin.transaksi/struk',compact('cetak'));
    }

    public function laporan(Request $request)
    {
        
        $lap = DB::table('transaksi as a')
         
         ->select('a.*','b.id as id_pro','b.nama_produk','b.tarif_produk')
        ->leftJoin('produk as b','a.id_produk','=','b.id')
        ->where('a.bayar',0)
        ->orderBy('tgl_pesan','DESC')
        ->get();

         // $total = transaksi::sum('total_harga');
        $total = transaksi::where('bayar','=','0')->sum('total_harga');
        return view('admin.transaksi.v_laporan',compact('lap','total'));

    }
}
