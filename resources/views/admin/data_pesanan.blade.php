<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesanan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Kalau pakai Vite --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container-fluid d-flex flex-row row">
    @include('partials.sidebaradmin')

    <!-- Main Content -->
    <div class="col-10 mt-4">
        <div class="flex justify-between">
            <h3 class="mb-3">Daftar Pemesanan</h3>
            <form method="GET" action="{{ route('admin.pesanan') }}" class="d-flex align-items-center mb-3">
                <select name="bulan" class="form-select" onchange="this.form.submit()">
                    @for ($i = 0; $i < 12; $i++)
                        @php
                            $monthValue = now()->subMonths($i)->format('Y-m');
                            $monthLabel = now()->subMonths($i)->translatedFormat('F Y');
                        @endphp
                        <option value="{{ $monthValue }}"
                            {{ isset($bulan) && $bulan == $monthValue ? 'selected' : '' }}>
                            {{ $monthLabel }}
                        </option>
                    @endfor
                </select>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Layanan</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pemesanan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->booking_date }}</td>
                            <td>{{ $item->booking_time }}</td>
                            <td class="text-start">
                                <div class="d-flex flex-column gap-1">
                                    @foreach ($item->layanan as $service)
                                        <span>{{ $service->name }}, Rp{{ number_format($service->price) }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <span
                                    class="badge p-2 
                                    @if ($item->status == 'pending') bg-warning text-dark
                                    @elseif($item->status == 'approved') bg-primary
                                    @elseif($item->status == 'paid') bg-success
                                    @else bg-danger @endif">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>Rp{{ number_format($item->total_price) }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->id }}">Edit</button>

                                <!-- Tombol Hapus -->
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $item->id }}">Hapus</button>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-edit-pemesanan" data-id="{{ $item->id }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit
                                                        Pemesanan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label>Nama</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $item->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>No. Telepon</label>
                                                        <input type="text" name="phone_number" class="form-control"
                                                            value="{{ $item->phone_number }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Tanggal</label>
                                                        <input type="date" name="booking_date" class="form-control"
                                                            value="{{ $item->booking_date }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Jam</label>
                                                        <input type="time" name="booking_time" class="form-control"
                                                            value="{{ $item->booking_time }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Status</label>
                                                        <select name="status" class="form-select">
                                                            <option value="pending"
                                                                {{ $item->status == 'pending' ? 'selected' : '' }}>
                                                                Pending</option>
                                                            <option value="approved"
                                                                {{ $item->status == 'approved' ? 'selected' : '' }}>
                                                                Approved</option>
                                                            <option value="rejected"
                                                                {{ $item->status == 'rejected' ? 'selected' : '' }}>
                                                                Rejected</option>
                                                            <option value="paid"
                                                                {{ $item->status == 'paid' ? 'selected' : '' }}>
                                                                Paid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form class="form-delete-pemesanan" data-id="{{ $item->id }}">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
                                                        Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus pemesanan
                                                    <strong>{{ $item->name }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">Tidak ada data pemesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.cetak') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm font-semibold text no-underline">
                Cetak
            </a>
        </div>
    </div>
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // === UPDATE PEMESANAN ===
        document.querySelectorAll('.form-edit-pemesanan').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const id = this.dataset.id;
                const formData = new FormData(this);

                const data = {};
                formData.forEach((value, key) => {
                    data[key] = value;
                });

                fetch(`/admin/pesanan/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert('Gagal update: ' + JSON.stringify(data.errors));
                        }
                    })
                    .catch(err => alert('Error: ' + err.message));
            });
        });

        // === DELETE PEMESANAN ===
        document.querySelectorAll('.form-delete-pemesanan').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const id = this.dataset.id;

                fetch(`/admin/pesanan/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            location.reload(); // Atau hapus <tr> langsung
                        } else {
                            alert('Gagal hapus: ' + data.message);
                        }
                    })
                    .catch(err => alert('Error: ' + err.message));
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
