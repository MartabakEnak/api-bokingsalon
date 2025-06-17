<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kuitansi Pemesanan #{{ $pemesanan->id }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap untuk tampilan rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding: 30px;
            font-size: 14px;
        }
        .receipt-box {
            border: 1px solid #ccc;
            padding: 25px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }
        .text-center {
            text-align: center;
        }
        .thank-you {
            margin-top: 30px;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            color: #2e7d32;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="receipt-box">
        <h4 class="text-center mb-4">Salon Booking Receipt</h4>

        <table class="table table-borderless">
            <tr>
                <th>Kode Pemesanan</th>
                <td>: #{{ $pemesanan->id }}</td>
            </tr>
            <tr>
                <th>Nama Pelanggan</th>
                <td>: {{ $pemesanan->user->name ?? '-' }}</td>
            </tr>
            <tr>
                <th>No. Telepon</th>
                <td>: {{ $pemesanan->no_telepon }}</td>
            </tr>
            <tr>
                <th>Layanan</th>
                <td>: {{ $pemesanan->layanan->nama_layanan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>: {{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Jam</th>
                <td>: {{ $pemesanan->jam }}</td>
            </tr>
            <tr>
                <th>Status Pembayaran</th>
                <td>: {{ ucfirst($pemesanan->status_pembayaran) }}</td>
            </tr>
        </table>

        <p class="thank-you">Terima kasih telah melakukan pemesanan di salon kami!</p>

        <div class="text-center no-print mt-4">
            <button class="btn btn-success" onclick="window.print()">🖨 Cetak</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">⬅ Kembali</a>
        </div>
    </div>

</body>
</html>
