<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pemesanan</title>
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

    <div class="container my-4">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Kuitansi</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Layanan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
    @forelse($pemesanan as $pesanan)
        <tr>
            <td class="text-center">
                <a href="{{ route('riwayat.cetak', $pesanan->id) }}" class="btn btn-sm btn-primary" target="_blank">
                    kuitansi
                </a>
            </td>
            <td class="text-center">{{ $pesanan->user->name ?? 'Tidak diketahui' }}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($pesanan->tanggal)->format('d M Y') }}</td>
            <td class="text-center">{{ $pesanan->jam ?? '-' }}</td>
            <td class="text-center">{{ $pesanan->layanan->nama ?? '-' }}</td>
            <td class="text-center">
                <span class="badge bg-{{ strtolower($pesanan->status_pembayaran) === 'diterima' ? 'success' : 'secondary' }}">
                    {{ ucfirst($pesanan->status_pembayaran) }}
                </span>
                @if(strtolower($pesanan->status_pembayaran) === 'belum_bayar')
                    <a href="{{ route('pembayaran.qr', $pesanan->id) }}" class="btn btn-sm btn-warning mt-2">
                        <i class="bi bi-cash"></i> Bayar Sekarang
                    </a>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada pemesanan.</td>
        </tr>
    @endforelse
</tbody>
            </table>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>
