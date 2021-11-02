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
    <title>MILEA | Registrasi</title>
</head>
<body>
    <main class="row">
        <section class="col center" id="left">
            <div class="group col">
                <img src="../../assets/desktop-lp.png" alt="" id="desktop-img">
                <img src="../../assets/mobile-lp.png" alt="" id="mobile-img">
                <h1>MILEA</h1>
                <h2>Mitra Lewat Dunia Maya</h2>
            </div>
        </section>
        <section class="col center" id="right">
            <form method="POST" action="{{ route('register') }}" class="col">
                @csrf
                <h1>Selamat Datang</h1>
                <h2>"Bermitra Berkembang Bersama"</h2>
                <div class="group col">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" :value="old('name')" required autofocus>
                </div>
                <div class="group col">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required>
                </div>
                <div class="group col">
                    <label for="passwords">Kata Sandi</label>
                    <input type="password" required name="password" id="password">
                </div>
                <div class="group col">
                    <label for="email">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation"
                    type="password"
                    name="password_confirmation" required>
                </div>
                <button type="submit">
                    Daftar
                </button>
                <p style="text-align: center;">
                    Sudah Punya Akun?
                    <a href="{{ route('login') }}">Masuk Disini</a>
                </p>
            </form>
        </section>
    </main>
</body>
</html>