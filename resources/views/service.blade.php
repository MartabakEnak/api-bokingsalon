<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service</title>
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

      <!-- Hero Title -->
  <div class="hero bg-white">
    <h1>service</h1>
  </div>

    <!-- Hero Image (Full Width) -->
    <div class="hero-image-wrapper mx-0 px-0">
        <img src="{{ asset('assets/img/hero.png') }}" alt="hero-image" class="w-100 d-block">
    </div>

    <!-- Hero Section -->
    <section class="hero-section text-center py-5" style="background-color: white; color: #7B0000;">
        <div class="container">
            <h1 class="hero-title">Services & Prices</h1>
            <p class="hero-subtitle">Nikmati layanan perawatan terbaik dari Salon Asih, tempat di mana kecantikan dan kenyamanan menyatu.<br>
            Yuk, booking sekarang dan rasakan transformasinya!</p>
        </div>
    </section>

    <!-- Service & Prices List Section -->
    <section class="service-list-section py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Service 1 -->
                <div class="col-md-6">
                    <div>
                        <span class="fw-bold">01.</span>
                        <h4 class="mt-2 mb-3 fw-bold">SULAM</h4>
                        <ul class="list-unstyled">
                            <li>Daily make up <span class="float-end text-muted">from $35</span></li>
                            <li>Night make up <span class="float-end text-muted">from $35</span></li>
                            <li>Bridal make up <span class="float-end text-muted">from $35</span></li>
                            <li>Ocassion make up <span class="float-end text-muted">from $35</span></li>
                            <li>Television make up <span class="float-end text-muted">from $35</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Service 2 -->
                <div class="col-md-6">
                    <div>
                        <span class="fw-bold">02.</span>
                        <h4 class="mt-2 mb-3 fw-bold">HAIR STYLING</h4>
                        <ul class="list-unstyled">
                            <li>Daily make up <span class="float-end text-muted">from $35</span></li>
                            <li>Night make up <span class="float-end text-muted">from $35</span></li>
                            <li>Bridal make up <span class="float-end text-muted">from $35</span></li>
                            <li>Ocassion make up <span class="float-end text-muted">from $35</span></li>
                            <li>Television make up <span class="float-end text-muted">from $35</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Service 3 -->
                <div class="col-md-6">
                    <div>
                        <span class="fw-bold">03.</span>
                        <h4 class="mt-2 mb-3 fw-bold">NAIL CARE</h4>
                        <ul class="list-unstyled">
                            <li>Daily make up <span class="float-end text-muted">from $35</span></li>
                            <li>Night make up <span class="float-end text-muted">from $35</span></li>
                            <li>Bridal make up <span class="float-end text-muted">from $35</span></li>
                            <li>Ocassion make up <span class="float-end text-muted">from $35</span></li>
                            <li>Television make up <span class="float-end text-muted">from $35</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Service 4 -->
                <div class="col-md-6">
                    <div>
                        <span class="fw-bold">04.</span>
                        <h4 class="mt-2 mb-3 fw-bold">RIAS</h4>
                        <ul class="list-unstyled">
                            <li>Daily make up <span class="float-end text-muted">from $35</span></li>
                            <li>Night make up <span class="float-end text-muted">from $35</span></li>
                            <li>Bridal make up <span class="float-end text-muted">from $35</span></li>
                            <li>Ocassion make up <span class="float-end text-muted">from $35</span></li>
                            <li>Television make up <span class="float-end text-muted">from $35</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Service 5 -->
                <div class="col-md-6">
                    <div>
                        <span class="fw-bold">05.</span>
                        <h4 class="mt-2 mb-3 fw-bold">MASSAGE</h4>
                        <ul class="list-unstyled">
                            <li>Daily make up <span class="float-end text-muted">from $35</span></li>
                            <li>Night make up <span class="float-end text-muted">from $35</span></li>
                            <li>Bridal make up <span class="float-end text-muted">from $35</span></li>
                            <li>Ocassion make up <span class="float-end text-muted">from $35</span></li>
                            <li>Television make up <span class="float-end text-muted">from $35</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Service 6 -->
                {{-- <div class="col-md-6">
                    <div>
                        <span class="fw-bold">06.</span>
                        <h4 class="mt-2 mb-3 fw-bold">SPA</h4>
                        <ul class="list-unstyled">
                            <li>Body scrub <span class="float-end text-muted">from $40</span></li>
                            <li>Body mask <span class="float-end text-muted">from $45</span></li>
                            <li>Facial <span class="float-end text-muted">from $30</span></li>
                            <li>Reflexology <span class="float-end text-muted">from $25</span></li>
                            <li>Totok wajah <span class="float-end text-muted">from $20</span></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
