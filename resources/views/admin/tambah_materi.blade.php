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
                <h3>Formulir Penambahan Materi</h3>
              </div>
              <!-- /.card-header -->
              <form id="form" action="/post_material" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body expandable-card row">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Materi</label>
                      <input name ="material_label[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name ="material_file[]" style="color: black;">
                          <label class="custom-file-label" for="exampleInputFile"></label>
                        </div>
                        <div class="input-group-append">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 d-flex align-items-end" style="padding-bottom: 16px">
                    <button type="button" class="btn btn-primary d-flex center" id="tambah-materi">
                      <span class="material-icons-round">
                        queue
                        </span>                   
                    </button>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" id="grup-tombol">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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