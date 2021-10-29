
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
    <link rel="stylesheet" href="/css/beranda.css" />
    <link rel="stylesheet" href="/css/nav.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
      integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
          <a href="/beranda" class="selected">Beranda</a>
        </li>
        <li>
          <a href="/daftar-kegiatan">Daftar Kegiatan</a>
        </li>
      </ul>
      <img
        src="img/navbar-toggle-white.png"
        alt=""
        id="toggle-white"
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
          <img src="/img/navbar-profile.png" alt="" width="19px" height="19px" />
          <li>Profil</li>
        </a>
        <a href="/riwayat">
          <img src="/img/navbar-history.png" alt="" width="19px" height="19px" />
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

    <!-- Content Start -->
    <div class="rowFirst">
      <div class="col">
        <div class="group">
          <h1>Selamat Datang di MILEA</h1>
          <p>
            MILEA merupakan website pendaftaran resmi dari RSUD Siti Fatimah
            untuk mitra yang ingin mengikuti pelatihan, pendidikan dan
            pengembangan di RSUD Siti Fatimah.
          </p>
          <button class="ikuti-pelatihan">Ikuti Pelatihan 
            <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.375 14H23.625" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M15.75 6.125L23.625 14L15.75 21.875" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        </div>
      </div>
      <div class="imgCol">
          <img src="/img/head.png" />
      </div>
    </div>

    <div class="rowSecond">
      <div class="left">
         <img src="img/vect-4.png" alt="" />
      </div>
      <div class="right">
          <div class="content-title"> 
            <h1>Pelatihan Terbaru</h1>
          </div>
          <div class="card">
              <div class="card-title">
                  <h3>{{ $ws->title }}</h3>
                  <hr>
              </div>
              <div class="card-content">
                <div class="line first">
                  <img src="/img/calendar.png" alt="">
                  <h4>Waktu : {{ tgl_indo($ws->open_ws) }} - {{ tgl_indo($ws->close_ws) }}</h4>
                </div>
                <div class="line second">
                  <img src="/img/location.png" alt="">
                  <h4>Tempat : {{ $ws->place }}</h4>
                </div>
                <div class="third">
                  <a href="/detail-kegiatan/{{ $ws->id }}">
                    <h5>Lihat Detail</h5>
                  </a>
                </div>
              </div>
          </div>
      </div>
    </div>
    
    <div class="rowThird">
      <h1  style="background-color: white">Pelatihan Yang Telah Dilaksanakan</h1>
      <div class="content">
        <div class="card">
          <div class="pict">
            <img src="/img/rect-16.png" alt="">
          </div>
          <div class="title-card">
            <h3>Pelatihan Tenaga Pelatih Kesehatan</h3>
          </div>
          <div class="details">
            <div class="place">
               <h5>{{ $ws->place }}</h5>
            </div>
             <div class="time">
                {{ tgl_indo($ws->open_ws) }} - {{ tgl_indo($ws->close_ws) }}
              </div>
          </div>
        </div>
        <div class="card">
          <div class="pict">
            <img src="/img/rect-16.png" alt="">
          </div>
          <div class="title-card" >
            <h3>Pelatihan Tenaga Pelatih Kesehatan</h3>
          </div>
          <div class="details">
            <div class="place">
               <h5>{{ $ws->place }}</h5>
            </div>
             <div class="time">
                {{ tgl_indo($ws->open_ws) }} - {{ tgl_indo($ws->close_ws) }}
              </div>
          </div>
        </div>
        <div class="card">
          <div class="pict">
            <img src="/img/rect-16.png" alt="">
          </div>
          <div class="title-card">
            <h3>Pelatihan Tenaga Pelatih Kesehatan</h3>
          </div>
          <div class="details">
            <div class="place">
               <h5>{{ $ws->place }}</h5>
            </div>
             <div class="time">
                {{ tgl_indo($ws->open_ws) }} - {{ tgl_indo($ws->close_ws) }}
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="rowFourth">
      <h1>Pelatih Berstandar Nasional</h1>
      <div class="content">
        <div class="pelatih">
            <img src="img/Yan Bani.png" alt="">
        </div>
        <div class="pelatih" style="margin-top: 18px">
          <img src="img/Wajedi.png" alt="">
        </div>
         <div class="pelatih" style="margin-top: 7px">
           <img src="img/Yofhi.png" alt="">
         </div>
         <div class="pelatih netty" style="margin-top: 36px">
           <img src="img/Netty.png" alt="">
         </div>
      </div>
    </div>
     <footer class="col">
        <div class="row" id="footer-container">
            <div class="col">
                <h3>Tentang Kami</h3>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;RSUD Siti Fatimah merupakan rumah sakit milik permerintah daerah terbesar di Indonesia, yang berdiri di atas lahan seluas 4,1 Hektar dengan area bangunan seluas 52,952,11 m2.<br>&nbsp;&nbsp;&nbsp;Lahir sebagai bukti keseriusan pemerintah daerah untuk meningkatkan derajat kesehatan masyarakat khususnya di wilayah Provinsi Sumatera Selatan (Sumsel).
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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="/js/utility.js"></script>
     <?php
    function tgl_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);
      // variabel pecahkan 0 = tahun
      // variabel pecahkan 1 = bulan
      // variabel pecahkan 2 = tanggal
     
      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    ?>
    @include('sweetalert::alert')
  </body>
</html>

