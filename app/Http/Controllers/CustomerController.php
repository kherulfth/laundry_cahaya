<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Halaman Customer';
        $data =  M_Customer::orderBy('nama','asc')->get();

        return view('customer.index', compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Customer';
        return view('customer.create', compact('title'));
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
        $data['email'] = $request->email ;
        $data['no_hp'] = $request->no_hp ;
        $data['alamat'] = $request->alamat ;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        M_Customer::insert($data);

        return redirect('customer')->with('toast_success', 'Data Berhasil Disimpan');
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
        $title = 'Edit Data Customer';
        $dt = M_Customer::find($id);

        return view('customer.edit', compact('title','dt'));
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
        $data['email'] = $request->email ;
        $data['no_hp'] = $request->no_hp ;
        $data['alamat'] = $request->alamat ;
        $data['updated_at'] = date('Y-m-d H:i:s');

        M_Customer::where('id',$id)->update($data);

        return redirect('customer')->with('toast_success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            M_Customer::where('id',$id)->delete();

            toast('Data Berhasil Dihapus','success');

        } catch (\Exception $e) {
            // alert()->error('ErrorAlert', $e->getMessage());
            alert()->question('QuestionAlert','Lorem ipsum dolor sit amet.');
        }
        return redirect('customer');

    }
}
