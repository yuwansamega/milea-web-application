@extends('layouts.admin.main')

@section('head')
    @include('partials.head.admin.pelatihan')
@endsection

@section('navbar')
    @include('partials.navbar.admin.dashboard')
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h3>Bukti Pembayaran Peserta</h3>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="row">
                <div class="col-6">
                  <div class="card-body d-flex justify-content-center align-items-center">
                    <img class="img-fluid pad" src="{{ asset('user/payment/'.$data->payment_proof )}}" height="50%" width="50%" alt="Photo">
                  </div>
                </div>
                <div class="col-6 d-flex align-items-start pt-4">
                  <form action="/admin/update-submissions-payment/{{ $data->id }}" class="row" method="POST">
                    @csrf
                    <div class="col-12">
                      <div class="form-group">
                        <label style="text-align: center; font-size: 18px;">Keterangan</label>
                        <select class="form-control" name="payment_status">
                          <option value="Pembayaran Diterima">Pembayaran Diterima</option>
                          <option value="Pembayaran Belum Diterima">Pembayaran Belum Diterima</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 d-flex align-items-end justify-content-start pb-3">
                      <button type="submit" class="btn btn-info btn-lg">Submit</button>
                    </div>
                  </form>
              </div>
            </div>
            <!-- /.card -->
          </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection

@section('footer')
    @include('partials.footer.admin.dashboard')
@endsection

@section('script')
    @include('partials.script.admin.verifikasi')
@endsection