<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="container-fluid d-flex flex-row row">
  <!-- Sidebar -->
  @include('partials.sidebaradmin')

  <!-- Content Dashboard -->
  <div class="col-10 mt-2">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4>Dashboard</h4>
      <div>
        <select class="form-select">
          <option selected>Juli 2025</option>
        </select>
      </div>
    </div>

    <div class="row g-4 mb-4">
      <div class="col-md-4">
        <div class="card p-3">
          <h6>Status Pemesanan</h6>
          <canvas id="chartStatusTiket"></canvas>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3">
          <h6>Jenis Pelayanan yang sering dipesan</h6>
          <canvas id="chartSLA"></canvas>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3 text-center">
          <h6>Jumlah Status Pemesanan</h6>
          <div class="d-flex justify-content-around my-2">
            <div class="text-primary fw-bold">15 Diterima</div>
            <div class="text-warning fw-bold">5 Menunggu</div>
            <div class="text-danger fw-bold">10 Dibatalkan</div>
          </div>
          <a href="#" class="btn btn-sm btn-outline-primary mt-2">Lihat Daftar Pesanan</a>
        </div>
      </div>
    </div>

    <div class="row g-4 mb-4">
      <div class="col-md-2">
        <div class="card text-center p-3">
          <h2>16</h2>
          <p class="mb-0 text-muted">Total Pesanan</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3">
          <h2>10</h2>
          <p class="mb-0 text-muted">Jenis Layanan</p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card text-center p-3">
          <h2>8</h2>
          <p class="mb-0 text-muted">Pegawai</p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card text-center p-3">
          <h2>250</h2>
          <p class="mb-0 text-muted">Total Testimoni</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3">
          <h2>350</h2>
          <p class="mb-0 text-muted">Total Pesanan per bulan</p>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <strong>Data Tiket dan Perjalanan Terkini</strong> — Menampilkan 10 data terbaru
      </div>
      <div class="table-responsive">
        <table class="table table-bordered m-0">
          <thead class="table-light">
            <tr>
              <th>No.</th>
              <th>ID Tiket</th>
              <th>Tempat Tujuan</th>
              <th>Nama Pengguna</th>
              <th>Deskripsi</th>
              <th>Update Terakhir</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>TK1751394799911212</td>
              <td>GLAFIDSYA MEDIK</td>
              <td>Ryan & Habib Rahman</td>
              <td>CM PING MERCHANT JULI</td>
              <td><span class="badge bg-success">02/07 - 20:21</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <script>
      new Chart(document.getElementById('chartStatusTiket'), {
        type: 'pie',
        data: {
          labels: ['Diterima', 'menunggu', 'Dibatalkan'],
          datasets: [{
            data: [15, 5, 10],
            backgroundColor: ['#0d6efd', '#ffc107', '#198754', '#dc3545']
          }]
        }
      });

      new Chart(document.getElementById('chartSLA'), {
        type: 'pie',
        data: {
          labels: ['Haircut', 'Nail Care', 'Massage', 'Rias'],
          datasets: [{
            data: [20, 35, 15, 25],
            backgroundColor: ['#0d6efd', '#ffc107', '#6c757d', '#660000']
          }]
        }
      });
    </script>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
