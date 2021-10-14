<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/img/Logo-only.png">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="bootstrap-5.1.1-dist\css\bootstrap.min.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="bootstrap-5.1.1-dist\js\bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/lengkapi-profil.css" />
     <link rel="stylesheet" href="/css/nav copy.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
      integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>MILEA | {{ $title }}</title>
  </head>
  <body>
    
   <nav>
      <div id="logo">
        <img src="img/Logo-only.png" alt="" height="68px" width="68px" />
        <h1 class="new" style="margin-top: 13px">MILEA</h1>
      </div>
      <ul id="pages">
        <li>
          <a href="/beranda">Beranda</a>
        </li>
        <li>
          <a href="/daftar-kegiatan">Daftar Kegiatan</a>
        </li>
      </ul>
      <img
        src="img/navbar-toggle-black.png"
        alt=""
        id="toogle-white"
        width="50px"
        height="50px"
        class="dropdown-toggle"
      />
      <img
        src="img/navbar-toggle-black.png"
        alt=""
        id="toogle-black"
        width="50px"
        height="50px"
        class="dropdown-toggle"
      />
      <ul id="dropdown">
        <img id="addition" src="img/dropdown-addition.png" alt="" />
        <a href="/data-profil">
          <img src="img/navbar-profile.png" alt="" width="19px" height="19px" />
          <li>Profil</li>
        </a>
        <a href="/riwayat">
          <img src="img/navbar-history.png" alt="" width="19px" height="19px" />
          <li>Riwayat</li>
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
        <a href="route('logout')"
        onclick="event.preventDefault();
                    this.closest('form').submit();">
          <img src="img/navbar-signout.png" alt="" width="19px" height="19px" />
          <li>Keluar</li>
        </a></form>
      </ul>
    </nav>


    <div class="row"  style="margin-top: 50px;">
        <div class="bodyLeft">
            <div class="card kiri shadow">
              <div class="card-body">
                <div class="row">
                  <div class="rowFirstCardLeft">
                  <img src="\user\ava\{{ $data_user->image }}" style="margin-left: 25px; width: 120px; height:120px; float: left; border-radius:50%;" alt="" />
                  </div>
                  <div class="rowFirstCardRight">
                    <h3 class="name">{{$data_user->fullname }}</h3>
                  <h6 class="nip">{{$data_user->position }}</h6>
                  <h6 class="status">{{$data_user->institute }}</h6>
                  </div>
              </div>
    
                <a href="/data-profil">
                <div class="row" style="margin-top: 50px; margin-left: 10px;">
                    <img src="img/icon.png" width="20" height="20" alt="">
                    <h6 class="detailProfil" style="margin-left: 15px;">Detail Profil</h6>
                </div>
                </a>
    
                <hr>
                <a href="/lengkapi-profil">
                <div class="row">
                    <img src="img/filemanager.png" width="28" height="20" style="margin-left: 25px;" alt="">
                    <h6 class="detailProfil" style="margin-left: 8px; margin-top: 1px;">Perbarui Profil</h6>
                </div>
                </a>
                <hr>
                <a href="/ubah-pass">
                <div class="row" style=" color: #198754;">
                    <img src="img/setting.png"  style="margin-left: 22px;" alt="">
                    <h6 class="detailProfil" style="margin-left: 8px; margin-top: 1px;">Ubah Password</h6>
                </div>
                </a>
                
               <hr>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                <a href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                <div class="row">
                    <img src="img/log_out.png" width="30" height="30" style="margin-left: 15px;" alt="">
                    <h6 class="detailProfil" style="margin-top: 5px; margin-left: 15px;">Keluar</h6>
                </div>
              </div>
              </a>
            </form>
               
            </div>
          </div>

      <div class="bodyRight">
        <div class="card kanan shadow">
          <div class="card-body">
            <h5 class="card-title" style="margin-left: 20px">Ubah Password</h5>
            <hr />
            <div class="form">
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
          @endif
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
              <form action="/update-pass" method="post">
                @csrf
              <div class="form-group row">
                <label for="old_pass" class="col-sm-6 col-form-label">Email <span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="email"
                    required
                  />
                </div>
                <label for="old_pass" class="col-sm-6 col-form-label">Password Lama <span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <input
                    type="password"
                    class="form-control"
                    id="old_pass"
                    name="old_pass"
                    placeholder="Password Lama"
                    required
                  />
                </div>
                <label for="new_pass" class="col-sm-6 col-form-label">Password Baru <span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <input
                    type="password"
                    class="form-control"
                    id="new_pass"
                    name="new_pass"
                    placeholder="Password Baru"
                    required
                  />
                </div>
                <label for="confirm_pass" class="col-sm-6 col-form-label">Konfirmasi Password Baru <span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <input
                    type="password"
                    class="form-control"
                    id="confirm_pass"
                    name="confirm_pass"
                    placeholder="Konfirmasi Password Baru"
                    required
                  />
                </div>

                  </div>
                </div>
                <button type="submit" class="btn save btn-success">Simpan</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
     <div class="copyright">
      <div class="text-center text-dark p-3">
        <h6>All Right Reserved © IT Team RSUD Siti Fatimah Kampus Merdeka 2021</h6>
          <a>Temukan kami di : </a>
          <a href="https://api.whatsapp.com/send?phone=08117117929" target="output"><img src="img/Call.png" width="30" alt="" /></a>
          <a href="mailto:sdm.rsudsumsel@gmail.com" target="output"><img src="img/Gmail.png" width="30" alt="" /></a>
          <a href="https://www.facebook.com/RSUDSitiFatimah" target="output"><img src="img/Facebook.png" width="30" alt="" /></a>
          <a href="https://www.youtube.com/c/RSUDSitiFatimahProvSumsel" target="output"><img src="img/Youtube.png" width="30" alt="" /></a>
          <a href="https://www.instagram.com/rsudsitifatimah/" target="output"><img src="img/Instagram.png" width="30" alt="" /></a>
      </div>
    </div>
      <script src="/js/utility.js"></script>
      @include('sweetalert::alert')

  </body>
</html> 
