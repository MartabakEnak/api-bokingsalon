<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
         @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Kalau pakai Vite --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Import dari Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
    @include('partials.navbarlogin')

   <!-- Hero Title -->
  <div class="hero bg-white">
    <h1>contac us</h1>

  </div>
  <div class="hero-image-wrapper mx-0 px-0">
  <img src="{{ asset('assets/img/heroaboutUs.png') }}" alt="hero-image" class="w-100 d-block">
</div>


<!-- location -->
           <div class="container my-5">
  <div class="row g-4 justify-content-center">
    <div class="col-md-3 d-flex align-items-stretch">
      <div class="info-box w-100 h-100">
        <i class="bi bi-geo-alt-fill"></i>
        <p class="mb-0">Jln. Pulau Bungin No.113</p>
        <p class="mb-0">Denpasar Selatan</p>
      </div>
    </div>
    <div class="col-md-3 d-flex align-items-stretch">
      <div class="info-box w-100 h-100">
        <i class="bi bi-envelope-fill"></i>
        <p class="mb-0"><u>SalonAsih@gmail.com</u></p>
      </div>
    </div>
    <div class="col-md-3 d-flex align-items-stretch">
      <div class="info-box w-100 h-100">
        <i class="bi bi-whatsapp"></i>
        <p class="mb-0">0123456789</p>
      </div>
    </div>
  </div>
</div>

   <!-- Promo Banner -->
  <div class="promo-banner">
    <h2>Jadilah Member, Dapatkan Harga Spesial!</h2>
    <p>Daftar atau login untuk menikmati promo eksklusif dari Salon Asih.</p>
  </div>

  <!-- Booking Section -->
<div class="container booking-box-wrapper spacing-before-footer">
  <div class="container booking-box-wrapper">
    <div class="row justify-content-center">
      <div class="col-lg-10 booking-box">
        <div class="row align-items-center">
          <!-- Image -->
          <div class="col-md-5 text-center booking-image">
            <img src="{{ asset('assets/img/member.png') }}" class="img-fluid rounded" alt="Model Salon">
          </div>

          <!-- Form -->
          <div class="col-md-7">
            <div class="label-title mb-1">BEAUTY SALON</div>
            <div class="form-section-title mb-4">Book appointment</div>

            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <input type="date" class="form-control" placeholder="Date">
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <input type="time" class="form-control" placeholder="Time">
                  <span class="input-group-text bg-white"><i class="bi bi-clock"></i></span>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <select class="form-select">
                <option selected disabled>Service</option>
                <option value="1">Haircut</option>
                <option value="2">Facial</option>
                <option value="3">Manicure</option>
              </select>
            </div>

            <button class="btn btn-maroon">Pesan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



    @include('partials.footer')
</body>
</html>
