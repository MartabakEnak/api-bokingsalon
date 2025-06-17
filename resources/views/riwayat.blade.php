<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-pink-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Salon Cantik</h1>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Beranda</a></li>
                <li><a href="/layanan" class="hover:underline">Layanan</a></li>
                <li><a href="/riwayat" class="underline font-semibold">Riwayat</a></li>
            </ul>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Riwayat Pemesanan Anda</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-pink-500 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama Layanan</th>
                        <th class="py-3 px-6 text-left">Tanggal</th>
                        <th class="py-3 px-6 text-left">Jam</th>
                        <th class="py-3 px-6 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
    @php $no = 1; @endphp

    @isset($pemesanan)
        @forelse ($pemesanan as $item)
            <tr class="border-b hover:bg-pink-50">
                <td class="py-3 px-6">{{ $no++ }}</td>
                <td class="py-3 px-6">{{ $item->layanan->nama }}</td>
                <td class="py-3 px-6">{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                <td class="py-3 px-6">{{ $item->jam }}</td>
                <td class="py-3 px-6">
                    <span class="px-3 py-1 rounded-full text-sm font-medium
                        {{ $item->status == 'selesai' ? 'bg-green-100 text-green-800' :
                           ($item->status == 'batal' ? 'bg-red-100 text-red-800' :
                           'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-5 text-gray-500">Belum ada pemesanan.</td>
            </tr>
        @endforelse
    @else
        <tr>
            <td colspan="5" class="text-center py-5 text-gray-500">
                Anda harus login terlebih dahulu untuk melihat riwayat pemesanan.
            </td>
        </tr>
    @endisset
</tbody>

            </table>
        </div>
    </div>

</body>
</html>
