<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    </head>
    <body>
<navbar>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom px-4">
  <div class="container">

    <!-- Kiri: Brand -->
    {{-- <a class="navbar-brand" href="#"><i class="bi bi-instagram"></i> <i class="bi bi-whatsapp"></i></a> --}}
    <span class="d-flex gap-2">
        <a href="https://www.instagram.com/" target="_blank">
            <i class="bi bi-instagram text-white"></i>
        </a>
        <a href="https://wa.me/6285739589921?text=Terimakasih%20sudah%20menghubungi%20kami!%0ASilahkan%20bertanya%20mengenai%20reservasi%20booking%20atau%20berkonsultasi%20dengan%20admin%20kami!" class="text-reset text-decoration-none" target="_blank">
            <i class="bi bi-whatsapp text-white"></i>
        </a>
    </span>


    <!-- Toggle button (untuk tampilan mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Tengah: Menu -->
    <div class=" justify-content-center" id="navbarContent">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('welcome2') ? 'active' : '' }}" href="welcome2">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('service2') ? 'active' : '' }}" href="service2">Services</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('riwayat2') ? 'active' : '' }}" href="riwayat2">Riwayat</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('contacUs2') ? 'active' : '' }}" href="contacUs2">Contact Us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('aboutUs2') ? 'active' : '' }}" href="aboutUs2">About Us</a>
            </li>
      </ul>
    </div>


    <!-- Kanan: Login/Register -->
    <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="2">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @auth
    <div>{{ Auth::user()->name }}</div>
@else
    <div>Guest</div> {{-- atau link login --}}
@endauth

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
  </div>
</nav>
</navbar>
  </body>
