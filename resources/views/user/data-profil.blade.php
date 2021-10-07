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
    <link rel="stylesheet" href="/css/data-profil.css" />
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
    <title>MILEA | {{ $title }}</title>
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

    <div class="row" style="margin-top: 50px;">
      <div class="bodyLeft">
        <div class="card kiri shadow">
          <div class="card-body">
            <div class="row">
              <div class="rowFirstCardLeft">
              <img src="\user\ava\{{ $data_user->image }}" style="margin-left: 25px; width: 120px; height:120px; float: left; border-radius:50%;" alt="" />
              </div>
              <div class="rowFirstCardRight">
                <h3 class="name">{{$data_user->fullname }}</h3>
              <h6 class="nip">{{$data_user->position }}</h6>
              <h6 class="status">{{$data_user->institute }}</h6>
              </div>
          </div>

            <a href="/data-profil">
            <div class="row" style="margin-top: 50px; margin-left: 10px; color: #198754;">
                <img src="img/icon.png" width="20" height="20" alt="">
                <h6 class="detailProfil" style="margin-left: 15px;">Detail Profil</h6>
            </div>
            </a>

            <hr>
            <a href="/lengkapi-profil">
            <div class="row">
                <img src="img/filemanager.png" width="28" height="20" style="margin-left: 25px;" alt="">
                <h6 class="detailProfil" style="margin-left: 8px; margin-top: 1px;">Perbarui Profil</h6>
            </div>
            </a>
            
            <hr>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
            <a href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
            <div class="row">
                <img src="img/log_out.png" width="30" height="30" style="margin-left: 15px;" alt="">
                <h6 class="detailProfil" style="margin-top: 5px; margin-left: 15px;">Keluar</h6>
            </div>
          </div>
          </a>
        </form>
           
        </div>
      </div>

      <div class="bodyRight">
        <div class="card kanan shadow">
          <div class="card-body">
            <h5 class="card-title" style="margin-left: 20px">DATA DIRI</h5>
            <hr />
            <div class="form">
              <div class="form-group row">
                <label for="Nama" class="col-sm-6 col-form-label">Nama</label>
                <div class="col-sm-6">
                  <input
                    type="text"
                    readonly
                    class="form-control-plaintext"
                    id="Nama"
                    value="{{ $data_user->fullname }}"
                  />
                </div>
                <?php
                if($data_user->nip === ''){?>
                    <label for="NIP" class="col-sm-6 col-form-label">NIP</label>
                    <div class="col-sm-6">
                      <input
                        type="text"
                        readonly
                        class="form-control-plaintext"
                        id="NIP"
                        value="-"  
                      />
                    </div>
                <?php
                }else{?>
                  <label for="NIP" class="col-sm-6 col-form-label">NIP</label>
                  <div class="col-sm-6">
                    <input
                      type="text"
                      readonly
                      class="form-control-plaintext"
                      id="NIP"
                      value="{{ $data_user->nip }}"  
                    />
                  </div><?php
                }
                
                ?>
                
                <?php
                if($data_user->nik === ''){?>
                    <label for="KTP" class="col-sm-6 col-form-label"
                    >Nomor KTP</label
                    >
                    <div class="col-sm-6">
                    <input
                      type="text"
                      readonly
                      class="form-control-plaintext"
                      id="KTP"
                      value="-"  
                    />
                    </div>
                <?php
                }else{?>
                  <label for="KTP" class="col-sm-6 col-form-label"
                  >Nomor KTP</label
                  >
                  <div class="col-sm-6">
                  <input
                    type="text"
                    readonly
                    class="form-control-plaintext"
                    id="KTP"
                    value="{{ $data_user->nik }}"  
                  />
                  </div><?php
                }
                
                ?>

                <label for="Status" class="col-sm-6 col-form-label"
                  >Status</label
                >
                <div class="col-sm-6">
                  <input
                    type="text"
                    readonly
                    class="form-control-plaintext"
                    id="Status"
                    value="{{ $data_user->status }}"  
                  />
                </div>
                  <label for="JenisKelamin" class="col-sm-6 col-form-label"
                    >Jenis Kelamin</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      readonly
                      class="form-control-plaintext"
                      id="JenisKelamin"
                      value="{{ $data_user->gender }}"  
                    />
                  </div>
                  <?php
                if($data_user->birth_place === ''){?>
                    <label for="TempatLahir" class="col-sm-6 col-form-label"
                    >Tempat Lahir</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      class="form-control-plaintext"
                      id="TempatLahir"
                      value="-"  
                    />
                  </div>
                    
                <?php
                }else{?>
                  <label for="TempatLahir" class="col-sm-6 col-form-label"
                  >Tempat Lahir</label
                >
                <div class="col-sm-6">
                  <input
                    type="text"
                    class="form-control-plaintext"
                    id="TempatLahir"
                    value="{{ $data_user->birth_place }}"  
                  />
                </div><?php
                }
                
                ?>
                  
                  <label for="TTL" class="col-sm-6 col-form-label"
                    >Tanggal Lahir</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      class="form-control-plaintext"
                      id="TanggalLahir"
                      value="{{ tgl_indo($data_user->birth_date) }}" 
                    />
                  </div>
                <?php
                  if($data_user->address === ''){?>
                    <label for="alamatDomisili" class="col-sm-6 col-form-label"
                    >Alamat Domisili</label
                  >
                   <div class="col-sm-6">
                    <textarea
                      type="text"
                      readonly
                      class="form-control-plaintext"
                      id="alamatDomisili"
                      style="height: 110px; text-align: justify; width: 90%;"
                    >-</textarea>
                  </div>
                    
                <?php
                }else{?>
                  <label for="alamatDomisili" class="col-sm-6 col-form-label"
                  >Alamat Domisili</label
                >
                 <div class="col-sm-6">
                  <textarea
                    type="text"
                    readonly
                    class="form-control-plaintext"
                    id="alamatDomisili"
                    style="height: 110px; text-align: justify; width: 90%;"
                  >{{ $data_user->address }} </textarea>
                </div><?php
                }
                
                ?>
                  
                  <label for="Agama" class="col-sm-6 col-form-label"
                    >Agama</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      readonly
                      class="form-control-plaintext"
                      id="Agama"
                      value="{{ $data_user->religion}}" 
                    />
                  </div>

                  <label for="Email" class="col-sm-6 col-form-label"
                    >Email</label
                  >
                  <div class="col-sm-6">
                    <input
                      type="text"
                      readonly
                      class="form-control-plaintext"
                      id="Email"
                      value="{{ $data_user->email }}" 
                    />
                  </div>

                  <?php
                  if($data_user->phone === ''){?>
                   <label for="hp" class="col-sm-6 col-form-label"
                   >Nomor HP</label
                 >
                 <div class="col-sm-6">
                   <input
                     type="text"
                     readonly
                     class="form-control-plaintext"
                     id="hp"
                     value="-" 
                   />
                 </div>
                    
                <?php
                }else{?>
                  <label for="hp" class="col-sm-6 col-form-label"
                  >Nomor HP</label
                >
                <div class="col-sm-6">
                  <input
                    type="text"
                    readonly
                    class="form-control-plaintext"
                    id="hp"
                    value="{{ $data_user->phone }}" 
                  />
                </div><?php
                }
                
                ?>
                  <?php
                  if($data_user->edu === ''){?>
                   <label for="pendidikan" class="col-sm-6 col-form-label"
                   >Pendidikan Terakhir</label
                 >
                 <div class="col-sm-6">
                   <input
                     type="text"
                     readonly
                     class="form-control-plaintext"
                     id="pendidikan"
                     value="-" 
                   />
                 </div>
                    
                <?php
                }else{?>
                  <label for="pendidikan" class="col-sm-6 col-form-label"
                  >Pendidikan Terakhir</label
                >
                <div class="col-sm-6">
                  <input
                    type="text"
                    readonly
                    class="form-control-plaintext"
                    id="pendidikan"
                    value="{{ $data_user->edu }}" 
                  />
                </div><?php
              }
              
              ?>

              
              <?php
              if($data_user->level === ''){?>
               <label for="rank" class="col-sm-6 col-form-label"
               >Pangkat/Golongan</label
             >
             <div class="col-sm-6">
               <input
                 type="text"
                 readonly
                 class="form-control-plaintext"
                 id="rank"
                 value="-" 
               />
             </div>
                
            <?php
            }else{?>
              <label for="rank" class="col-sm-6 col-form-label"
              >Pangkat/Golongan</label
            >
            <div class="col-sm-6">
              <input
                type="text"
                readonly
                class="form-control-plaintext"
                id="rank"
                value="{{ $data_user->level }}" 
              />
            </div><?php
          }
          
          ?>
          <?php
          if($data_user->position === ''){?>
           <label for="jabatan" class="col-sm-6 col-form-label"
           >Jabatan / Pekerjaan</label
         >
         <div class="col-sm-6">
           <input
             type="text"
             readonly
             class="form-control-plaintext"
             id="jabatan"
             value="-" 
           />
         </div>
            
        <?php
        }else{?>
          <label for="jabatan" class="col-sm-6 col-form-label"
          >Jabatan / Pekerjaan</label
        >
        <div class="col-sm-6">
          <input
            type="text"
            readonly
            class="form-control-plaintext"
            id="jabatan"
            value="{{ $data_user->position }}" 
          />
        </div><?php
      }
      
      ?>
      <?php
      if($data_user->institute === ''){?>
       <label for="instansi" class="col-sm-6 col-form-label"
       >Nama Instansi</label
     >
     <div class="col-sm-6">
       <input
         type="text"
         readonly
         class="form-control-plaintext"
         id="instansi"
         value="-"
       />
     </div>
        
    <?php
    }else{?>
      <label for="instansi" class="col-sm-6 col-form-label"
      >Nama Instansi</label
    >
    <div class="col-sm-6">
      <input
        type="text"
        readonly
        class="form-control-plaintext"
        id="instansi"
        value="{{ $data_user->institute }}"
      />
    </div><?php
  }
  
  ?>
  <?php
  if($data_user->institute_addr=== ''){?>
   <label for="alamatInstansi" class="col-sm-6 col-form-label"
   >Alamat Instansi</label
 >
 <div class="col-sm-6">
   <textarea
     type="text"
     readonly
     class="form-control-plaintext"
     id="alamatDomisili"
     style="height: 110px; text-align: justify; width: 90%;"
   >-</textarea>
 </div>
    
<?php
}else{?>
  <label for="alamatInstansi" class="col-sm-6 col-form-label"
  >Alamat Instansi</label
>
<div class="col-sm-6">
  <textarea
    type="text"
    readonly
    class="form-control-plaintext"
    id="alamatDomisili"
    style="height: 110px; text-align: justify; width: 90%;"
  >{{ $data_user->institute_addr }}</textarea>
</div><?php
}

?>
 <?php
 if($data_user->institute_phone=== ''){?>
  <label for="telpInstansi" class="col-sm-6 col-form-label"
  >Telepon Instansi</label
>
<div class="col-sm-6">
  <input
    type="text"
    readonly
    class="form-control-plaintext"
    id="telpInstansi"
    value="-"
  />
</div>
   
<?php
}else{?>
 <label for="telpInstansi" class="col-sm-6 col-form-label"
 >Telepon Instansi</label
>
<div class="col-sm-6">
 <input
   type="text"
   readonly
   class="form-control-plaintext"
   id="telpInstansi"
   value="{{ $data_user->institute_phone }}"
 />
</div><?php
}

?>              
                  
                  
                  
                  
                  
                  </div>
                </div>
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
          <a href="https://api.whatsapp.com/send?phone=08117117929" target="output"><img src="img/Call.png" width="30" alt="" /></a>
        <a href="mailto:sdm.rsudsumsel@gmail.com" target="output"><img src="img/Gmail.png" width="30" alt="" /></a>
        <a href="https://www.facebook.com/RSUDSitiFatimah" target="output"><img src="img/Facebook.png" width="30" alt="" /></a>
        <a href="https://www.youtube.com/c/RSUDSitiFatimahProvSumsel" target="output"><img src="img/Youtube.png" width="30" alt="" /></a>
        <a href="https://www.instagram.com/rsudsitifatimah/" target="output"><img src="img/Instagram.png" width="30" alt="" /></a>
      </div>
    </div>
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
