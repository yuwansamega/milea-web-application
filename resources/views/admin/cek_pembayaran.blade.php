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
                    <img class="img-fluid pad" src="/img/bg-kanan.png" alt="Photo">
                  </div>
                </div>
                <div class="col-6 d-flex align-items-start pt-4">
                  <form action="" class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label style="text-align: center">Tindakan :</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 d-flex align-items-end justify-content-start pb-3">
                      <button type="submit" class="btn btn-info">Selesai</button>
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