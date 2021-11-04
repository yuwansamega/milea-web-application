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
    <link rel="stylesheet" href="/css/detail-kelas.css" />
    <link rel="stylesheet" href="/css/nav.css" />
    <link rel="stylesheet" href="utility.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
      integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>MILEA </title>
  </head>
<body>
    <nav style="position: sticky">
      <div id="logo">
        <img src="/img/navbar-logo.png" alt="" height="68px" width="68px" />
        <h1 class="new">MILEA</h1>
      </div>
      <ul id="pages">
        <li>
          <a href="/beranda" >Beranda</a>
        </li>
        <li>
          <a href="/daftar-kegiatan" >Pelatihan</a>
        </li>
        <li>
          <a href="/kelas" class="selected">Kelas</a>
        </li>
      </ul>
      <img
        src="/img/navbar-toggle-black.png"
        alt=""
        id="toogle-white"
        width="50px"
        height="50px"
        class="dropdown-toggle"
      />
      <img
        src="/img/navbar-toggle-black.png"
        alt=""
        id="toogle-black"
        width="50px"
        height="50px"
        class="dropdown-toggle"
      />
      <ul id="dropdown">
        <img id="addition" src="/img/dropdown-addition.png" alt="" />
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
              <p>Pelatihan</p>
            </a>
          </li>
          <li>
            <a href="/daftar-kegiatan" class="selected">
              <span class="material-icons-round">list</span>
              <p>Kelas</p>
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


  <main class="align-items-center">
    <div class="header justify-content-center d-flex">
      <div class="card shadow-sm border mb-4">
          <h1>{{ $data_ws->title }}</h1>
          <div class="detail d-flex mt-2">
            <h4 class="mr-5">{{ tgl_indo($data_ws->open_ws) }} - {{ tgl_indo($data_ws->close_ws) }}</h4>
            <h4>{{ $data_ws->place }}</h4>
          </div>
      </div>
    </div>
    <div class="content d-flex justify-content-center mb-4">
      <div class="card shadow-sm d-flex flex-column"> 
        @foreach ($data_material as $item)
            <div class="material d-flex flex-row d-flex align-items-center justify-content-between p-1">
            <div class="detail d-flex flex-row">
              <span class="material-icons-round mr-3"> description </span>
              <h4><a href="{{ asset('materi/'.$item->material_file ) }}" target="_blank" rel="noopener noreferrer">{{ $item->material_label }}</a></h4>
            </div>
            <div class="date-post mr-2">
          <h5>{{ diff($item->created_at); }}</h5>
            </div>
          </div>
          <hr>
        @endforeach
          
          {{-- <div class="material d-flex flex-row d-flex align-items-center justify-content-between p-1">
            <div class="detail d-flex flex-row">
              <span class="material-icons-round mr-3"> description </span>
              <h4>Materi 1 : Pak Yofhie</h4>
            </div>
            <div class="date-post mr-2">
              <h5>Diposting 1 Bulan Lalu</h5>
            </div>
          </div> --}}
      </div>
    </div>
  </main>

  <footer>
    <div class="row">
      <div class="col">
        <p><b>Tentang Kami</b></p>
        <p>RSUD Siti Fatimah merupakan Rumah Sakit Umum Daerah milik Provinsi Sumatera Selatan. Rumah Sakit milik pemerintah daerah terbesar di Indonesia ini berdiri di atas lahan seluas 4,1 Hektar dengan area bangunan seluas 52,952,11 m2.<br> <br> Lahir sebagai bukti dari keseriusan pemerintah daerah untuk meningkatkan derajat kesehatan masyarakat khususnya di wilayah Provinsi Sumatera Selatan (Sumsel).</p>
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
      <div class="col px-sm-5" style="min-width: 200px; margin-bottom:15px">
        <p class=""><b>Navigasi</b></p>
          <a href="/beranda">Beranda</a>
          <br><br>
          <a href="/daftar-kegiatan">Pelatihan</a>
          <br><br>
          <a href="/data-profil">Profil</a>
          <br><br>
          <a href="/riwayat">Riwayat</a>
          <br><br>
          <a href="/kelas">Kelasku</a>
      </div>
      <div class="col">
        <p><b>Hubungi Kami</b></p>
        <div class="col">
          <div class="row flex-nowrap">
            <div class="col flex-grow-0 p-0">
              <img src="../../assets/footer-icons/Phone.png" alt="" style="min-width:21px">
            </div>
            <div class="col">
              <a href="tel:+628117117929">+628117117929</a>
            </div>
          </div>
          <br>
          <div class="row flex-nowrap">
            <div class="col flex-grow-0 p-0">
              <img src="../../assets/footer-icons/Gmail.png" alt="" style="min-width:18px">
            </div>
            <div class="col">
              <a href="mailto:sdm.rsudsumsel@gmail.com">
                  sdm.rsudsumsel@gmail.com
              </a>
            </div>
          </div>
          <br>
          <div class="row flex-nowrap">
            <div class="col flex-grow-0 p-0">
              <img src="../../assets/footer-icons/Location.png" alt="" style="min-width:18px">
            </div>
            <div class="col">
              <a href="https://goo.gl/maps/17obni8cszBPwYCb7">
                  Jl. Kol. H. Burlian, Suka Bangun, Kec. Sukarami, Kota Palembang, Sumatera Selatan 30151
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr style="background-color:white">
    <div class="row" style="margin-top: 15px">
      <div class="col">
        <p class="text-center">IT Team RSUD SF Kampus Merdeka 2021</p>
      </div>
    </div>
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

function diff($since){
  date_default_timezone_set('Asia/Jakarta');
        $waktu_awal=strtotime($since);
        $waktu_akhir=strtotime(now()); // bisa juga waktu sekarang now()
        
        //menghitung selisih dengan hasil detik
        $diff=$waktu_akhir-$waktu_awal;
        
        //membagi detik menjadi jam
        $jam=floor($diff / (60 * 60));
        
        //membagi sisa detik setelah dikurangi $jam menjadi menit
        $menit=$diff - ($jam * (60 * 60));

        $hari=0;
        $minggu=0;

        while($jam/24>0 AND $jam>24){
          $hari++;
          $jam=$jam-24;
        }

        while($hari/24>0 AND $hari>7){
          $minggu++;
          $hari=$hari-7;
        }
        
        if($minggu>0){
          return "Diupload ".$minggu." minggu ".$hari." hari yang lalu";
        }
        elseif($hari>0){
          return "Diupload ".$hari." hari ".$jam." jam yang lalu";
        }
        elseif($jam<1){
          return "Diupload ".floor($menit/60)." menit yang lalu";
        }else{
          return "Diupload ".$jam." jam ".floor($menit/60)." menit yang lalu";
        }
      }

    ?>

    
    @include('sweetalert::alert')
</body>
</html>