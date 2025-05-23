<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Kalau pakai Vite --}}
</head>
<body>
    @include('partials.navbarlogin')

    <div class="container mx-auto py-6">
        <h1>Selamat datang, {{ Auth::user()->name }}</h1>
    </div>

    @include('partials.footer')
</body>
</html>

