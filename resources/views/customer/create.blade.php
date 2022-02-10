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
            <form id="tambahHarga" role="form" action="{{ route('customer.store') }}" method="POST">
                @csrf
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Hp</label>
                        <input type="number" class="form-control" name="no_hp" id="exampleInputPassword1" placeholder="No Hp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea name="alamat" class="form-control" id=""  rows="3" required></textarea>
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