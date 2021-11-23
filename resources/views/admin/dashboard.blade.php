@extends('layouts.admin.main')

@section('head')
    @include('partials.head.admin.dashboard')
@endsection

@section('navbar')
    @include('partials.navbar.admin.dashboard')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- Small Box (Stat card) -->
     
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $sub }}</h3>

                <p>New Submissions</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="{{ route('admin.verifikasi') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $datau }}</h3>

                <p>Number of Accounts</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
                <div class="small-box-footer">-</div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $work }}</h3>

                <p>Workshops Amount</p>
              </div>
              <div class="icon">
                <i class="fas fa-map-pin"></i>
              </div>
              <a href="{{ route('admin.pelatihan') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
    @include('partials.footer.admin.dashboard')
@endsection

@section('script')
    @include('partials.script.admin.dashboard')
@endsection