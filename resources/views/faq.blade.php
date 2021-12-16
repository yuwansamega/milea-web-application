<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <link rel="shortcut icon" href="/img/Logo-only.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-5.1.1-dist\css\bootstrap.min.css" />
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="bootstrap-5.1.1-dist\js\bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="/css/faq.css" />
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
    <title>FAQ MILEA</title>
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
        <a href="/login"><button type="button" class="btn btn-outline-success">Masuk</button></a>
    </nav>


    {{-- Main Content --}}
    <main >
      <div class="container mt-4">
        <div class="title d-flex justify-content-center flex-column text-center mb-4">
          <h1>Frequently Asked Question (FAQ)</h1>
          <p>Berikut adalah daftar pertanyaan beserta jawabannya yang sering ditanyakan berkaitan dengan penggunaan aplikasi MILEA </p>
        </div>
        <div class="header mb-2 ">
          Pertanyaan Umum Seputar Aplikasi MILEA
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwoo">
              <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoo" aria-expanded="false" aria-controls="collapseTwoo">
                <strong>Apa Itu MILEA?</strong>
              </button>
            </h2>
            <div id="collapseTwoo" class="accordion-collapse collapse" aria-labelledby="headingTwoo" data-parent="#accordionExample">
              <div class="accordion-body">
                Milea merupakan website yang mewadahi penyelenggaraan pelatihan untuk di dalam RSUD Siti Fatimah ataupun pelatihan umum
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <strong> Bagaimana Cara Melakukan Pendaftaran Pelatihan di MILEA?</strong> 
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="accordion-body">
                Berikut Cara Melakukan Pendaftaran Pelatihan Lewat Aplikasi MILEA: <br>
                a.&nbsp;&nbsp;Melakukan pendaftaran pada website milea.<br>
                b.&nbsp;&nbsp;Memasukan data diri atau profil pengguna.<br>
                c.&nbsp;&nbsp;Mengunggah berkas yang dibutuhkan.<br>
                d.&nbsp;&nbsp;Mengunggah bukti pembayaran.<br>
                e.&nbsp;&nbsp;Memasukan kode kelas yang didapatkan.<br>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <strong>Apakah Semua Calon Peserta Pelatihan Akan Diterima?</strong> 
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="accordion-body">
                Tidak semua calon peserta akan diterima. Hanya peserta yang lulus verifikasi berkas dan verifikasi pembayaran yang akan di terima di pelatihan.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThreee">
              <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThreee" aria-expanded="false" aria-controls="collapseThreee">
                <strong>Kapan Pelatihan Dibuka Kembali?</strong> 
              </button>
            </h2>
            <div id="collapseThreee" class="accordion-collapse collapse" aria-labelledby="headingThreee" data-parent="#accordionExample">
              <div class="accordion-body">
                Info pembukaan pelatihan baru akan selalu di infokan di website Milea pada halaman pelatihan.  
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThreeee">
              <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeee" aria-expanded="false" aria-controls="collapseThreeee">
                <strong>Apakah Setiap Pelatihan Yang Dilaksanakan Lewat Aplikasi MILEA Terbuka Untuk Umum?</strong> 
              </button>
            </h2>
            <div id="collapseThreeee" class="accordion-collapse collapse" aria-labelledby="headingThreeee" data-parent="#accordionExample">
              <div class="accordion-body">
                Tidak semua pelatihan dalam aplikasi MILEA diberlakukan untuk umum. Terdapat beberapa pelatihan yang di khususkan untuk internal RSUD Siti Fatimah. 
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    {{-- Main Content End --}}

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
</body>
</html>