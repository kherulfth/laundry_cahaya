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
                <a href="{{ route('customer.create') }}" type="button" class="btn btn-info active"> Tambah Data</a>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Created at(s)</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr>
                        <td>
                          <a href="{{ route('customer.edit',$dt->id) }}" class="btn btn-xs">
                            <i class="fas fa-edit"></i> Edit
                          </a>
                          <form method="POST" action="{{ route('customer.destroy', [$dt->id]) }}" class="d-inline" onClick="return confirm('Yakin akan menghapus data?')">
                            @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <i class="fas fa-trash">
                                  <button class="btn btn-xs">Delete</button>
                                </i>
                          </form>
                        <td>{{ $dt->nama }}</td>
                        <td>{{ $dt->email }}</td>
                        <td>{{ $dt->no_hp }}</td>
                        <td>{{ $dt->alamat }}</td>
                        <td>{{ date('d F Y H:i:s', strtotime($dt->created_at)) }}</td>
                        <td>{{ date('d F Y H:i:s', strtotime($dt->updated_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Action</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Created at(s)</th>
                        <th>Updated at</th>
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











      