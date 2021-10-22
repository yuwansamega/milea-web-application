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
          <a href="/daftar-kegiatan" class="selected">Daftar Kegiatan</a>
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
            <a href="/beranda" class="selected">
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
          <img src="/img/navbar-profile.png" alt="" width="19px" height="19px" />
          <span class="material-icons-round">account_box</span>
          <li>Profil</li>
        </a>
        <a href="/riwayat">
          <img src="/img/navbar-history.png" alt="" width="19px" height="19px" />
          <span class="material-icons-round">history</span>
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
    <div class="container" style="margin-top: 150px">
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
                    {{ $ws->describe}}
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
                        >{{ $ud['label'] }}</label
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
      
      <div class="row">
        
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
            
            
          <div class="row mt-2 pt-3 justify-content-end">

            <button type="submit" class="btn" style="font-weight: bolder; border:1px solid; border-color:#198754; color:black;">DAFTAR</button>
          </div>


        </div>
    </form>
    </div>
    

    <!-- Footer -->
    <div class="copyright">
      <div class="text-center text-dark p-3">
        <h6>
          All Right Reserved © IT Team RSUD Siti Fatimah Kampus Merdeka 2021
        </h6>
        <a>Temukan kami di : </a>
        <a href="https://api.whatsapp.com/send?phone=08117117929" target="output"><img src="/img/Call.png" width="30" alt="" /></a>
        <a href="mailto:sdm.rsudsumsel@gmail.com" target="output"><img src="/img/Gmail.png" width="30" alt="" /></a>
        <a href="https://www.facebook.com/RSUDSitiFatimah" target="output"><img src="/img/Facebook.png" width="30" alt="" /></a>
        <a href="https://www.youtube.com/c/RSUDSitiFatimahProvSumsel" target="output"><img src="/img/Youtube.png" width="30" alt="" /></a>
        <a href="https://www.instagram.com/rsudsitifatimah/" target="output"><img src="/img/Instagram.png" width="30" alt="" /></a>
      </div>
    </div>
    <!-- Footer End -->
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
