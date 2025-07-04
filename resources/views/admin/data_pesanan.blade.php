<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pemesanan</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid d-flex flex-row row">
  @include('partials.sidebaradmin')

  <!-- Main Content -->
  <div class="col-10 mt-4">
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
                      <th>Status Pengerjaan</th>
                      <th>Status Pembayaran</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($pemesanans as $index => $item)
                  <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $item->nama_pelanggan }}</td>
                      <td>{{ $item->no_telepon }}</td>
                      <td>{{ $item->tanggal }}</td>
                      <td>{{ $item->jam }}</td>
                      <td>{{ $item->layanan->nama ?? '-' }}</td>
                      <td>{{ $item->status_pengerjaan ?? '-' }}</td>
                      <td>
                          @if ($item->status_pembayaran === 'diterima')
                              <span class="badge bg-success">Diterima</span>
                          @else
                              <span class="badge bg-warning text-dark">Menunggu</span>
                          @endif
                      </td>
                      <td>
                          <!-- Tombol aksi bisa ditambahkan di sini -->
                          <!-- Tombol Edit -->
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

                            <!-- Tombol Hapus -->
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">Hapus</button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="{{ route('admin.pesanan.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Pemesanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Nama</label>
                                        <input type="text" name="nama_pelanggan" class="form-control" value="{{ $item->nama_pelanggan }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>No. Telepon</label>
                                        <input type="text" name="no_telepon" class="form-control" value="{{ $item->no_telepon }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Jam</label>
                                        <input type="time" name="jam" class="form-control" value="{{ $item->jam }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Status Pengerjaan</label>
                                        <input type="text" name="status_pengerjaan" class="form-control" value="{{ $item->status_pengerjaan }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Status Pembayaran</label>
                                        <select name="status_pembayaran" class="form-select">
                                        <option value="menunggu" {{ $item->status_pembayaran == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="diterima" {{ $item->status_pembayaran == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <form action="{{ route('admin.pesanan.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus pemesanan <strong>{{ $item->nama_pelanggan }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
  </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
