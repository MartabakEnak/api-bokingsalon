<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi OTP - Salon Asih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="margin: 0; font-family: 'Segoe UI', sans-serif;">

    <!-- Background Container -->
    <div class="vh-100 vw-100 d-flex justify-content-center align-items-center" style="background-color: #6B0606;">

        <!-- OTP Card -->
        <div class="card border-0 shadow"
            style="max-width: 500px; width: 100%; border-radius: 20px; padding: 2.5rem; background-color: rgba(255, 255, 255, 0.95);">

            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('assets/img/logo_login.png') }}" alt="Logo"
                    style="width: 60px; margin-bottom: 1rem;">
            </div>

            <h2 class="text-center fw-bold mb-1">Verifikasi OTP</h2>
            <p class="text-center text-muted mb-4">Masukkan kode OTP yang dikirim ke email Anda</p>

            <!-- Pesan Error -->
            @if (session('error'))
                <div class="alert alert-danger text-center py-2">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form OTP -->
            <form method="POST" action="{{ route('otp.verify') }}">
                @csrf

                <div class="position-relative mb-4">
                    <i class="bi bi-shield-lock-fill position-absolute"
                        style="left: 15px; top: 50%; transform: translateY(-50%); color: #7B0000;"></i>
                    <input id="otp" type="text" name="otp" required autofocus placeholder="Masukkan Kode OTP"
                        class="form-control ps-5"
                        style="border-radius: 10px; background-color: #e0e0e0; border: none;">
                </div>

                <!-- Tombol Verifikasi -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn"
                        style="background-color: #7B0000; color: white; font-weight: bold; border-radius: 10px;">
                        Verifikasi
                    </button>
                </div>

                <!-- Link Kirim Ulang -->
                {{-- <p class="text-center mt-3 text-muted">
                    Tidak menerima kode?
                    <a href="{{ route('otp.resend') }}" style="color: #7B0000; font-weight: bold; text-decoration: none;">
                        Kirim ulang OTP
                    </a>
                </p> --}}
            </form>

        </div>
    </div>

</body>

</html>
