<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran - {{ $pesanan->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <h2>Silakan Selesaikan Pembayaran</h2>
        <p class="lead">Untuk pesanan <strong>#{{ $pesanan->id }}</strong></p>

        <div class="card p-4 mx-auto" style="max-width: 400px;">
            <h5 class="mb-3">Scan QR Code di bawah:</h5>

            <!-- QR Code -->
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ urlencode($qrData) }}" alt="QR Code">

            <p class="mt-4">Jumlah yang harus dibayar: <strong>Rp {{ number_format($pesanan->layanan->harga ?? 0, 0, ',', '.') }}</strong></p>

            <a href="{{ route('riwayat') }}" class="btn btn-secondary mt-3">Kembali ke Riwayat</a>
        </div>
    </div>
</body>
</html>
