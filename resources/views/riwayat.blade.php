<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Import dari Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @include('partials.navbar')

     <!-- Hero Title -->
  <div class="hero bg-white">
    <h1>riwayat</h1>
  </div>

  <div class="history-container">
  <h2>Riwayat Pemesanan</h2>
  <table>
    <thead>
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
      <tr>
        <td><strong>kuitansi</strong></td>
        <td>Alex Pastor</td>
        <td><span class="tanggal">07 Juli 2025</span></td>
        <td><span class="waktu"><i class="fa fa-clock-o"></i> 10.00 Wita</span></td>
        <td><a href="#" class="layanan">Nail Art</a></td>
        <td><span class="status diterima">Di Terima</span></td>
      </tr>
    </tbody>
  </table>
</div>


    @include('partials.footer')
</body>
</html>
