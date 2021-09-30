<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="bootstrap-5.1.1-dist\css\bootstrap.min.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="bootstrap-5.1.1-dist\js\bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/beranda.css" />
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
    <title>Beranda</title>
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
        <a href="#">
          <img src="img/navbar-signout.png" alt="" width="19px" height="19px" />
          <li>Keluar</li>
        </a>
      </ul>
    </nav>

    <!-- Content Start -->
    <div class="rowFirst">
      <div class="col">
        <h1>Selamat Datang di MILEA</h1>
        <p>
          MILEA merupakan website pendaftaran resmi dari RSUD Siti Fatimah untuk
          mitra yang ingin mengikuti pelatihan, pendidikan dan pengembangan di
          RSUD Siti Fatimah.
        </p>
      </div>
      <div class="imgRight">
        <img src="/img/vect-1.png" width="640" />
      </div>
    </div>

    <div class="rowSecond">
      <div class="col">
        <div class="vectLeft">
          <img src="img/vect-4.png" width="540" alt="" />
        </div>
      </div>
      <div class="titleCard">
        <h2 style="width: 1000px; margin-left: 70px; margin-bottom: 30px">
          Pelatihan Yang Tersedia
        </h2>
        <div class="cardMan">
          <div class="bodyCard">
            <h5>Pelatihan Tenaga Pelatih Kesehatan</h5>
            <div class="container">
              <hr />
            </div>
            <div class="row">
              <div class="coLeft col-sm-2">
                <img src="img/calendar.png" width="25" alt="" />
                <br />
                <br />
                <img src="img/location.png" width="25" alt="" />
              </div>
              <div class="col-sm-10" style="margin-top: -68px">
                <p class="cardContent">11 - 15 Oktober, 2021</p>
                <br />
                <p class="cardContent">Hotel The Zuri</p>
                <a href="/detail-kegiatan">
                  <div class="textDetail">Lihat Detail</div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="copyright">
      <div class="text-center text-dark p-3">
        <h6>
          All Right Reserved © IT Team RSUD Siti Fatimah Kampus Merdeka 2021
        </h6>
        <a>Temukan kami di : </a>
        <a href=""><img src="img/Call.png" width="30" alt="" /></a>
        <a href=""><img src="img/Gmail.png" width="30" alt="" /></a>
        <a href=""><img src="img/Facebook.png" width="30" alt="" /></a>
        <a href=""><img src="img/Youtube.png" width="30" alt="" /></a>
        <a href=""><img src="img/Instagram.png" width="30" alt="" /></a>
      </div>
    </div>
    <script src="/js/utility.js"></script>
  </body>
</html>
