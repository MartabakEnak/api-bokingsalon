<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    
<h2 class="mb-4">Halo Admin</h2>

  <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mb-3">
    Logout
  </a>
  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
  </form>

  <h3 class="mb-3">Daftar Pemesanan</h3>
  <div class="table-responsive">
    <table class="table table-bordered table-hover text-center align-middle">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>No. Telepon</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Layanan</th>
          <th>Status Pembayaran</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="booking-data">
        <tr><td colspan="8">Memuat data...</td></tr>
      </tbody>
    </table>
  </div>

  <!-- Modal Edit -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="editForm" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Pemesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editId">
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" id="editNama" required>
          </div>
          <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="editTelepon" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="editTanggal" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Jam</label>
            <input type="time" class="form-control" id="editJam" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Layanan</label>
            <select class="form-select" id="editLayanan" required>
              <option value="">-- Pilih Layanan --</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>

<div class="table-responsive">
  <table class="table table-bordered table-hover text-center align-middle">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>No. Telepon</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Layanan</th>
        <th>Status Pembayaran</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->nama_pelanggan }}</td>
        <td>{{ $row->no_telepon }}</td>
        <td>{{ $row->tanggal }}</td>
        <td>{{ $row->jam }}</td>
        <td>{{ $row->layanan->nama ?? '-' }}</td>
        <td>
          @if($row->status_pembayaran === 'diterima')
            <span class="badge bg-success">Diterima</span>
          @else
            <span class="badge bg-warning text-dark">Menunggu</span>
          @endif
        </td>
        <td>
          @if($row->status_pembayaran !== 'diterima')
          <form method="POST" action="{{ route('admin.konfirmasi', $row->id) }}">
            @csrf
            <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
          </form>
          @else
            <span class="text-muted">✔</span>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

  </div>
</body>
