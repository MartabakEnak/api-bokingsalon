<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pendapatan Salon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px 20px;
        }

        .report-box {
            max-width: 900px;
            margin: auto;
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.04);
        }

        .report-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        table thead {
            background-color: #e9ecef;
        }

        .total-row th,
        .total-row td {
            font-weight: bold;
            border-top: 2px solid #333;
            background-color: #f8f9fa;
        }

        .no-print {
            margin-top: 20px;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
                background: white;
            }

            .report-box {
                box-shadow: none;
                border: none;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="report-box">
        <div class="report-title">
            Laporan Pendapatan Salon Asih<br>
            <small>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</small>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Layanan</th>
                    <th>Total (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @php $totalPendapatan = 0; @endphp
                @foreach ($pemesanan as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->booking_date)->translatedFormat('d M Y') }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <ul class="mb-0 ps-3">
                                @foreach ($item->layanan as $service)
                                    <li>{{ $service->name }} (Rp{{ number_format($service->price, 0, ',', '.') }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-end">{{ number_format($item->total_price, 0, ',', '.') }}</td>
                    </tr>
                    @php $totalPendapatan += $item->total_price; @endphp
                @endforeach

                <tr class="total-row">
                    <th colspan="4" class="text-end">Total Pendapatan</th>
                    <td class="text-end">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class=" no-print">

            <a href="{{ url()->previous() }}" class="btn btn-secondary">⬅ Kembali</a>
            <button class="btn btn-success" onclick="window.print()">🖨 Cetak Laporan</button>
        </div>
    </div>

</body>

</html>
