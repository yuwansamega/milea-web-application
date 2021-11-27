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
    <link rel="stylesheet" href="/css/riwayat.css" />
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <title>MILEA | {{ $title }}</title>
  </head>
  <body>
    <nav>
      <div id="logo">
        <img src="/img/navbar-logo.png" alt="" height="68px" width="68px" />
        <h1 class="new">MILEA</h1>
      </div>
      <ul id="pages">
        <li>
          <a href="/beranda">Beranda</a>
        </li>
        <li>
          <a href="/daftar-kegiatan" class="selected" >Pelatihan</a>
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
          <span class="material-icons-round selected">history</span>
          <li><b>Riwayat</b></li>
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

    <div class="main-content">
      <div class="container">
        <?php $i = 0 ?>
        
        <h2>Riwayat Pelatihan</h2>
        @if($count==0)
        <div class="alert alert-danger" role="alert">
          Anda belum mendaftar pelatihan, pilih pelatihan <a href="/daftar-kegiatan" style="text-decoration: underline">disini</a>
        </div>
        @else
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
        <table class="table table-responsive table-borderless">
          
          <thead>
            <tr style="color: white;">
              <th scope="col">No</th>
              <th scope="col">Nama Pelatihan</th>
              <th scope="col">Waktu Pelaksanaan</th>
              <th scope="col">Tempat Pelaksanaan</th>
              <th scope="col">Status Berkas</th>
              <th scope="col">Status Pembayaran</th>
              <th scope="col">Catatan</th>
            </tr>
          </thead>
          <?php $i=0;?>
          <tbody>
            
            @foreach($riwayat_user as $riwayat)
            <tr>
              <td scope="row"><?= $riwayat_user->firstItem() + $i++ ?></td>
              <td>{{ $riwayat->title}}</td>
              <td>{{ tgl_indo($riwayat->open_ws) }} - {{ tgl_indo($riwayat->close_ws) }}</td>
              <td>{{ $riwayat->place }}</td>
              <td>{{ $riwayat->status_p}}</td>
              @if($riwayat->status_p==="Diterima" AND ($riwayat->payment_status === "Belum Dikirim" OR $riwayat->payment_status === "Pembayaran Belum Diterima"))
                  <td>
                    <a href="#bannerformmodal" data-toggle="modal" data-target="#bannerformmodal" style="text-decoration: underline; font-weight:bold;">Unggah Bukti Pembayaran</a>
                    <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                              <h4 class="modal-title" id="myModalLabel">Form Unggah Pembayaran</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                              <form id="requestacallform" method="POST" name="requestacallform" action="/update-payment/{{ $riwayat->id }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <div class="input-group d-flex row p-3 align-items-center">       
                                    <label for="first_name" class="mt-2 col-md-6">Bukti Pembayaran <span style="color: red">(jpg,png  max : 2Mb)</span> </label>
                                    <input id="first_name" type="file" class="form-control" placeholder="First Name" name="payment_proof" accept='image/*'/>
                                    <small style="color: red" class="ml-4 mt-2">*Khusus Pegawai RSUD Siti Fatimah, Silakan Unggah Surat Bukti Penugasan pada lembar yang menunjukkan nama anda!</small>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success" style="background-color: #198754; color: white;">Kirim</button>
                              </div>        
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  @elseif($riwayat->status_p==="Menunggu Verifikasi")
                  <td>Menunggu Verifikasi Berkas</td>
                  @elseif($riwayat->status_p==="Ditolak")
                  <td>-</td>
                  @elseif($riwayat->payment_status!=="Belum Dikirim")
                  <td style="font-weight: bold;">{{ $riwayat->payment_status }}</td>

                  @endif
              <td><button type="button" class="btn btn-sm btn-outline-secondary" data-placement="bottom" data-toggle="popover" title="Catatan" data-content="{{ $riwayat->message }}">Catatan</button></td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center" id="links"> {{ $riwayat_user->links() }} </div>
      </div>
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
            <a href="/kelas">Kelas</a>
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
    <script>

$(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>

    <script src="utility.js"></script>
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
