<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salon Asih</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo_login.png') }}">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
        <link rel="stylesheet" href="{{ asset('css/last.css') }}">
        <!-- Import dari Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
    @include('partials.navbar')

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
      <a class="text-amber-900 text-decoration-none" href="https://maps.app.goo.gl/DcwwWKAL8tERh1CU9" style="display: block;" target="_blank">
        <div class="info-box w-100 h-100">
        <i class="bi bi-geo-alt-fill"></i>
        <p class="mb-0"><a class="text-amber-900 text-decoration-none" href="https://maps.app.goo.gl/DcwwWKAL8tERh1CU9" target="_blank">Jln. Pulau Bungin No.113</a></p>
        <p class="mb-0"><a class="text-amber-900 text-decoration-none" href="https://maps.app.goo.gl/DcwwWKAL8tERh1CU9" target="_blank">Denpasar Selatan</p>
      </div>
      </a>
    </div>
<!-- email -->
  <div class="col-md-3 d-flex align-items-stretch">
      <a class="text-amber-900 text-decoration-none" href="https://mail.google.com/mail/?view=cm&fs=1&to=salonasih1991@gmail.com&su=&body=Halo,%0A%0ATerima%20kasih%20atas%20pertanyaan%20Anda." target="_blank" style="display: block;">
      <div class="info-box w-100 h-100">
        <i class="bi bi-envelope-fill"></i>
        <p class="mb-0"><a class="text-amber-900 text-decoration-none" href="mailto:salonasih1991@gmail.com.com?subject=Subjek%20Pesan&body=Halo,%0A%0ATerima%20kasih%20atas%20pertanyaan%20Anda.">SalonAsih@gmail.com</a></p>
      </div>
      </a>
    </div>

<!-- whatsapp -->
    <div class="col-md-3 d-flex align-items-stretch">
      <a href="https://wa.me/6285739589921?text=Terimakasih%20sudah%20menghubungi%20kami!%0ASilahkan%20bertanya%20mengenai%20reservasi%20booking%20atau%20berkonsultasi%20dengan%20admin%20kami!" target="_blank" class="text-decoration-none" style="display: block;">
        <div class="info-box w-100 h-100">
          <i class="bi bi-whatsapp"></i>
          <p>
            <a class="text-amber-900 text-decoration-none" class="mb-0">Klik Disni</a>
          </p>
        </div>
      </https:>
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

          <!-- Form hanya untuk user yang sudah login -->
          @auth
          <form method="POST" action="{{ route('pemesanan.store') }}">
            @csrf
            <div class="label-title mb-1">SALON ASIH</div>
            <div class="form-section-title mb-4">Book Appointment</div>

            <!-- Nomor WhatsApp -->
            <div class="mb-3">
              <input type="text" name="no_telepon" class="form-control" placeholder="Nomor WhatsApp" required>
            </div>

            <div class="row">
              <!-- Kolom Pemesanan 1 -->
              <div class="col-md-6">
                <h6>Pemesanan 1</h6>
                <div class="mb-2">
                  <input type="date" name="tanggal[0]" class="form-control" required>
                </div>
                <div class="mb-2">
                  <input type="time" name="jam[0]" class="form-control" required>
                </div>
                <div class="mb-2">
                  <select name="layanan_id[0]" class="form-select" required>
                    <option selected disabled>Service</option>
                    <option value="1">Haircut</option>
                    <option value="2">Facial</option>
                    <option value="3">Manicure</option>
                  </select>
                </div>
              </div>

              <!-- Kolom Pemesanan 2 -->
              <div class="col-md-6">
                <h6>Pemesanan 2</h6>
                <div class="mb-2">
                  <input type="date" name="tanggal[1]" class="form-control">
                </div>
                <div class="mb-2">
                  <input type="time" name="jam[1]" class="form-control">
                </div>
                <div class="mb-2">
                  <select name="layanan_id[1]" class="form-select">
                    <option selected disabled>Service</option>
                    <option value="1">Haircut</option>
                    <option value="2">Facial</option>
                    <option value="3">Manicure</option>
                  </select>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-maroon mt-3" style="background-color: maroon; color: white;">Pesan</button>
          </form>
          @endauth

          <!-- Jika belum login -->
          @guest
          <div class="text-center mt-3">
            <p>Silakan <a href="{{ route('login') }}" class="btn btn-maroon" style="background-color: maroon; color: white;">
              Login untuk memesan
            </a></p>
          </div>
          @endguest

        </div>
      </div>
    </div>
  </div>
</div>


@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>
