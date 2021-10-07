<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="bootstrap-5.1.1-dist\js\bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/signup.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
      integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Sign Up</title>
  </head>
  <body>
    <div class="group">
      <div class="kiri">
        <img
          class="background-left"
          src="img/bg-login.png"
          alt="Snow"
          style="width: 100%"
        />
        <div class="top-left">
          <h1 class="title-milea">MILEA</h1>
          <h2 class="title-desc" style="font-size: 10">
            Mitra Lewat Dunia Maya
          </h2>
        </div>
        <div class="bottom-left">
          <img src="img/vect-login-1.png" alt="" />
        </div>
      </div>
         <div class="kanan">
            <div class="title-right">Selamat Datang</div>
            <div class="sub-title-right">Ayo Berkembang Bersama</div>
            <br>
            <div class="container form-signup">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label for="inputName">Nama</label>
                <input
                id="name" name="name" :value="old('name')" required autofocus
                    style="width: 350px; 
                    outline: 0;
                    border-width: 0 0 2px;
                    background-color: transparent;
                    border-color: white;
                    color: white;" 
                    type="text"
                    >
                <label for="inputEmail">Email</label>
                <input
                id="email" type="email" name="email" :value="old('email')" required
                    style="width: 350px; 
                    outline: 0;
                    border-width: 0 0 2px;
                    background-color: transparent;
                    border-color: white;
                    color: white;" 
                    >
                <label for="inputPassword">Kata Sandi</label>
                <input 
                    style="width: 350px; 
                    outline: 0;
                    border-width: 0 0 2px;
                    background-color: transparent;
                    border-color: white;
                    color: white;" 
                    type="password" required
                    name="password" id="password">
                <label for="inputPassword">Konfirmasi Kata Sandi</label>
                <input 
                id="password_confirmation"
                                type="password"
                                name="password_confirmation" required
                    style="width: 350px; 
                    outline: 0;
                    border-width: 0 0 2px;
                    background-color: transparent;
                    border-color: white;
                    color: white;" 
        >
                <button type="sub" class="btn btn-primary">Daftar</button>
                <small 
                    id="emailHelp" 
                    class="form-text"
                    style="color: white;
                    text-align: center;
                    font-size: 12px;">Sudah Punya Akun? <a href="{{ route('login') }}"><b style="font-weight: 500;">Masuk</b></a>
                </small>
            </form>
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
    <script src="login.js"></script>
  </body>
</html>
