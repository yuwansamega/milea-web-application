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
    <link rel="stylesheet" href="/css/detail-kegiatan.css" />
    <link rel="stylesheet" href="/css/nav.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
      integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/debebc2c1e.js" crossorigin="anonymous"></script>

    <title>{{ $title }}</title>
  </head>
  <body>
    <nav>
      <div id="logo">
        <img src="/img/navbar-logo.png" alt="" height="68px" width="68px" />
        <h1 class="new">MILEA</h1>
      </div>
      <ul id="pages">
        <li>
          <a href="/beranda" >Beranda</a>
        </li>
        <li>
          <a href="/daftar-kegiatan" class="selected">Pelatihan</a>
        </li>
        <li>
          <a href="/kelas" >Kelas</a>
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
            <a href="/beranda" >
              <span class="material-icons-round">home</span>
              <p>Beranda</p>
            </a>
          </li>
          <li>
            <a href="/daftar-kegiatan" class="selected">
              <span class="material-icons-round selected">list</span>
              <p>Pelatihan</p>
            </a>
          </li>
          <li>
            <a href="/kelas">
              <span class="material-icons-round">class</span>
              <p>Kelas</p>
            </a>
          </li>
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

    <div class="container" style="margin-top: 200px">
      <div class="row pertama justify-content-center">
        <div class="container">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th
                  scope="col"
                  style="width: 1288px; font-size: 23px; font-weight: 600"
                >
                  &nbsp;&nbsp;&nbsp; Deskripsi Pelatihan
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" style="text-align: justify; padding: 30px;font-size: 18px;">
                  <p>
                    {!! $ws->describe !!}
                  </p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row kedua" >
        <div class="container">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th colspan="2"
                  scope="col"
                  style="font-size: 23px; font-weight: 600"
                >
                  &nbsp;&nbsp;&nbsp; Detail Data Pelatihan
                </th>
              </tr>
            </thead>
            <tbody style="font-size: 18px;">
              <tr>
                <td class="tb-kiri" >Tahun Pelaksanaan</td>
                <td>{{ date('Y',strtotime($ws->close_ws)) }}</td>
              </tr>
              <tr>
                <td class="tb-kiri">Nama Pelatihan</td>
                <td>{{ $ws->title }}</td>
              </tr>
              <tr>
                <td class="tb-kiri"> Periode Pendaftaran</td>
                <td>{{ tgl_indo($ws->open_regist) }} - {{ tgl_indo($ws->close_regist) }}</td>
              </tr>
              <tr>
                <td class="tb-kiri">Periode Pelaksanaan</td>
                <td>{{ tgl_indo($ws->open_ws) }} - {{ tgl_indo($ws->close_ws) }}</td>
              </tr>
              <tr>
                <td class="tb-kiri">Tempat Penyelengaraan</td>
                <td>{{ $ws->place }}</td>
              </tr>
              <tr>
                <td class="tb-kiri">Kuota</td>
                <td>{{ $ws->quota }} Peserta</td>
              </tr>
              <tr>
                <td class="tb-kiri">Narahubung</td>
                <td>
                  {{ $ws->cp }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row keempat justify-content-center" style="margin-top: 50px">
        <div class="container">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th
                  scope="col"
                  style="width: 1288px; font-size: 23px; font-weight: 600"
                >
                  &nbsp;&nbsp;&nbsp; Kriteria Peserta
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" style="text-align: justify; padding: 30px;font-size: 18px;">
                  <p>
                    {!!$ws->criteria !!} 
                  </p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="row ketiga">
        <div class="col-sm-6 kiri">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th
                colspan="2"
                  scope="col"
                  style="width: 1288px; font-size: 23px; font-weight: 600"
                >
                  &nbsp;&nbsp;&nbsp; Kelengkapan Dokumen (Unduh)
                </th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              @if(count($unduh)>0)
                @foreach ($unduh as $ud)
                

                <tr>
                  <td
                  scope="row"
                  style="text-align: left; width: 330px; padding-left: 30px;font-size: 18px;">
                  <div class="row">
                    <div>
                      <label for="inputEmail3" class="col-form-label" 
                        >{{ $ud["label"] }}</label
                      >
                    </div>
                  </div>
                </td>
                <td>
                  
                    <div>
                      <a href="{{ asset('/admin/berkas/'.$ud['file'] ) }}" target="_blank" rel="noopener noreferrer" style="font-size: 2em; color:#707070;"><i class="far fa-file-pdf"></i></a>
                      </div>
                  
                </td>
              </tr>
              @endforeach
              @else
                <tr>
                  <td scope="row" style="text-align: justify; padding: 30px">
                    <div class="row">
                      <div class="col-sm-3">
                        <img id="warning"
                          src="/img/warning.png"
                          style="margin-left: 15px"
                          alt=""
                        />
                      </div>
                      <div class="col-sm-9">
                        <h6 id ="unduhan" style="margin-top: 25px; color: crimson;font-size: 18px;">
                          Tidak Ada Yang Perlu Diunduh!
                        </h6>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
            </tbody>
          </table>
        </div>

        <div class="col-sm-6 kanan">
          <table class="table table-borderless" style="height: 198.58px">
            <thead>
              <tr>
                <th
                  scope="col"
                  style="font-size: 23px; font-weight: 600"
                  colspan="2"
                >
                  &nbsp;&nbsp;&nbsp; Kelengkapan Dokumen (Unggah)
                </th>
              </tr>
            </thead>
            <tbody>
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
              <form action="/update_submission/{{ $ws->id }}" method="post" enctype="multipart/form-data">
                @csrf
              
                <?php $i=1;?>
                @if(count($label_upload)>0)
                  @foreach ($label_upload as $upload)
                  <tr>
                    <td
                    scope="row"
                    style="text-align: left; width: 220px; padding-left: 30px;font-size: 18px;">
                    <div class="row">
                      <div>
                        <label for="inputEmail3" class="col-form-label"
                          >{{ $upload }}</label
                        >
                      </div>
                    </div>
                  </td>
                  <td style="padding-left: 30px;">
                    <div class="row">
                      <div>
                        <input
                          type="file"
                          class="form-control-file"
                          id="exampleFormControlFile1"
                          name="file_<?php echo $i++?>"
                          accept="application/pdf"
                          required
                        />
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                @else
                  <tr>
                    <td scope="row" style="text-align: justify; padding: 30px">
                      <div class="row">
                        <div class="col-sm-3">
                          <img id="warning"
                            src="/img/warning.png"
                            style="margin-left: 15px"
                            alt=""
                          />
                        </div>
                        <div class="col-sm-9">
                          <h6 id="unggahan" style="margin-top: 25px; color: crimson;font-size: 18px;">
                            Tidak Ada Yang Perlu Diunggah!
                          </h6>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endif
            </tbody>
          </table>
        </div>
      </div>
      <div class="row kelima justify-content-center" style="margin-top: 50px">
        <div class="container">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th
                  scope="col"
                  style="width: 1288px; font-size: 23px; font-weight: 600"
                >
                  &nbsp;&nbsp;&nbsp; Konfirmasi Pendaftaran
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" style="text-align: justify; padding: 30px;font-size: 18px;">
                  <ul>
                    <li>Saya telah membaca <b>seluruh detail pelatihan</b></li>
                    <li>Saya telah melengkapi <b>dokumen dengan benar</b></li>
                    <li>Saya bersedia mengikuti <b>pelatihan dari awal sampai akhir</b></li>
                    <li>Saya bersedia menunggu <b>hasil verifikasi berdasarkan keputusan penyelenggara pelatihan</b> dan <b>tidak mengganggu gugat hasil verifikasi</b></li>
                    <li>Hasil verifikasi akan diberikan melalui <b>akun MILEA, whatsapp</b>, atau <b>email</b></li>
                    <hr>
                    <div class="form-check" style="font-size: 19px; margin-top:20px;">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1" style="transform: scale(1.75);" required>
                      <label class="form-check-label" for="exampleCheck1" style="margin-left: 7px">Saya menyatakan bahwa pernyataan di atas adalah <span style="color: red"><b>BENAR</b></span>.</label>
                    </div>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    <div class="container">   
        <div class="row mt-2 pt-3 justify-content-end" id="btn-daftar">
          <button type="submit" id="sub" class="btn" style="font-weight: bolder; border:1px solid; border-color:#198754; color:black;">DAFTAR</button>
        </div>
    </div>
    </form>
    </div>
    

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
              <div class="col overflow-hidden">
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
