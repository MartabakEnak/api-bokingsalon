<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bayar Sekarang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Konfigurasi warna kustom untuk Tailwind
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        maroon: '#6B0606',
                    }
                }
            }
        }
    </script>

    <!-- Midtrans Snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md text-center border-4 border-maroon">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Konfirmasi Pembayaran</h1>
        <p class="text-gray-600 mb-2">ID Pesanan: <span class="font-semibold">#{{ $pesanan->id }}</span></p>
        <p class="text-gray-700 text-lg mb-6">Total yang harus dibayar:</p>
        <p class="text-3xl font-bold text-green-600 mb-8">Rp {{ number_format($pesanan->layanan->harga) }}</p>

        <button id="pay-button" class="bg-maroon hover:bg-red-800 text-white px-6 py-3 rounded-xl shadow transition">
            Bayar Sekarang
        </button>

        <p class="text-xs text-gray-400 mt-6">Kamu akan diarahkan ke halaman pembayaran yang aman.</p>
    </div>

    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    alert("Pembayaran sukses!");
                    window.location.href = "/riwayat";
                },
                onPending: function(result){
                    alert("Menunggu pembayaran...");
                },
                onError: function(result){
                    alert("Pembayaran gagal!");
                },
                onClose: function(){
                    alert("Kamu belum menyelesaikan pembayaran.");
                }
            });
        });
    </script>
</body>
</html>
