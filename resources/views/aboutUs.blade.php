<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Import dari Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    @include('partials.navbar')
    {{-- @if (Auth::check()) --}}
        {{-- Header untuk pengguna yang sudah login --}}
        {{-- @include('partials.navbarlogin') --}}
    {{-- @else --}}
        {{-- Header untuk pengguna yang belum login --}}
        {{-- @include('partials.navbar') --}}
    {{-- @endif --}}

  <!-- Hero Title -->
  <div class="hero bg-white">
    <h1>About us</h1>
  </div>

<div class="image-wrapper">
    <img src="{{ asset('assets/img/fotopegawai.png') }}" alt="Tim Salon" class="tim-image">
    <div class="image-overlay"></div>
</div>

<div class="container section-hero">
  <div class="row align-items-center">
    <!-- KIRI -->
    <div class="col-md-6">
      <h2 class="hero-title mb-3">Tiga Dekade Pelayanan Kecantikan Terpercaya</h2>
      <p class="hero-text">
        Salon Asih berdiri sejak tahun 1991, berlokasi di Jln. Pulau Bungin No.113, Denpasar Selatan. Sejak awal, Salon Asih hadir dengan satu tujuan memberikan pelayanan kecantikan terbaik yang mengutamakan kenyamanan, profesionalitas, dan hasil yang memuaskan. Dengan pengalaman lebih dari tiga dekade, Salon Asih telah menjadi pilihan terpercaya bagi para wanita Bali dan sekitarnya yang ingin tampil cantik dan percaya diri. Kami terus berkembang mengikuti tren dan teknologi terkini demi menghadirkan perawatan yang aman, modern, dan berkualitas tinggi.
      </p>
    </div>

    <!-- KANAN -->
    <div class="col-md-6">
  <div class="hero-image-box w-100" style="background-image: url('{{ asset('assets/img/aboutous1.jpg') }}'); background-size: cover; background-position: top center; height: 400px; border-radius: 12px;">
  </div>
</div>

  </div>
</div>

<div class="container section-services">
  <h2 class="section-title">Beyond Ordinary Beauty Services</h2>

  <!-- Kartu 1 -->
  <div class="service-card-1">
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="{{ asset('assets/img/img1.png') }}" alt="Service Image 1">
      </div>
      <div class="col-md-6 service-content">
        <p>
          Lorem ipsum dolor sit amet consectetur. Blandit at maecenas dui sed amet sit enim vitae. Amet purus dictum urna sagittis dignissim. At fermentum iaculis ullamcorper orci.
        </p>
        <p>
          Pellentesque id tempor lacus aliquet tempus vitae nibh habitasse consectetur. Augue quis cras blandit habitant neque. Faucibus vestibulum in nisl ligula ultrices et vehicula.
        </p>
        <button class="service-button">Konsultasi</button>
      </div>
    </div>
  </div>

  <!-- Kartu 2 (gambar kanan) -->
  <div class="service-wrapper">
  <div class="service-card-right position-relative">
    <div class="service-content-right">
      <p> Lorem ipsum dolor sit amet consectetur. Blandit at maecenas dui sed amet sit enim vitae. Amet purus dictum urna sagittis dignissim. At fermentum iaculis ullamcorper orci.</p>
      <p>Pellentesque id tempor lacus aliquet tempus vitae nibh habitasse consectetur. Augue quis cras blandit habitant neque. Faucibus vestibulum in nisl ligula ultrices et vehicula.</p>
      <button class="service-button">Konsultasi</button>
    </div>
    <img src="{{ asset('assets/img/img2.png') }}" alt="Adat" class="image-inside-card-right">
  </div>
</div>


  <!-- Kartu 3 -->
  <div class="service-card">
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="{{ asset('assets/img/img3.png') }}" alt="Service Image 3">
      </div>
      <div class="col-md-6 service-content">
        <p>
          Lorem ipsum dolor sit amet consectetur. Blandit at maecenas dui sed amet sit enim vitae. Amet purus dictum urna sagittis dignissim. At fermentum iaculis ullamcorper orci.
        </p>
        <p>
          Pellentesque id tempor lacus aliquet tempus vitae nibh habitasse consectetur. Augue quis cras blandit habitant neque. Faucibus vestibulum in nisl ligula ultrices et vehicula.
        </p>
        <button class="service-button">Konsultasi</button>
      </div>
    </div>
  </div>

</div>
    @include('partials.footer')
</body>
</html>
