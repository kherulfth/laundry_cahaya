@extends('layouts.main')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            <br>
            <div class="container" style="margin-left: 15px">
                <button type="button" class="btn btn-info" onClick="window.location.reload();"> Refresh</button>      
                <a href="{{ route('transaksipesanan.create') }}" type="button" class="btn btn-info active"> Tambah Data</a>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Paket</th>
                        <th>Status Pesanan</th>
                        <th>Status Pembayaran</th>
                        <th>Berat</th>
                        <th>Grand Total</th>
                        {{-- <th>Created at(s)</th> --}}
                        {{-- <th>Updated at</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $e=>$dt)
                    <tr>
                        <td>
                          <a href="{{ route('transaksipesanan.edit',$dt->id) }}" class="btn btn-xs">
                            <i class="fas fa-edit"></i> Edit
                          </a>
                          <form method="POST" action="{{ route('transaksipesanan.destroy', [$dt->id]) }}" class="d-inline" onClick="return confirm('Yakin akan menghapus data?')">
                            @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <i class="fas fa-trash">
                                  <button class="btn btn-xs">Delete</button>
                                </i>
                          </form>
                        </td>
                        <td>{{ $e+1 }}</td>
                        <td>{{ $dt->customers->nama }}</td>
                        <td>{{ $dt->pakets->nama }}</td>
                        <td>{{ $dt->status_pesanans->nama }}</td>
                        <td>{{ $dt->status_pembayarans->nama }}</td>
                        <td>{{ $dt->berat }} Kg</td>
                        <td>Rp. {{ number_format($dt->grand_total,0) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                      <th>Action</th>
                      <th>#</th>
                      <th>Customer</th>
                      <th>Paket</th>
                      <th>Status Pesanan</th>
                      <th>Status Pembayaran</th>
                      <th>Berat</th>
                      <th>Grand Total</th>
                        {{-- <th>Created at(s)</th>
                        <th>Updated at</th> --}}
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  @include('sweetalert::alert')



@endsection








      