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
    <link rel="stylesheet" href="/css/kelas.css" />
    <link rel="stylesheet" href="/css/nav.css" />
    <link rel="stylesheet" href="utility.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
      integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
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
  <script>if(performance.navigation.type == 2){
    location.reload(true);
 }</script>
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
        <div class="desc d-flex flex-column justify-content-center align-items-center mb-2">
            <h1>Masukkan Kode Kelas</h1>
            <p class="text-center">Kode didapat dari email yang telah dikirimkan oleh pihak penyelenggara setelah kamu melakukan pendaftaran</p>
        </div>
        <div class="key-component d-flex align-items-center border">
            <span class="material-icons-round" style="color: #198754; transform: rotate(320deg);">key</span>&nbsp;
            <h5>|</h5>&nbsp;
            <form action="/check-enroll-key" method="post">
              @csrf
            <input type="text" placeholder="Masukkan Kode Disini..." class="border-0" name="key" autocomplete="off">
            <button type="submit" class="btn btn-success">Enroll</button></form>
        </div>
        
        @if($count<=0)
        {{-- No Class --}}
        <div class="my-class d-flex flex-column align-items-center justify-content-center">
          <div class="title">
            <h5>DAFTAR KELASKU</h5>
        </div>
            <div class="attention d-flex align-items-center border justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="80px" viewBox="0 0 24 24" width="80px" fill="#DF2E2E"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                <h5 class="mt-1">Belum Ada Kelas!</h5>
            </div>
        </div>
        @elseif($count>0)
        <div class="my-class d-flex flex-column align-items-center justify-content-center">
            <div class="title">
                <h5>DAFTAR KELASKU</h5>
            </div>
            <div class="attention d-flex flex-column border justify-content-center">
              <?php $i=1; ?>
              @foreach($data as $d)
                <div class="card d-flex flex-row align-items-center mb-2 mx-auto">
                    <div class="num">
                        <h4><?=$i++?>. </h4>
                    </div>
                    <div class="nama-pelatihan">
                        <h4>
                            {{ $d->title }}
                        </h4>
                    </div>
                    <div class="lokasi">
                        <h4>{{ $d->place }}</h4>
                    </div>
                    <div class="tanggal-pelaksanaan">
                        <h4>{{ tgl_indo($d->open_ws) }} - {{ tgl_indo($d->close_ws) }}</h4>
                    </div>
                    <div class="action d-flex flex-row">
                        <a href="/detail-kelas/{{ $d->key }}"><button type="button" class="btn btn-success mr-2">Masuk</button> </a>
                        <form method="POST" action="{{ route('user_classes.delete', $d->id) }}">
                          @csrf
                          <input name="_method" type="hidden" value="DELETE">
                          <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Hapus</button>
                      </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
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
    ?>
    @include('sweetalert::alert')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Apakah anda yakin ingin keluar dari kelas ini?`,
              text: "",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
</html>