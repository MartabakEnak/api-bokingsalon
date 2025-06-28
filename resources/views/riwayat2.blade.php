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
                        <th>Pengerjaan</th>
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
                            </td>
                            <td class="text-center">
    @if ($pesanan->status_pengerjaan === 'selesai')
        <span class="badge bg-success">Selesai</span>
    @elseif ($pesanan->status_pengerjaan === 'diproses')
        <span class="badge bg-warning text-dark">Diproses</span>
    @else
        <span class="badge bg-secondary">Belum</span>
    @endif
</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada pemesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
    fetch('api/antrean-sekarang')
        .then(response => response.json())
        .then(data => {
            const antrean = parseInt(data.antrean_sekarang);
            const displayAntrean = isNaN(antrean) ? 1 : antrean;

            document.getElementById('antreanSekarang').innerText = displayAntrean;

            // Estimasi waktu pengerjaan (misal mulai dari jam 09:00)
            const jamMulai = 9;
            const estimasi = new Date();
            estimasi.setHours(jamMulai + (displayAntrean - 1));
            estimasi.setMinutes(0);
            estimasi.setSeconds(0);

            const jam = estimasi.getHours().toString().padStart(2, '0');
            const menit = estimasi.getMinutes().toString().padStart(2, '0');

            document.getElementById('estimasiWaktu').innerText = `${jam}:${menit}`;
        })
        .catch(err => {
            document.getElementById('estimasiWaktu').innerText = 'Gagal memuat estimasi';
            console.error('Gagal ambil data antrean:', err);
        });
</script>


    @include('partials.footer')
</body>
</html>
