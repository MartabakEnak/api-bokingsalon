<!DOCTYPE html>
<html>
<head>
    <title>Bayar Sekarang</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h2>Pesanan #{{ $pesanan->id }}</h2>
    <p>Total Bayar: Rp {{ number_format($pesanan->layanan->harga) }}</p>

    <button id="pay-button">Bayar Sekarang</button>

    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    alert("Pembayaran sukses!");
                    window.location.href = "/riwayat"; // redirect setelah sukses
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
