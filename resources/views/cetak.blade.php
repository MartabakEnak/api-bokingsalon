<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kuitansi Pemesanan #{{ $pemesanan->id }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            padding: 40px 10px;
        }

        .receipt {
            max-width: 700px;
            margin: auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 40px;
        }

        .receipt-header {
            border-bottom: 1px solid #ccc;

            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .receipt-header h2 {
            font-size: 24px;
            font-weight: 600;
            margin: 0;
            color: #333;
        }

        .receipt-details th {
            width: 40%;
            font-weight: 500;
            color: #555;
            padding: 6px 0;
        }

        .receipt-details td {
            color: #333;
            padding: 6px 0;
        }

        .service-list {
            padding-left: 0;
            list-style: none;
            display: flex
        }

        .total-price {
            font-size: 18px;
            font-weight: bold;
            color: #000;
        }

        .thank-you {
            text-align: center;
            font-weight: 600;
            font-size: 16px;
            margin-top: 30px;
            color: #28a745;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
                background: white;
            }

            .receipt {
                box-shadow: none;
                border: none;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="receipt">
        <div class="receipt-header  text-center">
            <h2>Salon Asih</h2>
            <small>Kuitansi Pemesanan </small>
        </div>

        <table class="table table-borderless  receipt-details">
            <tr>
                <th>Nama Pelanggan</th>
                <td>: {{ $pemesanan->name }}</td>
            </tr>
            <tr>
                <th>No. Telepon</th>
                <td>: {{ $pemesanan->phone_number }}</td>
            </tr>
            <tr>
                <th>Tanggal Booking</th>
                <td>: {{ \Carbon\Carbon::parse($pemesanan->booking_date)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th>Jam Booking</th>
                <td>: {{ \Carbon\Carbon::parse($pemesanan->booking_time)->format('H:i') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>: <span class="text-capitalize">{{ $pemesanan->status }}</span></td>
            </tr>
            <tr>
                <th>Layanan</th>
                <td>
                    <div class="service-list">
                        <p>:</p>
                        <div style="margin-left: 5px">

                            @foreach ($pemesanan->layanan as $service)
                                <li>{{ $service->name }} - Rp{{ number_format($service->price, 0, ',', '.') }}</li>
                            @endforeach
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td class="total-price">: Rp{{ number_format($pemesanan->total_price, 0, ',', '.') }}</td>
            </tr>
        </table>

        <p class="thank-you">Terima kasih telah melakukan pemesanan di salon kami!</p>


        <div class=" no-print mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">⬅ Kembali</a>
            <button class="btn btn-success" onclick="window.print()">🖨 Cetak Nota</button>
        </div>
    </div>

</body>

</html>
