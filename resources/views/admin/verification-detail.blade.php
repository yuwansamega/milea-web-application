@extends('layouts.admin.main')

@section('head')
    @include('partials.head.admin.dverifikasi')
@endsection

@section('content')
<div class="row">
    <aside id="sidebar" class="col">
        <h1>Admin</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
        <ul class="col">
            <a href="{{ route('admin.dashboard') }}">
                <li>Dashboard</li>
            </a>
            <a href="{{ route('admin.verifikasi') }}">
                <li>Verifikasi</li>
            </a>
            <a href="{{ route('admin.pelatihan') }}" class="nav-link bg-primary">
                <li>Pelatihan</li>
              </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a href="route('logout')" onclick="event.preventDefault();
            this.closest('form').submit();">
                <li id="log-out">Log Out</li>
            </a>
            </form>
        </ul>
    </aside>
    <div id="container">
        <div class="row justify-center" id="group">
            <div class="col" id="left">
                <div class="row" id="profile-card">
                    <img src="\user\ava\{{ $data->image }}" style="margin-left: 25px; width:100px; height:125px; float: left; border-radius:50%;" alt="" />                    <div class="col">
                        <h1>{{ $data->fullname }}</h1>
                        <h2>{{ $data->position }}</h2>
                        <h3>{{ $data->institute }}</h3>
                    </div>
                </div>
                <div class="col" id="document">
                    <h2>Kelengkapan Dokumen</h2>
                    <?php $i = 1;?>
                    @foreach($user_upload as $upload)
                    <ul>
                        <li class="row">
                            <p>{{ $upload['label']}}</p>
                            <a href="{{ asset('user/berkas/'. $upload['file'] ) }}" target="_blank" rel="noopener noreferrer" style="font-size: 2em; color:#707070;"><i class="far fa-file-pdf"></i></a>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <div class="col" id="right">
                <form action="/admin/update-submissions/{{ $subm_id }}" id="form-pengajuan" method="POST">
                    @csrf
                <h1>Data Detail</h1>
                <ul>
                    <li class="row">
                        <h3>Nama Kegiatan</h3>
                        <p>{{ $data->title }}</p>
                        
                    </li>
                    <li class="row">
                        <h3>Nama</h3>
                        <p>{{ $data->fullname }}</p>
                    </li>
                    <li class="row">
                        <h3>NIP</h3>
                        <p>{{ $data->nip }}</p>
                    </li>
                    <li class="row">
                        <h3>Nomor KTP</h3>
                        <p>{{ $data->nik }}</p>
                    </li>
                    <li class="row">
                        <h3>Status</h3>
                        <p>{{ $data->status }}</p>
                    </li>
                    <li class="row">
                        <h3>Jenis Kelamin</h3>
                        <p>{{ $data->gender }}</p>
                    </li>
                    <li class="row">
                        <h3>Tempat Tanggal Lahir</h3>
                        <p>{{ $data->birth_place.", ".$data->birth_date }}</p>
                    </li>
                    <li class="row">
                        <h3>Alamat Domisili</h3>
                        <p>{{ $data->address }}</p>
                    </li>
                    <li class="row">
                        <h3>Agama</h3>
                        <p>{{ $data->religion }}</p>
                    </li>
                    <li class="row">
                        <h3>Email</h3>
                        <p>{{ $data->email }}</p>
                    </li>
                    <li class="row">
                        <h3>No Telepon</h3>
                        <p>{{ $data->phone }}</p>
                    </li>
                    <li class="row">
                        <h3>Pendidikan Terakhir</h3>
                        <p>{{ $data->edu }}</p>
                    </li>
                    <li class="row">
                        <h3>Pangkat / Golongan</h3>
                        <p>{{ $data->level }}</p>
                    </li>
                    <li class="row">
                        <h3>Jabatan / Pekerjaan</h3>
                        <p>{{ $data->position }}</p>
                    </li>
                    <li class="row">
                        <h3>Nama Instansi</h3>
                        <p>{{ $data->institute }}</p>
                    </li>
                    <li class="row">
                        <h3>Alamat Instansi</h3>
                        <p>{{ $data->institute_addr }}</p>
                    </li>
                    <li class="row">
                        <h3>Telpon Instansi</h3>
                        <p>{{ $data->institute_phone }}</p>
                    </li>
                    @if($data->status_p === "Menunggu Verifikasi")
                    <li class="row">
                        <h3>Status Berkas</h3>
                        <select name="status_p" id="keterangan">
                            <option value="Menunggu Verifikasi" disabled>Menunggu Verifikasi</option>
                            <option value="Diterima" selected>Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                            </select>
                        </li>
                        <li class="row">
                            <h3>Pesan</h3>
                            <textarea name="message" id="" cols="1" rows="1" placeholder="Masukan Pesan Jika Perlu ...">{{ $data->message }}</textarea>
                        </li>
                    </ul>
                    <div class="row">
                        <button type="submit">Simpan</button>
                    </div>
                </form>
                @else
                <li class="row">
                    <h3>Status Berkas</h3>
                    <p>{{ $data->status_p }}</p>
                </li>
                <li class="row">
                    <h3>Pesan</h3>
                    <p>{{ $data->message }}</p>
                </li>
                @endif
            </div>
        </div>
        
    </div>
</div>

            
     
@endsection



