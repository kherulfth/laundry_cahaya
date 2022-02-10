<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_statusPesanan;

class statusPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Status Pesanan';
        $data =  M_statusPesanan::orderBy('nama','asc')->get();

        return view('statuspesanan.index', compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Status Pesanan';
        return view('statuspesanan.create', compact('title'));
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
        $data['nama'] = $request->nama ;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        M_statusPesanan::insert($data);

        return redirect('statuspesanan')->with('toast_success', 'Data Berhasil Disimpan');
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
        $title = 'Edit Status Pesanan';
        $dt = M_statusPesanan::find($id);

        return view('statuspesanan.edit', compact('title','dt'));
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
        $data['nama'] = $request->nama ;
        $data['updated_at'] = date('Y-m-d H:i:s');

        M_statusPesanan::where('id',$id)->update($data);

        return redirect('statuspesanan')->with('toast_success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        M_statusPesanan::where('id',$id)->delete();

        return redirect('statuspesanan')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
