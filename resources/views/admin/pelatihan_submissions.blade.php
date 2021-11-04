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
            <h1>Daftar Data Pengajuan per Pelatihan </h1>
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
                <h3>{{ $data_ws->title }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordere">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @foreach ($data as $d)
                  <tr>
                    <td>@php
                        echo $i++;
                    @endphp</td>
                    <td>{{ $d->fullname}}</td>
                    <td>{{ $d->position}}</td>
                  </tr>
                  @endforeach
                  
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="m-0">Materi Pelatihan</h3>
              </div>
              <div class="card-body">
                <p class="card-text">Tambahkan modul materi pelatihan, Modul nantinya dapat diunduh oleh peserta.</p>
                <a href="/admin/tambah_materi/{{ $ws_id }}" class="btn btn-primary">Tambah Berkas Materi</a>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card card-danger">
                      <div class="card-header">
                        <h3 class="card-title">Materi 1</h3>
                      </div>
                      <div class="card-body">
                        Deskripsi Materi...
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-danger">Hapus Materi</button>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
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