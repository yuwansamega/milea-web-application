@extends('layouts.admin.main')

@section('head')
    @include('partials.head.admin.create-pelatihan')
@endsection

@section('content')
<div id="container" class="row">
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
    <main id="main-content" class="row justify-center">
        <modal id="modal" style="display: flex;" class="center">
            <div id="modal-container" class="col allign-center">
                <h3>Pastikan untuk melengkapi <b>seluruh tanggal</b> yang diperlukan!</h3>
                <button type="button" class="modal-button">OK</button>
            </div>
        </modal>
        <form action="/admin/create/pelatihan" method="POST" id="training-form" class="col" enctype="multipart/form-data">
            @csrf
            <div class="col" id="container">
                <h1>Upload Pelatihan</h1>
                @if ($message = Session::get('success'))
                <div class="row" style="color: red;">

                    
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="row" style="color: red;">
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <div class="row">
                    <label for="">Tanggal Pendaftaran</label>
                    <input type="date" name="open_regist" id="open_regist">
                    <p>s/d</p>
                    <input type="date" name="close_regist" id="close_regist">
                </div>

                <div class="row">
                    <label for="">Tanggal Pelatihan</label>
                    <input type="date" name="open_ws" id="open_ws">
                    <p>s/d</p>
                    <input type="date" name="close_ws" id="close_ws">
                </div>

                <div class="row">
                    <label for="">Nama Pelatihan</label>
                    <input type="text" name="title" id="title">
                </div>

                <div class="row">
                    <label for="">Kuota</label>
                    <input type="text" name="quota" id="quota">
                    <p>peserta</p>
                </div>

                <div class="row">
                    <label for="">Tempat Penyelenggaraan</label>
                    <input type="text" name="place" id="place">
                </div>

                <div class="row">
                    <label for="">Narahubung</label>
                    <input type="text" name="cp" id="cp">
                </div>

                <div class="row">
                    <label for="">Deskripsi Pelatihan</label>
                    <textarea name="describe" id="describe" cols="30" rows="10"></textarea>
                </div>

                <div class="row">
                    <label for="">Kriteria Peserta</label>
                    <textarea name="criteria" id="criteria" cols="30" rows="10"></textarea>
                </div>

                <div class="col">
                    <h2>Berkas yang diunggah pendaftar</h2>
                    <div class="row">
                        <label for="">File 1</label>
                        <input type="text" name="label_upload_1">
                    </div>
                    <div class="row">
                        <label for="">File 2</label>
                        <input type="text" name="label_upload_2">
                    </div>
                    <div class="row">
                        <label for="">File 3</label>
                        <input type="text" name="label_upload_3">
                    </div>
                    
                </div>

                <div class="col">
                    <h2>Berkas yang diunduh pendaftar</h2>
                    <div class="row">
                        <label for="">File 1</label>
                        <select name="label_unduh_1" id="label_unduh_1">
                            <option value="">-</option>
                            
                        </select>
                    </div>
                    <div class="row">
                        <label for="">File 2</label>
                        <select name="label_unduh_2" id="label_unduh_2">
                            <option value="">-</option>
                            
                        </select>
                    </div>
                    <div class="row">
                        <label for="">File 3</label>
                        <input type="text" name="label_unduh_3">
                        <input type="file" name="file_unduh_3" id="file_unduh_3">
                    </div>
                    <div class="row">
                        <label for="">File 4</label>
                        <input type="text" name="label_unduh_4">
                        <input type="file" name="file_unduh_4" id="file_unduh_4">
                    </div>
                </div>
            </div>
            
                <div class="row flex-end">
                   
                        <button type="submit">Submit</button>
                    
                </div>
            

        </form>
    </main>
</div>
<script src="/js/admin/formPelatihan.js"></script>
<script src="/js/utility.js"></script>
@endsection

