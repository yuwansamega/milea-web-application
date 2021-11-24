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
              <h3>Ubah Password Akun</h3>
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
                  <table>
                      <tr>
                          <td>Nama</td>
                          <td>{{ $user->fullname }}</td>
                      </tr>
                      <tr>
                          <td>NIK</td>
                          <td>{{ $user->nik }}</td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td>{{ $user->email }}</td>
                      </tr>
                      
                        
                        
                    
                  </table>
                  
                </div>
              </div>
              <div class="col-6 d-flex align-items-start pt-4">
                <form action="/admin/update-akun-send/{{ $user->user_id }}" class="row" method="POST">
                  @csrf
                  <div class="col-12">
                    <div class="form-group">
                      <label style="text-align: center; font-size: 18px;">Password Baru</label>
                      <input type="password" name="new_pass">
                    </div>
                    <div class="form-group">
                        <label style="text-align: center; font-size: 18px;">Konfirmasi Password Baru</label>
                        <input type="password" name="confirm_pass">
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