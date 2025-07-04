<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Sidebar -->
  <div class="d-flex flex-column col-2 min-vh-100" style="background-color: #6B0606">
      <div class="mt-5 mb-4 text-center">
          <h2 style="color:white">Salon Asih</h2>
      </div>
      <ul class="nav flex-column">
          <li class="nav-item mb-2">
              <a class="nav-link text-white fw-bold" href="{{ route('admin.dashboard') }}">
                  <span class="me-2">&#128202;</span> Dashboard
              </a>
          </li>
          <li class="nav-item mb-2">
              <a class="nav-link text-white fw-bold" href="{{ route('admin.pesanan') }}">
                  <span class="me-2">&#128221;</span> Daftar Pemesanan
              </a>
          </li>
          <li class="nav-item mb-2">
              <a class="nav-link text-white fw-bold" href="">
                  <span class="me-2">&#128100;</span> Akun
              </a>
          </li>
          <li class="nav-item mt-auto mb-3">
              <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-white fw-bold">
                  <span class="me-2">&#128682;</span> Logout
              </a>
              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>
      </ul>
  </div>
</body>
</html>
