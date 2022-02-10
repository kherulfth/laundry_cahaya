<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_statusPesanan;
use App\Models\M_statusPembayaran;
use App\Models\M_Customer;
use App\Models\M_Paket;
use App\Models\M_transaksiPesanan;


class transaksiPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transaksi Pesanan';
        $data =  M_transaksiPesanan::orderBy('created_at','asc')->get();

        return view('transaksipesanan.index', compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Pesanan';
        $statusPesanan =  M_statusPesanan::orderBy('nama','asc')->get();
        $statusPembayaran =  M_statusPembayaran::orderBy('nama','asc')->get();
        $customer =  M_Customer::orderBy('nama','asc')->get();
        $paket =  M_Paket::orderBy('nama','asc')->get();

        return view('transaksipesanan.create', compact('title','statusPesanan', 'statusPembayaran', 'customer', 'paket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['id'] = \Uuid::generate(4) ;
        $data['customer'] = $request->customer ;
        $data['paket'] = $request->paket ;
        $data['berat'] = $request->berat ;
        $data['status_pembayaran'] = $request->statuspembayaran ;
        $data['status_pesanan'] = $request->statuspesanan ;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $harga = M_Paket::find($request->paket);
        $harga_paket = $harga->harga;
        $berat = $request->berat;

        $grand_total = $harga_paket * $berat;

        $data['grand_total'] = $grand_total;

        M_transaksiPesanan::insert($data);

        return redirect('transaksipesanan')->with('toast_success', 'Data Berhasil Disimpan');

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
        $title = 'Edit Pesanan';
        $statusPesanan =  M_statusPesanan::orderBy('nama','asc')->get();
        $statusPembayaran =  M_statusPembayaran::orderBy('nama','asc')->get();
        $customer =  M_Customer::orderBy('nama','asc')->get();
        $paket =  M_Paket::orderBy('nama','asc')->get();
        $dt =  M_transaksiPesanan::find($id);

        return view('transaksipesanan.edit', compact('title','statusPesanan', 'statusPembayaran', 'customer', 'paket','dt'));
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
        // $data['id'] = \Uuid::generate(4) ;
        $data['customer'] = $request->customer ;
        $data['paket'] = $request->paket ;
        $data['berat'] = $request->berat ;
        $data['status_pembayaran'] = $request->statuspembayaran ;
        $data['status_pesanan'] = $request->statuspesanan ;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $harga = M_Paket::find($request->paket);
        $harga_paket = $harga->harga;
        $berat = $request->berat;

        $grand_total = $harga_paket * $berat;

        $data['grand_total'] = $grand_total;

        M_transaksiPesanan::where('id', $id)->update($data);

        return redirect('transaksipesanan')->with('toast_success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        M_transaksiPesanan::where('id',$id)->delete();

        return redirect('transaksipesanan')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
