<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/Logo-only.png">
    <link rel="stylesheet" href="/css/utility.css">
    <link rel="stylesheet" href="/css/perbarui-profil.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Data Profil</title>
</head>
<body>
    <nav>
        <div id="logo">
          <img src="../../assets/navbar-logo.png" alt="" height="68px" width="68px" />
          <h1 class="new">MILEA</h1>
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
          src="../../assets/navbar-toggle-white.png"
          alt=""
          id="toogle-white"
          width="50px"
          height="50px"
          class="dropdown-toggle"
        />
        <img
          src="../../assets/navbar-toggle-black.png"
          alt=""
          id="toogle-black"
          width="50px"
          height="50px"
          class="dropdown-toggle"
        />
        <ul id="dropdown">
            <img id="addition" src="../../assets/dropdown-addition.png" alt="" />
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
    <main class="row justify-center">
        <div id="left" class="col">
            <div class="row" id="header">
                <img src="\user\ava\{{ $data_user->image }}"alt="" id="profil-pic">
                <div class="group col justify-center">
                    <h1>{{$data_user->fullname }}</h1>
                    <h2>{{$data_user->position }}</h2>
                    <h3>{{$data_user->institute}}</h3>
                </div>
            </div>
            <ul class="col">
                <a class="row allign-center" href="/data-profil">
                    <li class="row allign-center">
                        <span class="material-icons-round" >person</span>
                        <p>Detail Profil</p>
                    </li>
                </a>
                <a class="row allign-center" href="/lengkapi-profil">
                    <li class="row allign-center active">
                        <span class="material-icons-round">edit</span>
                        <p>Perbarui Profil</p>
                    </li>
                </a>
                <a class="row allign-center" href="/ubah-pass">
                    <li class="row allign-center">
                        <span class="material-icons-round">vpn_key</span>
                        <p>Ubah Password</p>
                    </li>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a class="row allign-center log-out" href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                    <li class="row allign-center">
                        <span class="material-icons-round">logout</span>
                        <p>Keluar</p>
                    </li>
                </a>
            </form>
            </ul>
        </div>


        <form id="right" class="col" action="/update-data-diri/{{ $data_user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <h1>Perbarui Data Diri</h1>
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
            <ul class="col">
                <li class="row allign-center">
                    <label for="">Pas Foto</label>
                    <input type="file" class="col center" style="color: transparent;" name="image">
                </li>
                <li class="row allign-center">
                    <label for="">Nama</label>
                    <input type="text" name="fullname" value="{{ $data_user->fullname }}" placeholder="Nama Lengkap" required>
                </li>
                <li class="row allign-center">
                    <label for="">NIP</label>
                    <input type="text" id="NIP" name="nip" value="{{ $data_user->nip }}" placeholder="NIP/Jika tidak ada isi '-'" required>
                </li>
                <li class="row allign-center">
                    <label for="">NIK</label>
                    <input type="text" id="KTP" name="nik" value="{{ $data_user->nik }}" placeholder="NIK" required>
                </li>
                <li class="row allign-center">
                    <label for="">Tempat Lahir</label>
                    <input type="text" id="TempatLahir" name="birth_place" placeholder="Tempat Lahir" value="{{ $data_user->birth_place }}" required>
                </li>
                <li class="row allign-center">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" id="TanggalLahir" name="birth_date" value="{{ $data_user->birth_date }}" required>
                </li>
                <li class="row allign-center">
                    <label for="">Jenis Kelamin</label>
                    <select id="gender" name="gender">
                        <option value="-" {{( $data_user->gender === '-') ? 'Selected' : ''}}>-</option>
                        <option value="Laki-Laki" {{( $data_user->gender === 'Laki-Laki') ? 'Selected' : ''}}>Laki-Laki</option>
                        <option value="Perempuan" {{( $data_user->gender === 'Perempuan') ? 'Selected' : ''}}>Perempuan</option>
                </select>
                </li>
                <li class="row allign-center">
                    <label for="">Alamat Domisili</label>
                    <textarea name="address" id="alamatDomisili" cols="30" rows="5" 
                    placeholder="Alamat Domisili Lengkap"
                    required>{{ $data_user->address }}</textarea>
                </li>
                <li class="row allign-center">
                    <label for="">Status</label>
                    <select id="Status" name="status">
                            <option value="-" {{( $data_user->status === '-') ? 'Selected' : ''}}>-</option>
                            <option value="CPNS" {{( $data_user->status === 'CPNS') ? 'Selected' : ''}}>CPNS</option>
                            <option value="PNS" {{( $data_user->status === 'PNS') ? 'Selected' : ''}}>PNS</option>
                            <option value="Lainnya" {{( $data_user->status === 'Lainnya') ? 'Selected' : ''}}>Lainnya</option>
                    </select>
                </li>
                <li class="row allign-center">
                    <label for="">Agama</label>
                    <select id="Agama" name="religion">
                          <option value="Islam" {{( $data_user->religion === 'Islam') ? 'Selected' : ''}}>Islam</option>
                          <option value="Kristen" {{( $data_user->religion === 'Kristen') ? 'Selected' : ''}}>Kristen</option>
                          <option value="Katolik" {{( $data_user->religion === 'Katolik') ? 'Selected' : ''}}>Katolik</option>
                          <option value="Hindu" {{( $data_user->religion === 'Hindu') ? 'Selected' : ''}}>Hindu</option>
                          <option value="Buddha" {{( $data_user->religion === 'Buddha') ? 'Selected' : ''}}>Buddha</option>
                          <option value="Konghucu" {{( $data_user->religion === 'Konghucu') ? 'Selected' : ''}}>Konghucu</option>
                  </select>
                </li>
                <li class="row allign-center">
                    <label for="">Email</label>
                    <input type="email" id="Email" name="email" value="{{ $data_user->email }}" placeholder="email@email.com" required>
                </li>
                <li class="row allign-center">
                    <label for="">No Handphone</label>
                    <input type="text"id="hp" name="phone" value="{{ $data_user->phone }}" placeholder="Nomor WA yang bisa dihubungi" required>
                </li>
                <li class="row allign-center">
                    <label for="">Pendidikan Terakhir</label>
                    <input type="text" id="pendidikan" value="{{ $data_user->edu}}" placeholder="Contoh : S1 - Keperawatan/ SMA-IPA" name="edu">
                </li>
                <li class="row allign-center">
                    <label for="">Pangkat Golongan</label>
                    <select id="level" name="level">
                        @foreach($rank_level as $r)
                          <option value="{{$r}}" {{( $data_user->level ===  $r) ? 'Selected' : ''}}>{{$r}}</option>
                        @endforeach
                                
                        </select>
                </li>
                <li class="row allign-center">
                    <label for="">Jabatan Kerja</label>
                    <input type="text" id="jabatan" placeholder="Contoh : Pengelolaan Sumber Daya Manusia" value="{{$data_user->position}}" name="position">
                </li>
                <li class="row allign-center">
                    <label for="">Nama Instansi</label>
                    <input type="text" id="instansi" placeholder="Contoh : RSUD Siti Fatimah Prov. Sumatera Selatan" value="{{$data_user->institute}}" name="institute">
                </li>
                <li class="row allign-center">
                    <label for="">Alamat Instansi</label>
                    <textarea name="institute_addr" id="alamatDomisili" cols="30" rows="5"  placeholder="Contoh : Jl. Kol, H, Burlian, Kel. Sukabangun, Kec. Sukarami, Palembang. Sumatera Selatan. Indonesia ">{{$data_user->institute_addr}}</textarea>
                </li>
                <li class="row allign-center">
                    <label for="">Telepon Instansi</label>
                    <input type="text" id="telpInstansi" placeholder="Telepon instansi" value="{{$data_user->institute_phone}}" name="institute_phone">
                </li>
                <div class="row">
                    <button type="submit">Perbarui</button>
                </div>
            </ul>
        </form>
        <img src="../../assets/data-profil-background.png" alt="" id="water-mark">
    </main>
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
    <script src="../js/utility.js"></script>
</body>
</html>