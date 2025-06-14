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
    <!-- Hero Title -->
    <div class="text-center my-5">
        <h1 class="fw-bold" style="font-family: 'Imperial Script', cursive; color: #7B0000; font-size: 60px;">Service
        </h1>
        <p class="text-muted">Services and prices</p>
    </div>

    <!-- Services -->
    <div class="container">

        <!-- Section 1: SULAM -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="{{ asset('assets/img/alis.jpg') }}" class="img-fluid rounded w-100"
                    style="height: 300px; object-fit: cover;" alt="Sulam">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold text-danger">SULAM</h4>
                @foreach ([['Sulam Alis', '1.500.000'], ['Sulam Bibir', '1.800.000'], ['Sulam Eyeliner', '1.300.000']] as [$item, $price])
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <span>{{ $item }}</span><span>Rp {{ $price }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Section 2: Hair Styling -->
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <img src="{{ asset('assets/img/hair.jpg') }}" class="img-fluid rounded w-100"
                    style="height: 300px; object-fit: cover;" alt="Hair Styling">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold text-danger">Hair Styling</h4>
                @foreach ([['Cutting', '70.000'], ['Hair Coloring', '250.000'], ['Smoothing', '300.000'], ['Blow & Styling', '100.000']] as [$item, $price])
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <span>{{ $item }}</span><span>Rp {{ $price }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Section 3: Nail Care -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="{{ asset('assets/img/nail.png') }}" class="img-fluid rounded w-100"
                    style="height: 300px; object-fit: cover;" alt="Nail Care">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold text-danger">Nail Care</h4>
                @foreach ([['Manicure', '60.000'], ['Pedicure', '70.000'], ['Nail Art', '100.000']] as [$item, $price])
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <span>{{ $item }}</span><span>Rp {{ $price }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Section 4: Rias -->
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <img src="{{ asset('assets/img/rias.png') }}" class="img-fluid rounded w-100"
                    style="height: 300px; object-fit: cover;" alt="Rias">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold text-danger">Rias</h4>
                @foreach ([['Rias Wisuda', '300.000'], ['Rias Pengantin', '2.000.000'], ['Rias Casual', '250.000']] as [$item, $price])
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <span>{{ $item }}</span><span>Rp {{ $price }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Section 5: Massage -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="{{ asset('assets/img/facial.jpg') }}" class="img-fluid rounded w-100"
                    style="height: 300px; object-fit: cover;" alt="Massage">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold text-danger">Facial</h4>
                @foreach ([['Full Body', '150.000'], ['Back & Shoulder', '80.000'], ['Reflexology', '70.000']] as [$item, $price])
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <span>{{ $item }}</span><span>Rp {{ $price }}</span>
                    </div>
                @endforeach
            </div>
        </div>
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
                        <!-- Service 1: SULAM (gambar kiri, konten kanan) -->
                        <div class="row mb-5 align-items-center">
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('assets/img/sulam.png') }}" alt="Sulam" class="rounded" style="width:340px; height:auto; object-fit:cover;">
                            </div>
                            <div class="col-md-7">
                                <h4 class="mb-3 fw-bold" style="color:#7B0000;">SULAM</h4>
                                <ul class="list-unstyled">
                                    <li>Daily make up <span class="float-end text-muted">from $35</span></li>
                                    <li>Night make up <span class="float-end text-muted">from $35</span></li>
                                    <li>Bridal make up <span class="float-end text-muted">from $35</span></li>
                                    <li>Ocassion make up <span class="float-end text-muted">from $35</span></li>
                                    <li>Television make up <span class="float-end text-muted">from $35</span></li>
                                </ul>
                                <a href="contacUs" class="fw-bold" style="color:#7B0000;">Booking</a>
                            </div>
                        </div>
                        <!-- Service 2: HAIR STYLING (konten kiri, gambar kanan) -->
                        <div class="row mb-5 align-items-center flex-row-reverse">
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('assets/img/hairstyling.png') }}" alt="Hair Styling" class="rounded" style="width:340px; height:auto; object-fit:cover;">
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
                                <a href="contacUs" class="fw-bold" style="color:#7B0000;">Booking</a>
                            </div>
                        </div>
                        <!-- Service 3: NAIL CARE (gambar kiri, konten kanan) -->
                        <div class="row mb-5 align-items-center">
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('assets/img/nail.png') }}" alt="Nail Care" class="rounded" style="width:340px; height:auto; object-fit:cover;">
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
                                <a href="contacUs" class="fw-bold" style="color:#7B0000;">Booking</a>
                            </div>
                        </div>
                        <!-- Service 4: RIAS (konten kiri, gambar kanan) -->
                        <div class="row mb-5 align-items-center flex-row-reverse">
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('assets/img/rias.png') }}" alt="Rias" class="rounded" style="width:340px; height:auto; object-fit:cover;">
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
                                <a href="contacUs" class="fw-bold" style="color:#7B0000;">Booking</a>
                            </div>
                        </div>
                        <!-- Service 5: MASSAGE (gambar kiri, konten kanan) -->
                        <div class="row mb-5 align-items-center">
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('assets/img/massage.jpg') }}" alt="Massage" class="rounded" style="width:340px; height:auto; object-fit:cover;">
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
                                <a href="contacUs" class="fw-bold" style="color:#7B0000;">Booking</a>
                            </div>
                        </div>
                        <!-- Service 6: KOSONG (konten kiri, gambar kanan) -->
                        <div class="row mb-5 align-items-center flex-row-reverse">
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('assets/img/empty.jpg') }}" alt="Empty" class="rounded" style="width:340px; height:auto; object-fit:cover; opacity:0.3;">
                            </div>
                            <div class="col-md-7">
                                <!-- Kosong -->
                            </div>
                        </div>
                    </div>
                </section>

    @include('partials.footer')
</body>
</html>
