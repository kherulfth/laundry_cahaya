@extends('layouts.main')

@section('content')
    
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="tambahHarga" role="form" action="{{ route('paket.update',$dt->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Paket Laundry</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Harga Paket Laundry" required value="{{ $dt->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga Paket / Kg</label>
                        <input type="number" class="form-control" name="harga" id="exampleInputPassword1" placeholder="Harga" value="{{ $dt->harga }}" required>
                    </div>
                    <div class="form-group">
                        <div style="float: left;">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div style="float: right;">
                            <button type="button" class="btn btn-danger" onclick="history.back();" style="margin-right: 100 px">Kembali</button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <!-- /.card -->

          
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection