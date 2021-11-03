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
        <form action="/admin/pelatihan/update/simpan/{{ $data->id }}" method="POST" id="training-form" class="col" enctype="multipart/form-data">
            @csrf
            <div class="col" id="container">
                <h1>Update Pelatihan</h1>
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
                    <input type="date" name="open_regist" id="open_regist" value="{{ $data->open_regist }}">
                    <p>s/d</p>
                    <input type="date" name="close_regist" id="close_regist" value="{{ $data->close_regist }}">
                </div>

                <div class="row">
                    <label for="">Tanggal Pelatihan</label>
                    <input type="date" name="open_ws" id="open_ws" value="{{ $data->open_ws }}">
                    <p>s/d</p>
                    <input type="date" name="close_ws" id="close_ws" value="{{ $data->close_ws }}">
                </div>

                <div class="row">
                    <label for="">Nama Pelatihan</label>
                    <input type="text" name="title" id="title" value="{{ $data->title }}">
                </div>

                <div class="row">
                    <label for="">Kuota</label>
                    <input type="text" name="quota" id="quota" value="{{ $data->quota }}">
                    <p>peserta</p>
                </div>

                <div class="row">
                    <label for="">Tempat Penyelenggaraan</label>
                    <input type="text" name="place" id="place" value="{{ $data->place }}">
                </div>

                <div class="row">
                    <label for="">Narahubung</label>
                    <input type="text" name="cp" id="cp" value="{{ $data->cp }}">
                </div>

                <div class="row">
                    <label for="">Deskripsi Pelatihan</label>
                    <textarea name="describe" id="describe" cols="30" rows="10">{!! $data->describe !!}</textarea>
                </div>

                <div class="row">
                    <label for="">Kriteria Peserta</label>
                    <textarea name="criteria" id="criteria" cols="30" rows="10">{!! $data->criteria !!}</textarea>
                </div>
            </div>
            
                <div class="row flex-end">
                   
                        <button type="submit">Simpan</button>
                    
                </div>
            

        </form>
    </main>
</div>
<script src="/js/admin/formPelatihan.js"></script>
<script src="/js/utility.js"></script>
    
@endsection