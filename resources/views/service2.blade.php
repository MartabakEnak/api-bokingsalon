<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Salon Asih</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo_login.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Kalau pakai Vite --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Import dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    @include('partials.navbarlogin')

    <!-- Hero Title -->
    <div class="hero bg-white">
        <h1>Service</h1>
    </div>

    <!-- Hero Image (Full Width) -->
    <div class="hero-image-wrapper mx-0 px-0">
        <img src="{{ asset('assets/img/herocontacus.jpg') }}" alt="hero-image" class="w-100 d-block">
    </div>

    <!-- Hero Section -->
    <section class="hero-section text-center py-5" style="background-color: white; color: #7B0000;">
        <div class="container">
            <h1 class="hero-title">Services & Prices</h1>
            <p class="hero-subtitle">Nikmati layanan perawatan terbaik dari Salon Asih, tempat di mana kecantikan dan
                kenyamanan menyatu.<br>
                Yuk, booking sekarang dan rasakan transformasinya!</p>
        </div>
    </section>

    <!-- Service & Prices List Section -->
    <section class="service-list-section py-5">
        <div class="container">
            <!-- Service 1: SULAM (gambar kiri, konten kanan) -->
            <div class="row mb-5 align-items-center">
                <div class="col-md-5 text-center">
                    <img src="{{ asset('assets/img/sulam.png') }}" alt="Sulam" class="rounded"
                        style="width:340px; height:auto; object-fit:cover;">
                </div>
                <div class="col-md-7">
                    <h4 class="mb-3 fw-bold" style="color:#7B0000;">SULAM</h4>
                    <ul class="list-unstyled">
                        <li>Daily make up <span class="float-end text-muted">from 100.000</span></li>
                        <li>Night make up <span class="float-end text-muted">from 100.000</span></li>
                        <li>Bridal make up <span class="float-end text-muted">from 100.000</span></li>
                        <li>Ocassion make up <span class="float-end text-muted">from 100.000</span></li>
                        <li>Television make up <span class="float-end text-muted">from 100.000</span></li>
                    </ul>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Booking</a>
                    <a class="fw-bold" style="color:#7B0000;">/</a>
                    <a href="contacUs" class="fw-bold" style="color:#7B0000;">konsultasi</a>
                </div>
            </div>
            <!-- Service 2: HAIR STYLING (konten kiri, gambar kanan) -->
            <div class="row mb-5 align-items-center flex-row-reverse">
                <div class="col-md-5 text-center">
                    <img src="{{ asset('assets/img/hairstyling.png') }}" alt="Hair Styling" class="rounded"
                        style="width:340px; height:auto; object-fit:cover;">
                </div>
                <div class="col-md-7">
                    <h4 class="mb-1 fw-bold" style="color:#7B0000;">Hair styling</h4>
                    <ul class="list-unstyled">
                        <li>Simple haircut <span class="float-end text-muted">from Rp. 100.000</span></li>
                        <li>Hair Styling <span class="float-end text-muted">from Rp. 100.000</span></li>
                        <li>Full hair color <span class="float-end text-muted">from Rp. 100.000</span></li>
                        <li>Protein treatment <span class="float-end text-muted">from Rp. 100.000</span></li>
                        <li>Hair mask <span class="float-end text-muted">from Rp. 100.000</span></li>
                    </ul>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Booking</a>
                    <a class="fw-bold" style="color:#7B0000;">/</a>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Konsultasi</a>
                </div>
            </div>
            <!-- Service 3: NAIL CARE (gambar kiri, konten kanan) -->
            <div class="row mb-5 align-items-center">
                <div class="col-md-5 text-center">
                    <img src="{{ asset('assets/img/nail.png') }}" alt="Nail Care" class="rounded"
                        style="width:340px; height:auto; object-fit:cover;">
                </div>
                <div class="col-md-7">
                    <h4 class="mb-3 fw-bold" style="color:#7B0000;">NAIL CARE</h4>
                    <ul class="list-unstyled">
                        <li>Manicure <span class="float-end text-muted">from Rp. 80.000</span></li>
                        <li>Pedicure <span class="float-end text-muted">from Rp. 90.000</span></li>
                        <li>Nail Art <span class="float-end text-muted">from Rp. 120.000</span></li>
                        <li>Gel Polish <span class="float-end text-muted">from Rp. 100.000</span></li>
                        <li>Nail Spa <span class="float-end text-muted">from Rp. 110.000</span></li>
                    </ul>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Booking</a>
                    <a class="fw-bold" style="color:#7B0000;">/</a>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Konsultasi</a>
                </div>
            </div>
            <!-- Service 4: RIAS (konten kiri, gambar kanan) -->
            <div class="row mb-5 align-items-center flex-row-reverse">
                <div class="col-md-5 text-center">
                    <img src="{{ asset('assets/img/rias.png') }}" alt="Rias" class="rounded"
                        style="width:340px; height:auto; object-fit:cover;">
                </div>
                <div class="col-md-7">
                    <h4 class="mb-3 fw-bold" style="color:#7B0000;">RIAS</h4>
                    <ul class="list-unstyled">
                        <li>Rias Wisuda <span class="float-end text-muted">from Rp. 200.000</span></li>
                        <li>Rias Pesta <span class="float-end text-muted">from Rp. 250.000</span></li>
                        <li>Rias Pengantin <span class="float-end text-muted">from Rp. 500.000</span></li>
                        <li>Rias Foto <span class="float-end text-muted">from Rp. 300.000</span></li>
                        <li>Rias Keluarga <span class="float-end text-muted">from Rp. 150.000</span></li>
                    </ul>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Booking</a>
                    <a class="fw-bold" style="color:#7B0000;">/</a>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Konsultasi</a>
                </div>
            </div>
            <!-- Service 5: MASSAGE (gambar kiri, konten kanan) -->
            <div class="row mb-5 align-items-center">
                <div class="col-md-5 text-center">
                    <img src="{{ asset('assets/img/massage.jpg') }}" alt="Massage" class="rounded"
                        style="width:340px; height:auto; object-fit:cover;">
                </div>
                <div class="col-md-7">
                    <h4 class="mb-3 fw-bold" style="color:#7B0000;">MASSAGE</h4>
                    <ul class="list-unstyled">
                        <li>Full Body Massage <span class="float-end text-muted">from Rp. 150.000</span></li>
                        <li>Reflexology <span class="float-end text-muted">from Rp. 100.000</span></li>
                        <li>Back Massage <span class="float-end text-muted">from Rp. 90.000</span></li>
                        <li>Head Massage <span class="float-end text-muted">from Rp. 80.000</span></li>
                        <li>Totok Wajah <span class="float-end text-muted">from Rp. 70.000</span></li>
                    </ul>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Booking</a>
                    <a class="fw-bold" style="color:#7B0000;">/</a>
                    <a href="{{ route('pemesanan.create') }}" class="fw-bold" style="color:#7B0000;">Konsultasi</a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>

</html>
