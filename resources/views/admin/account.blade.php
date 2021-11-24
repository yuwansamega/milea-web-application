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
            <h1>Akun Pengguna</h1>
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
                <h3 class="card-title">Daftar Akun Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordere">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Peserta</th>
                    <th>Email</th>
                    <th>Aksi</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @foreach ($user as $user)
                  <tr>
                    <td>@php
                        echo $i++;
                    @endphp</td>
                    
                      
                    
                    <td>{{ $user->name }}</td>
                    <td>{{$user->email }}</td>
                    
                    <td>
                        <div class="row">
                          <div class="col-5">
                                <a href="/admin/update-akun/{{ $user->id }}">
                                  <button type="submit" class="btn btn-secondary btn-sm" >
                                      <i class="fas fa-cog"></i>
                                  </button>
                                </a>
                          </div>
                          <div class="col">
                            <form action="/admin/delete-akun/{{ $user->id }}" method="POST" onsubmit="return confirm('Yakin Hapus Data?')">
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