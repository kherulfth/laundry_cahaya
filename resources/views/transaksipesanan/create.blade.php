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
            <form id="tambahHarga" role="form" action="{{ route('transaksipesanan.store') }}" method="POST" onSubmit="validasi()">
                @csrf
                <div class="col-12">

                    <div class="form-group">
                      <label>Customer</label>
                      <select class="form-control" name="customer" required>
                        <option value="" selected disabled>-- Pilih Customer --</option>
                        @foreach ($customer as $cs)
                        <option value="{{ $cs->id }}">{{ $cs->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Paket</label>
                      <select class="form-control" name="paket" required>
                        <option value="" selected disabled>-- Pilih Paket --</option>
                        @foreach ($paket as $pk)
                        <option value="{{ $pk->id }}">{{ $pk->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Berat (kg)</label>
                      <input type="number" name="berat" class="form-control" id="exampleInputEmail1" placeholder="Nama Status" required>
                    </div>
                    <div class="form-group">
                      <label>Status Pesanan</label>
                      <select class="form-control" name="statuspesanan" required>
                        <option value="" selected disabled>-- Status Pesanan --</option>
                        @foreach ($statusPesanan as $sp)
                        <option value="{{ $sp->id }}">{{ $sp->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status Pembayaran</label>
                      <select class="form-control" name="statuspembayaran" required>
                        <option value="" selected disabled>-- Status Pembayaran --</option>
                        @foreach ($statusPembayaran as $spm)
                        <option value="{{ $spm->id }}">{{ $spm->nama }}</option>
                        @endforeach
                      </select>
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