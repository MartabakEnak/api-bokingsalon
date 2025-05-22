<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    </head>
    <body>
<navbar>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom px-4">
  <div class="container">

    <!-- Kiri: Brand -->
    <a class="navbar-brand" href="#"><i class="bi bi-instagram"></i> <i class="bi bi-whatsapp"></i></a>

    <!-- Toggle button (untuk tampilan mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Tengah: Menu -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="welcome">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="service">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="riwayat">Riwayat</a></li>
        <li class="nav-item"><a class="nav-link" href="contacUs">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="aboutUs">About Us</a></li>
      </ul>
    </div>

    <!-- Kanan: Login/Register -->
    <div class="auth-links d-none d-lg-flex">
      <a href="#" class="ms-3 text-white"><strong>Login</strong></a>
      <a href="#" class="ms-3 text-white">Register</a>
    </div>

  </div>
</nav>
</navbar>
  </body>
