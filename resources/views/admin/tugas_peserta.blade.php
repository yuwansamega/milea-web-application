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
            <h1>Daftar Tugas - Nama Pelatihan</h1>
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
              <div class="card-header">
                <h3 class="">Judul Tugas Peserta</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table ">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Peserta</th>
                    <th>Berkas Tugas</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                   <tr>
                       <td>1</td>
                       <td>Muhammad Sholeh</td>
                       <td><a href="../../assets/" class="d-flex align-items-center" style="color: rgb(0, 0, 0)" target="_blank">Lihat Berkas<span class="material-icons-round ml-3">visibility</span></a></td>
                   </tr>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="">Unduh Seluruh Berkas Peserta</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="" class="row d-flex align-items-center ml-2">
                  <span class="material-icons-round" style="font-size:64px; color: black">
                      folder_zip
                  </span>
                  <h2 class="m-0 ml-2" style="font-size: 25px; font-weight: 500; color: black">Unduh Berkas</h2>
                </a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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