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
    <link rel="stylesheet" href="/css/daftar-kegiatan.css" />
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
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <title>MILEA | {{ $title }}</title>
  </head>
  <body>
   <nav style="position: sticky">
        <a href="/">
          <div id="logo">
              <img src="/img/navbar-logo.png" alt="" height="68px" width="68px" />
              <h1 class="new">MILEA</h1>
          </div>
        </a>
        <ul id="pages">
            <li>
            <a href="/beranda-guest">Beranda</a>
            </li>
            <li>
            <a href="/pelatihan-guest">Pelatihan</a>
            </li>
        </ul>
        <a href="/login">
          <button type="button" class="btn btn-outline-success">Masuk</button>
        </a>
    </nav>


    <main>
        <div class="main-content">
        <div class="container">
            <h2>Agenda Pelatihan</h2>
            <?php $i = 0 ?>
            @if($count!=0)
            <table class="table table-borderless table-responsive table-striped">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Status</th>
                <th scope="col">Nama Pelatihan</th>
                <th scope="col">Periode Pendaftaran</th>
                <th scope="col">Periode Pelaksanaan</th>
                <th scope="col">Kuota</th>
                
                </tr>
            </thead>
            <tbody> 
                            
                @foreach ($workshops as $ws)
            <tr>
            <td scope="row"><?= $workshops->firstItem() + $i++ ?></td>
            @if(date('Y-m-d')<$ws->open_regist)
            <td style="font-weight:bold; color: black ;">Belum Dibuka</td>
            @elseif(date('Y-m-d')<=$ws->close_regist)
            <td style="font-weight:bold; color: #198754 ;">Dibuka</td>
            @else
            <td style="font-weight:bold; color: rgb(240, 41, 41);">Tutup</td>
            @endif
            
            
            
            
                <td>{{ $ws->title }}</td>
                <td>{{ tgl_indo($ws->open_regist) }} - {{ tgl_indo($ws->close_regist) }}</td>
                <td>{{ tgl_indo($ws->open_ws) }} - {{ tgl_indo($ws->close_ws) }}</td>
                <td>{{ $ws->quota }}</td>
                
                </tr>
                @endforeach
                @else
                <tr>
                <div class="alert alert-danger" role="alert" style="width: 1000px">
                    Tidak Ada Pelatihan Tersedia
                </div></tr>
                @endif
            </tbody>
            </table>
            <div class="d-flex justify-content-center" id="links"> {{ $workshops->links() }} </div>
        </div>
        </div>
    </main>

    <!-- Footer -->
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
            <a href="/beranda-guest">Beranda</a>
            <br><br>
            <a href="/pelatihan-guest">Pelatihan</a>
            <br><br>
            <a href="/faq">FAQ</a>
        </div>
        <div class="col">
          <p><b>Hubungi Kami</b></p>
          <div class="col">
            <div class="row flex-nowrap">
              <div class="col flex-grow-0 p-0">
                <img src="../../assets/footer-icons/Phone.png" alt="" style="min-width:21px">
              </div>
              <div class="col">
                <a href="https://wa.me/+6282184678527" target="_blank">+6282184678527</a>
              </div>
            </div>
            <br>
            <div class="row flex-nowrap">
              <div class="col flex-grow-0 p-0">
                <img src="../../assets/footer-icons/Gmail.png" alt="" style="min-width:18px">
              </div>
              <div class="col overflow-hidden">
               <a href="mailto:diklatrsudsitifatimah@gmail.com">
                    diklatrsudsitifatimah@gmail.com
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
    ?>
  </body>
</html>
