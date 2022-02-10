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
            <form id="tambahHarga" role="form" action="{{ route('statuspembayaran.store') }}" method="POST">
                @csrf
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Status</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Pembayaran" required>
                    </div>
                    <div class="form-group">
                      <div style="float: left;">
                        <button type="submit" class="btn btn-success">Simpan</button>
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