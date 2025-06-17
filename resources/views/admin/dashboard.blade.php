<head>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Import dari Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <div class="container">
    
    <div class="flex flex-row mt-16">
        <div class="mt-16">
          <h2 class="mb-4">Halo Admin</h2>
        </div>
        <div class="">
          <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mb-3">
            Logout
          </a>
        </div>
    </div>
    

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
  @csrf
</form>
<div class="mx-16">
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

  </div>
</body>