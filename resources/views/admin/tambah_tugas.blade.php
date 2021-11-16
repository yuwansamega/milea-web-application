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
                <h3>Form Penambahan Tugas</h3>
              </div>
              <!-- /.card-header -->
              <form id="form" action="/admin/pelatihan/tambah-materi" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body expandable-card col">
                  <div class="col-lg-9">
                    <div class="form-group">
                      <label for="inputMaterialLabel">Nama Pembicara</label>
                      <input name ="material_label[]" type="text" class="form-control" id="material_label[]" placeholder="Masukkan Nama Pembicara">
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <div class="form-group">
                      <label for="inputMaterialLabel">Judul Tugas</label>
                      <input name ="material_label[]" type="text" class="form-control" id="material_label[]" placeholder="Masukkan Judul Tugas">
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <div class="form-group">
                      <label for="inputMaterialLabel">Deskripsi Tugas</label>
                      <textarea name ="material_label[]" class="form-control" id="material_label[]" cols="30" rows="5" placeholder="Masukkan Deskripsi Tugas"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <div class="form-group">
                      <label for="inputMaterialLabel">Batas Tanggal Pengumpulan</label>
                      <input name ="material_label[]" type="date" class="form-control" id="material_label[]" placeholder="Masukkan Judul Tugas">
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <div class="form-group">
                      <label for="inputMaterialLabel">Tenggat Waktu</label>
                      <input name ="material_label[]" type="time" class="form-control" id="material_label[]" placeholder="Masukkan Judul Tugas">
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <div class="form-group">
                      <label for="exampleInputFile">Unggah Berkas</label>
                      <div class="input-group p-1" style="border: solid 1px rgba(0, 0, 0, 0.2); border-radius: 3px">
                        <div class="custom-file">
                          <input type="file" name="material_file[]" id="material_file[]">
                        </div>
                        <div class="input-group-append">
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="col-lg-9 d-flex align-items-end" style="padding-bottom: 25px">
                    <button type="button" class="btn btn-primary d-flex center" id="tambah-materi">
                      <span class="material-icons-round">
                        queue
                        </span>                   
                    </button>
                  </div> --}}
                </div>
                {{-- <input type="hidden" name="ws_id" id="ws_id" value="{{ $ws_id }}"> --}}
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-center" id="grup-tombol">
                  <button type="submit" class="btn btn-success col-sm-1 m-2">Submit</button>
                  <button type="reset" class="btn btn-danger col-sm-1 m-2">Reset</button>
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