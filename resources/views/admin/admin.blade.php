<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="container py-4">
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
          <th>No. Antrean</th>
          <th>Nama</th>
          <th>No. Telepon</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Layanan</th>
          <th>Status Pengerjaan</th>
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

  <script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.addEventListener('DOMContentLoaded', function () {
      const tbody = document.getElementById('booking-data');
      const editModal = new bootstrap.Modal(document.getElementById('editModal'));

      function fetchData() {
        fetch('/api/bookings')
          .then(res => res.json())
          .then(data => {
            tbody.innerHTML = '';
            if (data.length === 0) {
              tbody.innerHTML = '<tr><td colspan="8">Tidak ada data pemesanan.</td></tr>';
              return;
            }

            data.forEach((row, index) => {
              const layanan = row.layanan?.nama ?? '-';
              const layanan_id = row.layanan?.id ?? '';
              const status = row.status_pembayaran === 'diterima'
                ? '<span class="badge bg-success">Diterima</span>'
                : '<span class="badge bg-warning text-dark">Menunggu</span>';

              tbody.innerHTML +=
                <tr>
                  <td>${index + 1}</td>
                  <td>
  ${
    row.status_pembayaran !== 'diterima'
      ? '<span class="text-muted">Belum menyelesaikan pembayaran</span>'
      : row.status_pengerjaan === 'selesai'
        ? '<span class="badge bg-success">Selesai</span>'
        : <span class="fw-bold">${row.no_antrean ?? '-'}</span>
  }
</td>

                  <td>${row.nama_pelanggan}</td>
                  <td>${row.no_telepon}</td>
                  <td>${row.tanggal}</td>
                  <td>${row.jam}</td>
                  <td>${layanan}</td>
                  <td>${row.status_pengerjaan ?? '<span class="text-muted"> - </span>'}</td>
                  <td>${status}</td>
                  <td>
                    <button class="btn btn-warning btn-sm mb-1" onclick="showEdit(${row.id}, '${row.nama_pelanggan}', '${row.no_telepon}', '${row.tanggal}', '${row.jam}', '${layanan_id}')">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteBooking(${row.id})">Hapus</button>
                     ${row.status_pembayaran !== 'diterima' ? <button class="btn btn-success btn-sm" onclick="confirmPayment(${row.id})">Konfirmasi</button> : ''}
                      ${(row.status_pembayaran === 'diterima' && row.status_pengerjaan !== 'selesai') ?
    <button class="btn btn-primary btn-sm" onclick="markAsDone(${row.id})">Selesai</button>
    : ''}
                  </td>
                </tr>;
            });
          })
          .catch(err => {
            console.error('Gagal memuat data:', err);
            tbody.innerHTML = '<tr><td colspan="8">Terjadi kesalahan saat memuat data.</td></tr>';
          });
      }

      function loadLayanan() {
        fetch('/api/layanan')
          .then(res => res.json())
          .then(data => {
            const select = document.getElementById('editLayanan');
            select.innerHTML = '<option value="">-- Pilih Layanan --</option>';
            data.forEach(l => {
              select.innerHTML += <option value="${l.id}">${l.nama}</option>;
            });
          });
      }

      window.showEdit = function (id, nama, telepon, tanggal, jam, layanan_id) {
        document.getElementById('editId').value = id;
        document.getElementById('editNama').value = nama;
        document.getElementById('editTelepon').value = telepon;
        document.getElementById('editTanggal').value = tanggal;
        document.getElementById('editJam').value = jam;
        document.getElementById('editLayanan').value = layanan_id;
        editModal.show();
      }

      document.getElementById('editForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const id = document.getElementById('editId').value;
        fetch(/api/bookings/${id}, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
          body: JSON.stringify({
            nama_pelanggan: document.getElementById('editNama').value,
            no_telepon: document.getElementById('editTelepon').value,
            tanggal: document.getElementById('editTanggal').value,
            jam: document.getElementById('editJam').value,
            layanan_id: document.getElementById('editLayanan').value
          })
        })
          .then(res => {
            if (!res.ok) throw new Error('Gagal mengupdate');
            return res.json();
          })
          .then(() => {
            editModal.hide();
            fetchData();
            alert('Berhasil mengupdate data');
          })
          .catch(err => alert('Error saat update: ' + err));
      });

      window.deleteBooking = function (id) {
        if (confirm('Yakin ingin menghapus pemesanan ini?')) {
          fetch(/api/bookings/${id}, {
            method: 'DELETE',
            headers: {
              'Accept': 'application/json',
              'X-CSRF-TOKEN': csrfToken
            }
          })
            .then(res => {
              if (!res.ok) throw new Error('Gagal menghapus');
              return res.json();
            })
            .then(() => {
              fetchData();
              alert('Data berhasil dihapus');
            })
            .catch(err => alert('Gagal menghapus: ' + err));
        }
      }
      window.confirmPayment = function (id) {
  if (confirm('Konfirmasi pembayaran untuk pemesanan ini?')) {
    fetch(/api/konfirmasi/${id}, {
  method: 'PUT',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'X-CSRF-TOKEN': csrfToken
  }
    })
    .then(res => {
      if (!res.ok) throw new Error('Gagal konfirmasi');
      return res.json();
    })
    .then(() => {
      fetchData(); // Refresh data
      alert('Status pembayaran telah dikonfirmasi.');
    })
    .catch(err => alert('Error saat konfirmasi: ' + err));
  }
}

      loadLayanan();
      fetchData();
    });
    function markAsDone(id) {
    if (!confirm("Apakah kamu yakin ingin menyelesaikan pesanan ini?")) return;

    fetch(/selesai/${id}, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            location.reload();
        } else {
            alert("Gagal menyelesaikan (no message)");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Error: Gagal menyelesaikan");
    });
}
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
