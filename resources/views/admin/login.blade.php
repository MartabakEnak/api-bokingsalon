<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Salon Asih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="margin: 0; font-family: 'Segoe UI', sans-serif;">

    <!-- Background Container -->
    <div class="vh-100 vw-100 d-flex justify-content-center align-items-center"
        style="background-color: #6B0606;">

        <!-- Card Login -->
        <div class="card border-0 shadow"
            style="max-width: 500px; width: 100%; border-radius: 20px; padding: 2.5rem; background-color: rgba(255, 255, 255, 0.95);">

            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('assets/img/vector.png') }}" alt="Logo"
                    style="width: 60px; margin-bottom: 1rem;">
            </div>

            <h2 class="text-center fw-bold mb-1">LOGIN ADMIN</h2>
            <p class="text-center text-muted mb-4"></p>

            <!-- Form Login -->
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="position-relative mb-4">
                    <i class="bi bi-person-fill position-absolute"
                        style="left: 15px; top: 50%; transform: translateY(-50%); color: #7B0000;"></i>
                    <input type="email" name="email" class="form-control ps-5" placeholder="Masukan Email" required
                        style="border-radius: 10px; background-color: #e0e0e0; border: none;">
                </div>

                <div class="position-relative mb-4">
                    <i class="bi bi-lock-fill position-absolute"
                        style="left: 15px; top: 50%; transform: translateY(-50%); color: #7B0000;"></i>
                    <input type="password" name="password" class="form-control ps-5" placeholder="Masukan password"
                        required style="border-radius: 10px; background-color: #e0e0e0; border: none;">
                </div>

                <!-- Tombol Login -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn"
                        style="background-color: #7B0000; color: white; font-weight: bold; border-radius: 10px;">Login</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
