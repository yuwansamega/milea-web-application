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
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody> 
                        
            @foreach ($workshops as $ws)
        <tr>
        <td scope="row"><?= $workshops->firstItem() + $i++ ?></td>
        <?php
        if (date('Y-m-d H:i:s')<$ws->close_regist){?>
          <td style="font-weight:bold; color: #198754 ;">Dibuka</td>
        <?php 
        }else{?>
          <td style="font-weight:bold; color: rgb(240, 41, 41);">Tutup</td><?php 
        }
        
        ?>   
        
            <td>{{ $ws->title }}</td>
            <td>{{ tgl_indo($ws->open_regist) }} - {{ tgl_indo($ws->close_regist) }}</td>
            <td>{{ tgl_indo($ws->open_ws) }} - {{ tgl_indo($ws->close_ws) }}</td>
            <td>{{ $ws->quota }}</td>
            <td>
              @php
                  if (date('Y-m-d H:i:s')<$ws->close_regist) :
                  @endphp
                    <a href="/detail-kegiatan/{{ $ws->id }}" data-toggle="tooltip" data-placement="top" title="Detail"
                      >
                      <img src="/img/eye.png" alt="" class="center"/>
                    </a>
                  @php
                      
                      else : @endphp
                      <img src="/img/eye.png" alt="" class="center" data-toggle="tooltip" data-placement="top" title="Pendaftaran Sudah Tutup"/>
                      @php
                          endif;
                      @endphp
            </td>
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

  <footer>
    <!-- Footer -->
    <div class="copyright">
      <div class="text-center text-dark p-3">
        <h6>
          All Right Reserved © IT Team RSUD Siti Fatimah Kampus Merdeka 2021
        </h6>
        <a>Temukan kami di : </a>
        <a href="https://api.whatsapp.com/send?phone=08117117929" target="output"><img src="img/Call.png" width="30" alt="" /></a>
        <a href="mailto:sdm.rsudsumsel@gmail.com" target="output"><img src="img/Gmail.png" width="30" alt="" /></a>
        <a href="https://www.facebook.com/RSUDSitiFatimah" target="output"><img src="img/Facebook.png" width="30" alt="" /></a>
        <a href="https://www.youtube.com/c/RSUDSitiFatimahProvSumsel" target="output"><img src="img/Youtube.png" width="30" alt="" /></a>
        <a href="https://www.instagram.com/rsudsitifatimah/" target="output"><img src="img/Instagram.png" width="30" alt="" /></a>
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
