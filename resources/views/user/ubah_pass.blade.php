<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/Logo-only.png">
    <link rel="stylesheet" href="/css/utility.css">
    <link rel="stylesheet" href="/css/ganti-password.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>MILEA | Ubah Password</title>
</head>
<body>
    <nav>
        <div id="logo">
          <img src="../../assets/navbar-logo.png" alt="" height="68px" width="68px" />
          <h1 class="new">MILEA</h1>
        </div>
        <ul id="pages">
          <li>
            <a href="/beranda">Beranda</a>
          </li>
          <li>
            <a href="/daftar-kegiatan">Daftar Kegiatan</a>
          </li>
          <li>
            <a href="/kelas">Kelas</a>
          </li>
        </ul>
        <img
          src="../../assets/navbar-toggle-black.png"
          alt=""
          id="toogle-white"
          width="50px"
          height="50px"
          class="dropdown-toggle"
        />
        <img
          src="../../assets/navbar-toggle-black.png"
          alt=""
          id="toogle-black"
          width="50px"
          height="50px"
          class="dropdown-toggle"
        />
        <ul id="dropdown">
          <img id="addition" src="../../assets/dropdown-addition.png" alt="" />
          <ul id="pages-dropdown">
            <li>
              <a href="/beranda">
                <span class="material-icons-round">home</span>
                <p>Beranda</p>
              </a>
            </li>
            <li>
              <a href="/daftar-kegiatan">
                <span class="material-icons-round">list</span>
                <p>Daftar Kegiatan</p>
              </a>
            </li>
            <li>
          </ul>
          <a href="/data-profil">
            <img src="../../assets/navbar-profile.png" alt="" width="19px" height="19px" />
            <span class="material-icons-round">account_box</span>
            <li>Profil</li>
          </a>
          <a href="/riwayat">
            <img src="../../assets/navbar-history.png" alt="" width="19px" height="19px" />
            <span class="material-icons-round">history</span>
            <li>Riwayat</li>
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')" id="sign-out" onclick="event.preventDefault();
            this.closest('form').submit();">
              <img src="/img/navbar-signout.png" alt="" width="19px" height="19px" />
              <span class="material-icons-round">logout</span>
            <li>Keluar</li>
          </a></form>
        </ul>
    </nav>
    <main class="row justify-center">
        <div id="left" class="col">
            <div class="row allign-center" id="header">
                <img src="\user\ava\{{ $data_user->image }}"alt="" id="profil-pic">
                <div class="group col justify-center">
                    <h1>{{$data_user->fullname }}</h1>
                    <h2>{{$data_user->position }}</h2>
                    <h3>{{$data_user->institute}}</h3>
                </div>
            </div>
            <ul class="col">
                <a class="row allign-center" href="/data-profil">
                    <li class="row allign-center">
                        <span class="material-icons-round" >person</span>
                        <p>Detail Profil</p>
                    </li>
                </a>
                <a class="row allign-center" href="/lengkapi-profil">
                    <li class="row allign-center">
                        <span class="material-icons-round">edit</span>
                        <p>Perbarui Profil</p>
                    </li>
                </a>
                <a class="row allign-center" href="/ubah-pass">
                    <li class="row allign-center active">
                        <span class="material-icons-round">vpn_key</span>
                        <p>Ubah Password</p>
                    </li>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a class="row allign-center log-out" href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                    <li class="row allign-center">
                        <span class="material-icons-round">logout</span>
                        <p>Keluar</p>
                    </li>
                </a>
            </form>
            </ul>
        </div>


        <form id="right" class="col" action="/update-pass" method="post">
            @csrf
            <h1>Ubah Kata Sandi</h1>
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
            <ul class="col">
                <li class="row allign-center">
                    <label for="">Email</label>
                    <input type="email" id="email" name="email" placeholder="email@email.com" required>
                </li>
                <li class="row allign-center">
                    <label for="">Password Lama</label>
                    <input type="password" id="old_pass" name="old_pass" placeholder="Password Lama" required>
                </li>
                <li class="row allign-center">
                    <label for="">Password Baru</label>
                    <input type="password" id="new_pass" name="new_pass" placeholder="Password Baru" required>
                </li>
                <li class="row allign-center">
                    <label for="">Konfirmasi Password Baru</label>
                    <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Konfirmasi Password" required>
                </li>
                <div class="row">
                    <button type="submit">Perbarui</button>
                </div>
            </ul>
        </form>
        <img src="../../assets/data-profil-background.png" alt="" id="water-mark">
    </main>
    <footer class="col">
        <div class="row" id="footer-container">
            <div class="col">
                <h3>Tentang Kami</h3>
                <p>
                    RSUD Siti Fatimah merupakan rumah sakit milik permerintah daerah terbesar di Indonesia, yang berdiri di atas lahan seluas 4,1 Hektar dengan area bangunan seluas 52,952,11 m2.<br>Lahir sebagai bukti keseriusan pemerintah daerah untuk meningkatkan derajat kesehatan masyarakat khususnya di wilayah Provinsi Sumatera Selatan (Sumsel).
                </p>
                <div class="row" id="icons">
                    <a href="https://www.facebook.com/RSUDSitiFatimah" target="output">
                        <img src="../../assets/footer-icons/Facebook.png" alt="">
                    </a>
                    <a href="https://www.youtube.com/c/RSUDSitiFatimahProvSumsel" target="output">
                        <img src="../../assets/footer-icons/Youtube.png" alt="">
                    </a>
                    <a href="https://www.instagram.com/rsudsitifatimah/" target="output">
                        <img src="../../assets/footer-icons/Instagram.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col" id="navigasi">
                <h3>Navigasi</h3>
                <ul >
                    <li>
                        <a href="/beranda">Beranda</a>
                    </li>
                    <li>
                        <a href="/daftar-kegiatan">Pelatihan</a>
                    </li>
                    <li>
                        <a href="/data-profil">Profil</a>
                    </li>
                    <li>
                        <a href="/riwayat">Riwayat</a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h3>Hubungi Kami</h3>
                <ul id="hubungi-kami">
                    <li class="row">
                        <img src="../../assets/footer-icons/Phone.png" alt="">
                        <a href="">
                            +628117117929
                        </a>
                    </li>
                    <li class="row">
                        <img src="../../assets/footer-icons/Gmail.png" alt="">
                        <a href="">
                            sdm.rsudsumsel@gmail.com
                        </a>
                    </li>
                    <li class="row">
                        <img src="../../assets/footer-icons/Location.png" alt="">
                        <a href="">
                            Jl. Kol. H. Burlian, Suka Bangun, Kec. Sukarami, Kota Palembang, Sumatera Selatan 30151
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <p id="mini-text">IT Team RSUD SF Kampus Merdeka 2021</p>
    </footer>
    <script src="../js/utility.js"></script>
    @include('sweetalert::alert')
</body>
</html>