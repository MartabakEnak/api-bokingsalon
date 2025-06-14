<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
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


    @include('partials.footer')
</body>
</html>
