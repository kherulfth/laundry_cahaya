<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Paket;

class Paket_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Paket Harga Laundry';
        $data = M_Paket::get();

        return view('paket.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Paket Harga Laundry';
        return view('paket.create', compact('title'));
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
        $data['harga'] = $request->harga ;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        M_Paket::insert($data);

        return redirect('paket')->with('toast_success', 'Data Berhasil Disimpan');
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
        $title = 'Edit Data Paket';
        $dt = M_Paket::find($id);

        return view('paket.edit', compact('title','dt'));
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
        $data['harga'] = $request->harga ;
        $data['updated_at'] = date('Y-m-d H:i:s');
        M_Paket::where('id',$id)->update($data);

        return redirect('paket')->with('toast_success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        M_Paket::where('id',$id)->delete();

        return redirect('paket')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
