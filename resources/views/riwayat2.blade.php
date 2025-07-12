<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Salon Asih</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo_login.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Kalau pakai Vite --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @include('partials.navbarlogin')

    <!-- Hero Title -->
    <div class="hero bg-white py-5 text-center">
        <h1 class="display-4">Riwayat Pemesanan</h1>
    </div>

    <div class="container mb-4 min-vh-100">

        @if ($pemesanan->isEmpty())
            <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded shadow text-center">
                Kamu belum pernah melakukan booking.
            </div>
        @else
            <div class="grid sm:grid-cols-2 gap-4 ">
                @foreach ($pemesanan as $booking)
                    <div class="border rounded-xl shadow-md p-6 bg-white">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Booking Tanggal {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}
                                </h2>
                                <p class="text-sm text-gray-500">Nomor HP: {{ $booking->phone_number }}</p>
                            </div>

                            <div
                                class="ml-auto px-3 py-1 text-sm rounded-full 
                                 @if ($booking->status == 'pending') bg-yellow-100 text-yellow-800 
                                 @elseif($booking->status == 'approved') bg-blue-100 text-blue-800 
                                 @elseif($booking->status == 'paid') bg-green-100 text-green-800 
                                 @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($booking->status) }}
                            </div>
                        </div>

                        <div>
                            <p class="font-medium mb-2">Layanan Dipilih:</p>
                            <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                                @foreach ($booking->layanan as $service)
                                    <li>{{ $service->name }} - Rp{{ number_format($service->price) }}
                                        ({{ $service->duration }} menit)
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-4 flex justify-between items-center">
                            <div class="text-lg font-bold text-green-700">
                                Total: Rp{{ number_format($booking->total_price) }}
                            </div>

                            @if ($booking->status === 'approved')
                                <a href="{{ route('bayar', $booking->id) }}"
                                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm font-semibold text no-underline">
                                    Lanjutkan Pembayaran
                                </a>
                            @endif
                            @if ($booking->status === 'paid')
                                <a href="{{ route('riwayat.cetak', $booking->id) }}"
                                    class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm font-semibold text no-underline">
                                    Cetak Nota
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @include('partials.footer')
</body>

</html>
