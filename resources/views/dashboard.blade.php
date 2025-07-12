    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
        @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Kalau pakai Vite --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Import dari Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    </head>

    <body>
        <!-- Navbar -->
        @include('partials.navbarlogin')

        <!-- Hero Title -->
        <div class="hero bg-white">
            <h1>Salon Asih</h1>
        </div>

        <!-- Hero Image (Full Width) -->
        <div class="hero-image-wrapper mx-0 px-0">
            <img src="{{ asset('assets/img/hero.png') }}" alt="hero-image" class="w-100 d-block">
        </div>

        <!-- Hero Section -->
        <section class="hero-section text-center py-5" style="background-color: white; color: #7B0000;">
            <div class="container">
                <h1 class="hero-title">Temukan Kecantikan Anda,<br>Pesan Kebutuhan Anda.</h1>
                <p class="hero-subtitle">Nikmati layanan perawatan terbaik dari Salon Asih, tempat di mana kecantikan
                    dan kenyamanan menyatu.<br>
                    Yuk, booking sekarang dan rasakan transformasinya!</p>
            </div>
        </section>
        <!-- Layanan Section -->
        <section class="layanan-section py-5">
            <div class="container text-center">
                <div class="row">

                    <!-- Make Up -->
                    <div class="col-md-4 mb-4">
                        <div class="layanan-card position-relative">
                            <img src="{{ asset('assets/img/makeup.png') }}" alt="Make Up" class="img-fluid rounded">
                            <div class="layanan-overlay d-flex justify-content-start align-items-end">
                                <div class="text-white p-2">
                                    <i class="bi bi-brush-fill"></i>
                                    <span class="fs-5">make up</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rias -->
                    <div class="col-md-4 mb-4">
                        <div class="layanan-card position-relative">
                            <img src="{{ asset('assets/img/rias.png') }}" alt="Rias" class="img-fluid rounded">
                            <div class="layanan-overlay d-flex justify-content-start align-items-end">
                                <div class="text-white p-2">
                                    <i class="bi bi-stars"></i>
                                    <span class="fs-5">Rias</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nail Care -->
                    <div class="col-md-4 mb-4">
                        <div class="layanan-card position-relative">
                            <img src="{{ asset('assets/img/nail.png') }}" alt="Nail Care" class="img-fluid rounded">
                            <div class="layanan-overlay d-flex justify-content-start align-items-end">
                                <div class="text-white p-2">
                                    <i class="bi bi-hand-index-thumb-fill"></i>
                                    <span class="fs-5">nail care</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="container py-5">
            <div class="content-wrapper">
                <div class="row align-items-center">
                    <!-- Kolom Gambar -->
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <img src="{{ asset('assets/img/treatment.png') }}" alt="Salon Asih"
                            class="img-fluid salon-image">
                    </div>

                    <!-- Kolom Daftar Perawatan -->
                    <div class="col-lg-7">
                        <h1 class="treatment-header testimonial-header">Treatments and prices</h1>
                        <p class="mb-4 testimonial-header">Temukan harga terbaik yang tertera pada layanan salon Asih
                        </p>

                        <div class="row">
                            <!-- Nail Care -->
                            <div class="col-md-6">
                                <div class="card treatment-card p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="treatment-name">Nail Care</span>
                                        <span class="treatment-price">Mulai dari <span class="price-from">Rp
                                                50.000</span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Rias -->
                            <div class="col-md-6">
                                <div class="card treatment-card p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="treatment-name">Rias</span>
                                        <span class="treatment-price">Mulai dari <span class="price-from">Rp
                                                100.000</span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Make Up -->
                            <div class="col-md-6">
                                <div class="card treatment-card p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="treatment-name">Make Up</span>
                                        <span class="treatment-price">Mulai dari <span class="price-from">Rp
                                                150.000</span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Massage -->
                            <div class="col-md-6">
                                <div class="card treatment-card p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="treatment-name">Massage</span>
                                        <span class="treatment-price">Mulai dari <span class="price-from">Rp
                                                150.000</span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sulam Alis -->
                            <div class="col-md-6">
                                <div class="card treatment-card p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="treatment-name">Sulam Alis</span>
                                        <span class="treatment-price">Mulai dari <span class="price-from">Rp
                                                500.000</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ url('/service2') }}" class="btn {{ Request::is('service2') ? 'active' : '' }}"
                                style="border: 2px solid #6B0606; color: white; background-color: #6B0606; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                                View all
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="testimonial-section py-5 bg-light">
            <div class="container">
                <h1 class="text-center testimonial-header">Testimonials</h1>
                <p class="text-center mb-5 testimonial-header">
                    Simak pengalaman pelanggan kami yang telah merasakan layanan terbaik dari Salon Asih. Kepuasan Anda
                    adalah prioritas kami!
                </p>

                <div id="testimonialCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <!-- Testimonial 1 -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 border rounded shadow bg-white text-center">
                                        <img src="{{ asset('assets/img/rias.png') }}" alt="Customer"
                                            class="testimonial-profile mb-3 rounded-circle border border-danger mx-auto d-block"
                                            style="width: 100px; height: 100px; object-fit: cover;">

                                        <div class="testimonial-quote text-secondary mb-3">
                                            <i class="fas fa-quote-left fa-2x"></i>
                                        </div>
                                        <p class="testimonial-text fst-italic">
                                            "Pelayanan di Salon Asih benar-benar luar biasa! Stafnya ramah, tempatnya
                                            bersih, dan hasil riasannya memuaskan. Saya pasti akan kembali lagi."
                                        </p>
                                        <p class="testimonial-author mt-3 fw-bold">
                                            Sarah<br>
                                            <span class="testimonial-role text-muted">Pelanggan Setia</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 border rounded shadow bg-white text-center">
                                        <<img src="{{ asset('assets/img/rias.png') }}" alt="Customer"
                                            class="testimonial-profile mb-3 rounded-circle border border-danger mx-auto d-block"
                                            style="width: 100px; height: 100px; object-fit: cover;">

                                            <div class="testimonial-quote text-secondary mb-3">
                                                <i class="fas fa-quote-left fa-2x"></i>
                                            </div>
                                            <p class="testimonial-text fst-italic">
                                                Salon Asih selalu menjadi pilihan utama saya. Dari potong rambut sampai
                                                perawatan wajah, semuanya dilakukan dengan profesional dan teliti.
                                            </p>
                                            <p class="testimonial-author mt-3 fw-bold">
                                                dek ulik<br>
                                                <span class="testimonial-role text-muted">Pelanggan Baru</span>
                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 border rounded shadow bg-white text-center">
                                        <img src="{{ asset('assets/img/rias.png') }}" alt="Customer"
                                            class="testimonial-profile mb-3 rounded-circle border border-danger mx-auto d-block"
                                            style="width: 100px; height: 100px; object-fit: cover;">

                                        <div class="testimonial-quote text-secondary mb-3">
                                            <i class="fas fa-quote-left fa-2x"></i>
                                        </div>
                                        <p class="testimonial-text fst-italic">
                                            Pertama kali mencoba perawatan di Salon Asih dan saya sangat terkesan.
                                            Prosesnya nyaman, hasilnya maksimal. Sangat direkomendasikan!
                                        </p>
                                        <p class="testimonial-author mt-3 fw-bold">
                                            rania<br>
                                            <span class="testimonial-role text-muted">Pelanggan Premium</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Manual Controls with Red Arrows -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"
                            style="filter: brightness(0) saturate(100%) invert(14%) sepia(91%) saturate(4250%) hue-rotate(349deg) brightness(90%) contrast(95%);"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"
                            style="filter: brightness(0) saturate(100%) invert(14%) sepia(91%) saturate(4250%) hue-rotate(349deg) brightness(90%) contrast(95%);"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- History -->
        <section class="history-section text-center">
            <div class="container">
                <h2 class="history-title mb-3">History</h2>
                <p class="text-muted">Eleifend arcu non lorem justo in tempus purus gravida tortor egestas sed feugiat
                    elementum</p>

                <div class="row align-items-center mt-5 text-start">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/img/fotopegawai.png') }}" alt="Salon Asih Team"
                            class="history-img">
                    </div>
                    <div class="col-md-6 history-text">
                        <p>Salon Asih berdiri sejak tahun 1991, berlokasi di Jln. Pulau Bungin No.113, Denpasar Selatan.
                            Sejak awal, Salon Asih hadir dengan satu tujuan memberikan pelayanan kecantikan terbaik yang
                            mengutamakan kenyamanan, profesionalitas, dan hasil yang memuaskan.</p>
                        <p>Dengan pengalaman lebih dari tiga dekade, Salon Asih telah menjadi pilihan terpercaya bagi
                            para wanita Bali dan sekitarnya yang ingin tampil cantik dan percaya diri.</p>
                        <p>Kami terus berkembang mengikuti tren dan teknologi terkini demi menghadirkan perawatan yang
                            aman, modern, dan berkualitas tinggi.</p>
                        <a href="#" class="read-more">Read more</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="location-section text-center">
            <div class="container">
                <h2 class="location-title mb-4">Location</h2>
                <div class="map-container mx-auto">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.011515734529!2d115.19828277533449!3d-8.690453791357974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240d814fdb30d%3A0xb4f2d89fd4698cec!2sSalon%20Asih!5e0!3m2!1sid!2sid!4v1747716201855!5m2!1sid!2sid"
                        width="1500" height="700" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>


                </div>
            </div>
        </section>

        <!-- footer -->
        @include('partials.footer')
        <!-- Bootstrap JS (Opsional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Icon (Opsional) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
    </body>

    </html>
