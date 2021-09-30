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
    <link rel="stylesheet" href="/css/lengkapi-profil.css" />
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
  </head>
  <body>
    
   <nav>
      <div id="logo">
        <img src="img/Logo-only.png" alt="" height="68px" width="68px" />
        <h1 class="new" style="margin-top: 13px">MILEA</h1>
      </div>
      <ul id="pages">
        <li>
          <a href="/beranda">Beranda</a>
        </li>
        <li>
          <a href="/daftar-kegiatan">Daftar Kegiatan</a>
        </li>
      </ul>
      <img
        src="img/navbar-toggle-black.png"
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


    <div class="row"  style="margin-top: 50px;">
      <div class="bodyLeft">
        <div class="card kiri">
          <div class="card-body">
              <div class="row">
                <div class="rowFirstCardLeft">
                <img style="margin-left: 25px;" src="img/image.jpg" width="100" alt="" />
                </div>
                <div class="rowFirstCardRight">
                  <h3 class="name">data-user->name</h3>
                <h6 class="nip">data-user->position</h6>
                <h6 class="status">data-user->institute</h6>
                </div>
            </div>

            <a href="/data-profil">
            <div class="row" style="margin-top: 50px; margin-left: 10px;">
                <img src="img/icon.png" width="20" height="20" alt="">
                <h6 class="detailProfil" style="margin-left: 15px;">Detail Profil</h6>
            </div>
            </a>

            <hr>
            <a href="/lengkapi-profil">
            <div class="row" style=" color: #198754;">
                <img src="img/filemanager.png" width="28" height="20" style="margin-left: 25px;" alt="">
                <h6 class="detailProfil" style="margin-left: 8px; margin-top: 1px;">Perbarui Profil</h6>
            </div>
            </a>
            
            <hr>
            <a href="#">
            <div class="row">
                <img src="img/log_out.png" width="30" height="30" style="margin-left: 15px;" alt="">
                <h6 class="detailProfil" style="margin-top: 5px; margin-left: 15px;">Keluar</h6>
            </div>
          </div>
          </a>
           
        </div>
      </div>

      <div class="bodyRight">
        <div class="card kanan">
          <div class="card-body">
            <h5 class="card-title" style="margin-left: 20px">PERBARUI PROFIL</h5>
            <hr />
            <div class="form">
              <form action="/update-data-diri/{{ $data_user->id }}" method="post">
                @csrf
              <div class="form-group row">
                 <label for="pict" class="col-sm-6 col-form-label">Foto Profil</label>
                <div class="col-sm-6">
                  <input
                    type="file"
                    class="form-control"
                    style="height: 45px"
                    id="pict"
                    value=""
                    name="image"
                    placeholder="Pilih Berkas..."
                  />
                </div>
                <label for="Nama" class="col-sm-6 col-form-label">Nama</label>
                <div class="col-sm-6">
                  <input
                    type="text"
                    class="form-control"
                    id="Nama"
                    name="fullname"
                    value="{{ $data_user->fullname }}"
                    placeholder="Nama Lengkap"
                    required
                  />
                </div>
                <label for="NIP" class="col-sm-6 col-form-label">NIP</label>
                <div class="col-sm-6">
                  <input
                    type="text"
                    class="form-control"
                    id="NIP"
                    name="nip"
                    value="{{ $data_user->nip }}"
                    placeholder="NIP/Jika tidak ada isi '-'"
                    required
                  />
                </div>
                <label for="KTP" class="col-sm-6 col-form-label"
                  >Nomor KTP</label
                >
                <div class="col-sm-6">
                  <input
                    type="text"
                    class="form-control"
                    id="KTP"
                    name="nik"
                    value="{{ $data_user->nik }}"
                    placeholder="NIK"
                    required
                  />
                </div>
                <label for="Status" class="col-sm-6 col-form-label"
                  >Status</label
                >
                <div class="col-sm-6">
                  <select class="form-control" class="form-control"
                  id="Status" name="status">
                          <option value="CPNS">CPNS</option>
                          <option value="PNS">PNS</option>
                          <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
                  <label for="gender" class="col-sm-6 col-form-label"
                    >Jenis Kelamin</label>
                  <div class="col-sm-6">
                    <select class="form-control" class="form-control"
                  id="gender" name="gender">
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                  </select>
                  </div>
                  <label for="TempatLahir" class="col-sm-6 col-form-label"
                    >Tempat Lahir</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      class="form-control"
                      id="TempatLahir"
                      name="birth_place"
                      placeholder="Tempat Lahir"
                      required
                    />
                  </div>
                  <label for="TTL" class="col-sm-6 col-form-label"
                    >Tanggal Lahir</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="date"
                      class="form-control"
                      id="TanggalLahir"
                      name="birth_date"
                      required
                    />
                  </div>
                  <label for="alamatDomisili" class="col-sm-6 col-form-label"
                    >Alamat Domisili</label
                  >
                   <div class="col-sm-6">
                    <textarea
                      type="text"
                      class="form-control"
                      id="alamatDomisili"
                      name="address"
                      placeholder="Alamat Domisili Lengkap"
                      required
                      style="height: 100px; text-align: justify; width: 100%;"
                    ></textarea>
                  </div>
                  <label for="Agama" class="col-sm-6 col-form-label"
                    >Agama</label
                  >
                  <div class="col-sm-6">
                    <select class="form-control" class="form-control"
                  id="Agama" name="religion">
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Buddha">Buddha</option>
                          <option value="Konghucu">Konghucu</option>
                  </select>
                  </div>
                  <label for="Email" class="col-sm-6 col-form-label"
                    >Email</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="email"
                      class="form-control"
                      id="Email"
                      name="email"
                      placeholder="email@email.com"
                      required
                    />
                  </div>
                  <label for="hp" class="col-sm-6 col-form-label"
                    >Nomor HP</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      class="form-control"
                      id="hp"
                      name="phone"
                      placeholder="Nomor WA yang bisa dihubungi"
                      required
                    />
                  </div>
                  <label for="pendidikan" class="col-sm-6 col-form-label"
                    >Pendidikan Terakhir</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      class="form-control"
                      id="pendidikan"
                      value=""
                      placeholder="Contoh : S1 - Keperawatan/ SMA-IPA"
                      name="edu"
                    />
                  </div>
                  <label for="rank" class="col-sm-6 col-form-label"
                    >Golongan/Pangkat</label
                  >
                  <div class="col-sm-6">
                    <select class="form-control" class="form-control"
                  id="level" name="level">
                  @foreach($rank_level as $r)
                  <option value="{{$r}}">{{$r}}</option>
              @endforeach
                          
                  </select>
                    
                  </div>
                  <label for="jabatan" class="col-sm-6 col-form-label"
                    >Jabatan/Pekerjaan</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      class="form-control"
                      id="jabatan"
                      placeholder="Contoh : Pengelolaan Sumber Daya Manusia"
                      value=""
                      name="position"
                    />
                  </div>
                  <label for="instansi" class="col-sm-6 col-form-label"
                    >Nama Instansi</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      class="form-control"
                      id="instansi"
                      placeholder="Contoh : RSUD Siti Fatimah Prov. Sumatera Selatan"
                      value=""
                      name="institue"
                    />
                  </div>
                  <label for="alamatInstansi" class="col-sm-6 col-form-label"
                    >Alamat Instansi</label
                  >
                  <div class="col-sm-6">
                    <textarea
                      type="text"
                      class="form-control"
                      id="alamatDomisili"
                      style="height: 100px; text-align: justify; width: 100%;"
                      placeholder="Contoh : Jl. Kol, H, Burlian, Kel. Sukabangun, Kec. Sukarami, Palembang. Sumatera Selatan. Indonesia "
                      name="institue_addr"
                    ></textarea>
                  </div>
                  <label for="telpInstansi" class="col-sm-6 col-form-label"
                    >Telepon Instansi</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      class="form-control"
                      id="telpInstansi"
                      value=""
                      placeholder="Telepon instansi"
                      name="institue_phone"
                    />
                  </div>
                  </div>
                </div>
                <button type="submit" class="btn save btn-success">Simpan</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
     <div class="copyright">
      <div class="text-center text-dark p-3">
        <h6>All Right Reserved © IT Team RSUD Siti Fatimah Kampus Merdeka 2021</h6>
          <a>Temukan kami di : </a>
          <a href=""><img src="img/Call.png" width="30" alt="" /></a>
          <a href=""><img src="img/Gmail.png" width="30" alt="" /></a>
          <a href=""><img src="img/Facebook.png" width="30" alt="" /></a>
          <a href=""><img src="img/Youtube.png" width="30" alt="" /></a>
          <a href=""><img src="img/Instagram.png" width="30" alt="" /></a>
      </div>
    </div>
      <script src="/js/utility.js"></script>
      @include('sweetalert::alert')

  </body>
</html>
