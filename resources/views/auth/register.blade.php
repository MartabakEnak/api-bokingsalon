<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Salon Asih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="margin: 0; font-family: 'Segoe UI', sans-serif;">

    <!-- Background Container -->
    <div class="vh-100 vw-100 d-flex justify-content-center align-items-center"
        style="background-color: #6B0606;">

        <!-- Card Register -->
        <div class="card border-0 shadow"
            style="max-width: 500px; width: 100%; border-radius: 20px; padding: 2.5rem; background-color: rgba(252, 244, 244, 0.95);">

            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('assets/img/logo_login.png') }}" alt="Logo"
                    style="width: 60px; margin-bottom: 1rem;">
            </div>

            <h2 class="text-center fw-bold mb-1">REGISTER</h2>
            <p class="text-center text-muted mb-4">Create your new account below</p>

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <div class="form-label">Name</div>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="form-control" style="border-radius: 10px; background-color: #e0e0e0; border: none;">
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <div class="form-label">Email</div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="form-control" style="border-radius: 10px; background-color: #e0e0e0; border: none;">
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <div class="form-label">Password</div>
                    <input type="password" id="password" name="password" required
                        class="form-control" style="border-radius: 10px; background-color: #e0e0e0; border: none;">
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <div class="form-label">Confirm Password</div>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="form-control" style="border-radius: 10px; background-color: #e0e0e0; border: none;">
                    @error('password_confirmation')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Register -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn"
                        style="background-color: #7B0000; color: white; font-weight: bold; border-radius: 10px;">
                        Register
                    </button>
                </div>

                <!-- Link Login -->
                <p class="text-center mt-3 text-muted">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" style="color: #7B0000; font-weight: bold; text-decoration: none;">
                        Klik di sini
                    </a>
                </p>
            </form>

        </div>
    </div>

</body>

</html>
