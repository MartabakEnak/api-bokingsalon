<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salon Asih</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <navbar>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom px-4">
            <div class="container">

                <!-- Kiri: Brand -->
                {{-- <a class="navbar-brand" href="#"><i class="bi bi-instagram"></i> <i class="bi bi-whatsapp"></i></a> --}}
                <span class="d-flex gap-2">
                    <a href="https://www.instagram.com/" target="_blank">
                        <i class="bi bi-instagram text-white"></i>
                    </a>
                    <a href="https://wa.me/6285739589921?text=Terimakasih%20sudah%20menghubungi%20kami!%0ASilahkan%20bertanya%20mengenai%20reservasi%20booking%20atau%20berkonsultasi%20dengan%20admin%20kami!"
                        class="text-reset text-decoration-none" target="_blank">
                        <i class="bi bi-whatsapp text-white"></i>
                    </a>
                </span>

                <!-- Toggle button (untuk tampilan mobile) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Tengah: Menu -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('welcome') ? 'active' : '' }}" href="welcome">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('service') ? 'active' : '' }}" href="service">Services</a>
                        </li>
                        <li class="nav-item">
                            {{-- <li class="nav-item">
    <a class="nav-link {{ Request::is('riwayat') ? 'active' : '' }}" href="{{ url('riwayat') }}">Riwayat</a>
</li>

            </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('contacUs') ? 'active' : '' }}" href="contacUs">Contact
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('aboutUs') ? 'active' : '' }}" href="aboutUs">About Us</a>
                        </li>
                    </ul>
                </div>


                <!-- Kanan: Login/Register -->
                <div class="auth-links d-none d-lg-flex">
                    <a href="{{ route('login') }}" class="ms-3 text-white"><strong>Login</strong></a>
                    <a href="{{ route('register') }}" class="ms-3 text-white">Register</a>

                </div>

            </div>
        </nav>
    </navbar>
</body>
