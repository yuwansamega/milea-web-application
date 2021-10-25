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
            <h1>Agenda Pelatihan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('admin.pelatihan.tambah') }}">
                  <button type="button" class="btn btn-primary">Tambah Pelatihan</button>
              </a>
            </ol>
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
                <h3 class="card-title">List Pengajuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordere">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Pelatihan</th>
                    <th>Periode Pendaftaran</th>
                    <th>Periode Pelaksanaan</th>
                    <th>Tempat</th>
                    <th>Kuota</th>
                    <th>Aksi</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @foreach ($ws as $ws)
                  <tr>
                    <td>@php
                        echo $i++;
                    @endphp</td>
                    <td>{{ $ws->title }}</td>
                    <td>{{ $ws->open_regist.'-'.$ws->close_regist }}</td>
                    <td>{{ $ws->open_ws.'-'.$ws->close_ws }}</td>
                    <td>{{ $ws->place }}</td>
                    <td>{{ $ws->quota }}</td>
                    <td>
                        <div class="row">
                          <div class="col-5">
                                <a href="/admin/pelatihan/update/{{ $ws->id }}">
                                  <button type="submit" class="btn btn-secondary btn-sm" >
                                      <i class="fas fa-cog"></i>
                                  </button>
                                </a>
                          </div>
                          <div class="col">
                            <form action="/admin/pelatihan/delete/{{ $ws->id }}" method="POST" onsubmit="return confirm('Yakin Hapus Data?')">
                              @method('delete')
                              @csrf
                              {{-- <a href="/admin/pelatihan/delete/{{ $ws->id }}"> --}}
                                  <button type="submit" class="btn btn-danger btn-sm" >
                                      <i class="fa fa-trash"></i>
                                  </button>
                              {{-- </a> --}}
                              </form>
                          </div>
                          
                        </div>
                    </td>
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