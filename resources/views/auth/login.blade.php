<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/Logo-only.png">
    <link rel="stylesheet" href="/css/utility.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>MILEA | Login</title>
</head>
<body>
    <main class="row">
        <section class="col center" id="left">
            <div class="group col">
                <img src="../../assets/login-img.png" alt="" id="desktop-img">
                <img src="../../assets/mobile-lp.png" alt="" id="mobile-img">
                {{-- <h1>MILEA</h1>
                <h2>Mitra Lewat Dunia Maya</h2> --}}
            </div>
        </section>
        <section class="col center" id="right">
            <form method="POST" action="{{ route('login') }}" class="col">
              @csrf
                <h1>Selamat Datang</h1>
                <h2>"Bermitra Berkembang Bersama"</h2>
                <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
        
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="group col">
                    <label for="email">Email :</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus>
                </div>
                <div class="group col">
                    <label for="passwords">Kata Sandi :</label>
                    <input type="password" required
                    oninvalid="this.setCustomValidity('Masukkan Kata Sandi')"
                    name="password" id="password">
                </div>
                <p>
                    Lupa kata sandi? 
                    <a href="">Klik Disini</a>
                </p>
                <button type="submit">
                    Masuk
                </button>
                <p style="text-align: center;">
                    Belum punya akun?
                    <a href="/register">Daftar Disini</a>
                </p>
            </form>
        </section>
    </main>
</body>
</html>