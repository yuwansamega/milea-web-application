@extends('layouts.admin.main')

@section('head')
    @include('partials.head.admin.dverifikasi')
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
            <h1>Detail Pengajuan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Verifikasi</li>
              <li class="breadcrumb-item active">Detail</li>
              <li class="breadcrumb-item active">{{ $data->user_id }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div id="container">
            <div class="row justify-center" id="group">
                <div class="col" id="left">
    
                    <x-admin-profile-card>
                        <x-slot name='nama'>{{ $data->fullname }}</x-slot>
                        <x-slot name='nim'>{{ $data->position }}</x-slot>
                        <x-slot name='jabatan'>{{ $data->institute }}</x-slot>
                    </x-admin-profile-card>
    
                    <x-admin-document>
    
                        <x-admin-document-field>
                            <x-slot name='surat_tugas'>Ijazah Terakhir</x-slot>
                            {{-- <x-slot name='tautan'></x-slot> --}}
                        </x-admin-document-field>
    
                        <x-admin-document-field>
                            <x-slot name='surat_tugas'>Surat Tugas</x-slot>
                            {{-- <x-slot name='tautan'></x-slot> --}}
                        </x-admin-document-field>
                    
                    </x-admin-document>
    
                </div>
                <div class="col" id="right">
                    <form action="/admin/update-submissions/{{ $subm_id }}" id="form-pengajuan" method="POST">
                        @csrf
                        <h1>Data Detail</h1>
                        <ul>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Nama Kegiatan</x-slot>
                            <x-slot name="nilai">{{ $data->title }}</x-slot>
                        </x-admin-form-field>
                        
                        <x-admin-form-field>
                            <x-slot name="attribut">Nama</x-slot>
                            <x-slot name="nilai">{{ $data->fullname }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">NIP</x-slot>
                            <x-slot name="nilai">{{ $data->nip }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Nomor KTP</x-slot>
                            <x-slot name="nilai">{{ $data->nik }}</x-slot>
                        </x-admin-form-field>
                        
                        <x-admin-form-field>
                            <x-slot name="attribut">Status</x-slot>
                            <x-slot name="nilai">{{ $data->status }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Jenis Kelamin</x-slot>
                            <x-slot name="nilai">{{ $data->gender }}</x-slot>
                        </x-admin-form-field>

                        <x-admin-form-field>
                            <x-slot name="attribut">Tempat Tanggal Lahir</x-slot>
                            <x-slot name="nilai">{{ $data->birth_place.", ".$data->birth_date }}</x-slot>
                        </x-admin-form-field>

                        <x-admin-form-field>
                            <x-slot name="attribut">Alamat Domisili</x-slot>
                            <x-slot name="nilai">{{ $data->address }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Agama</x-slot>
                            <x-slot name="nilai">{{ $data->religion }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Email</x-slot>
                            <x-slot name="nilai">{{ $data->email }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">No Telepon</x-slot>
                            <x-slot name="nilai">{{ $data->phone }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Pendidikan Terakhir</x-slot>
                            <x-slot name="nilai">{{ $data->edu }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Pangkat / Golongan</x-slot>
                            <x-slot name="nilai">{{ $data->level }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Jabatan / Pekerjaan</x-slot>
                            <x-slot name="nilai">{{ $data->position }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Nama Instansi</x-slot>
                            <x-slot name="nilai">{{ $data->institute }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Alamat Instansi</x-slot>
                            <x-slot name="nilai">{{ $data->institute_addr }}</x-slot>
                        </x-admin-form-field>
    
                        <x-admin-form-field>
                            <x-slot name="attribut">Telpon Instansi</x-slot>
                            <x-slot name="nilai">{{ $data->institute_phone }}</x-slot>
                        </x-admin-form-field>
    
                        
                        <li class="row">
                            <h3>Keterangan</h3>
                            <select name="status_p" id="keterangan">
                                <option value="Ditolak">Ditolak</option>
                                <option value="Diterima">Diterima</option>
                            </select>
                        </li>
                        <li class="row">
                            <h3>Pesan</h3>
                            <textarea name="message" id="" cols="30" rows="10" placeholder="Masukan Pesan Jika Perlu ..."></textarea>
                        </li>
                        </ul>
                        <div class="row">
                            <button type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
    
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
    @include('partials.footer.admin.dashboard')
@endsection

{{-- @section('script')
    @include('partials.script.admin.verifikasi')
@endsection --}}

