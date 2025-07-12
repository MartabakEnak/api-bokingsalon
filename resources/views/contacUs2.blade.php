<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Salon Asih</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo_login.png') }}">

    <!-- CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/last.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    @include('partials.navbarlogin')

    <!-- Hero Title -->
    <div class="hero bg-white">
        <h1>contac us</h1>

    </div>
    <div class="hero-image-wrapper mx-0 px-0">
        <img src="{{ asset('assets/img/heroaboutUs.png') }}" alt="hero-image" class="w-100 d-block">
    </div>


    <!-- location -->

    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <div class="col-md-3 d-flex align-items-stretch">
                <a class="text-amber-900 text-decoration-none" href="https://maps.app.goo.gl/DcwwWKAL8tERh1CU9"
                    style="display: block;" target="_blank">
                    <div class="info-box w-100 h-100">
                        <i class="bi bi-geo-alt-fill"></i>
                        <p class="mb-0"><a class="text-amber-900 text-decoration-none"
                                href="https://maps.app.goo.gl/DcwwWKAL8tERh1CU9" target="_blank">Jln. Pulau Bungin
                                No.113</a></p>
                        <p class="mb-0"><a class="text-amber-900 text-decoration-none"
                                href="https://maps.app.goo.gl/DcwwWKAL8tERh1CU9" target="_blank">Denpasar Selatan</p>
                    </div>
                </a>
            </div>
            <!-- email -->
            <div class="col-md-3 d-flex align-items-stretch">
                <a class="text-amber-900 text-decoration-none"
                    href="https://mail.google.com/mail/?view=cm&fs=1&to=salonasih1991@gmail.com&su=&body=Halo,%0A%0ATerima%20kasih%20atas%20pertanyaan%20Anda."
                    target="_blank" style="display: block;">
                    <div class="info-box w-100 h-100">
                        <i class="bi bi-envelope-fill"></i>
                        <p class="mb-0"><a class="text-amber-900 text-decoration-none"
                                href="mailto:salonasih1991@gmail.com.com?subject=Subjek%20Pesan&body=Halo,%0A%0ATerima%20kasih%20atas%20pertanyaan%20Anda.">SalonAsih@gmail.com</a>
                        </p>
                    </div>
                </a>
            </div>
            <!-- whatsapp -->
            <div class="col-md-3 d-flex align-items-stretch">
                <a href="https://wa.me/6285739589921?text=Terimakasih%20sudah%20menghubungi%20kami!%0ASilahkan%20bertanya%20mengenai%20reservasi%20booking%20atau%20berkonsultasi%20dengan%20admin%20kami!"
                    target="_blank" class="text-decoration-none" style="display: block;">
                    <div class="info-box w-100 h-100">
                        <i class="bi bi-whatsapp"></i>
                        <p>
                            <a class="text-amber-900 text-decoration-none" class="mb-0">Klik Disni</a>
                        </p>
                    </div>
                    </https:>
            </div>
        </div>
    </div>

    <!-- Promo Banner -->
    <div class="promo-banner">
        <h2>Jadilah Member, Dapatkan Harga Spesial!</h2>
        <p>Daftar atau login untuk menikmati promo eksklusif dari Salon Asih.</p>
    </div>

    <!-- Booking Section -->
    <div class="container booking-box-wrapper spacing-before-footer">
        <div class="container booking-box-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-10 booking-box">
                    <div class="row align-items-center">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('pemesanan.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="block font-medium">Nama</label>
                                <input type="text" name="name" class="w-full border rounded p-2" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium">Nomor HP</label>
                                <input type="text" name="phone_number" class="w-full border rounded p-2" required>
                            </div>

                            <div class="mt-4">
                                <label for="booking_date" class="block font-medium">Tanggal</label>
                                <input type="date" name="booking_date" id="booking_date"
                                    class="w-full border rounded p-2" required>
                            </div>

                            <div class="mt-4">
                                <label class="block font-medium mb-2">Pilih Jam</label>
                                <div id="jamPilihan" class="grid grid-cols-4 gap-2">
                                    @for ($i = 8; $i <= 18; $i++)
                                        @php $jam = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00'; @endphp
                                        <button type="button"
                                            class="jam-btn px-3 py-2 rounded bg-gray-200 text-gray-800 hover:bg-blue-200"
                                            data-jam="{{ $jam }}">
                                            {{ $jam }}
                                        </button>
                                    @endfor
                                </div>
                                <input type="hidden" name="booking_time" id="booking_time">
                                <div class="mt-2 text-sm text-red-600 hidden" id="jamError">Pilih jam terlebih dahulu
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block font-medium">Pilih Layanan</label>
                                <select id="layananSelect" class="w-full border rounded p-2 mt-1">
                                    <option value="" disabled selected>Pilih layanan</option>
                                    @foreach ($categories as $kategori)
                                        <optgroup label="{{ $kategori->name }}">
                                            @foreach ($kategori->layanan as $service)
                                                <option value="{{ $service->id }}" data-name="{{ $service->name }}"
                                                    data-price="{{ $service->price }}"
                                                    data-duration="{{ $service->duration }}">
                                                    {{ $service->name }} - Rp{{ number_format($service->price) }}
                                                    ({{ $service->duration }} menit)
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <div id="selectedLayananContainer" class="mt-4">
                                <h4 class="font-semibold mb-2">Layanan Dipilih:</h4>
                                <ul id="selectedLayananList" class="space-y-2 pl-0 list-none"></ul>
                                <div class="mt-2 font-bold">
                                    Total Harga: Rp<span id="totalHarga">0</span>
                                </div>
                            </div>

                            <button type="submit" class="mt-6 px-4 py-2 bg-red-800 text-white rounded">Booking
                                Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const layananSelect = document.getElementById('layananSelect');
        const layananList = document.getElementById('selectedLayananList');
        const totalHargaEl = document.getElementById('totalHarga');

        let selectedLayanan = [];
        let totalHarga = 0;

        layananSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const id = selectedOption.value;
            const name = selectedOption.dataset.name;
            const price = parseInt(selectedOption.dataset.price);
            const duration = selectedOption.dataset.duration;

            if (!id || selectedLayanan.includes(id)) return;

            selectedLayanan.push(id);
            totalHarga += price;
            updateTotalHarga();

            const li = document.createElement('li');
            li.classList.add("border", "p-2", "rounded", "flex", "justify-between", "items-center", "bg-gray-100");
            li.setAttribute('data-id', id);
            li.innerHTML = `
        <div>
            <input type="hidden" name="layanan[]" value="${id}">
            <div class="font-medium">${name}</div>
            <div class="text-sm text-gray-600">Rp${price.toLocaleString()} - ${duration} menit</div>
        </div>
        <button type="button" class="text-red-600 font-bold hover:underline" onclick="removeLayanan('${id}', ${price})">Hapus</button>
    `;

            layananList.appendChild(li);

            selectedOption.remove();
            layananSelect.selectedIndex = 0;
        });


        function removeLayanan(id, price) {
            selectedLayanan = selectedLayanan.filter(item => item !== id);
            totalHarga -= price;
            updateTotalHarga();

            const liToRemove = layananList.querySelector(`li[data-id='${id}']`);
            if (liToRemove) liToRemove.remove();

            // Kembalikan option ke select
            @foreach ($categories as $kategori)
                @foreach ($kategori->layanan as $service)
                    if ("{{ $service->id }}" === id) {
                        const option = document.createElement('option');
                        option.value = "{{ $service->id }}";
                        option.textContent =
                            "{{ $service->name }} - Rp{{ number_format($service->price) }} ({{ $service->duration }} menit)";
                        option.setAttribute('data-name', "{{ $service->name }}");
                        option.setAttribute('data-price', "{{ $service->price }}");
                        option.setAttribute('data-duration', "{{ $service->duration }}");

                        // Tambahkan ke optgroup yang sesuai
                        let group = [...layananSelect.children].find(g => g.label === "{{ $kategori->name }}");
                        if (!group) {
                            group = document.createElement('optgroup');
                            group.label = "{{ $kategori->name }}";
                            layananSelect.appendChild(group);
                        }
                        group.appendChild(option);
                    }
                @endforeach
            @endforeach
        }

        function updateTotalHarga() {
            totalHargaEl.textContent = totalHarga.toLocaleString();
        }
    </script>
    <script>
        const jamButtons = document.querySelectorAll('.jam-btn');
        const bookingDateInput = document.getElementById('booking_date');
        const bookingTimeInput = document.getElementById('booking_time');
        const jamError = document.getElementById('jamError');

        let selectedJam = null;

        bookingDateInput.addEventListener('change', function() {
            const tanggal = this.value;
            if (!tanggal) return;

            fetch(`/api/jam-terbooking?tanggal=${tanggal}`)
                .then(response => response.json())
                .then(bookedTimes => {
                    jamButtons.forEach(btn => {
                        const jam = btn.getAttribute('data-jam');
                        btn.disabled = bookedTimes.includes(jam);
                        btn.classList.remove('bg-blue-500', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-800');
                        if (btn.disabled) {
                            btn.classList.add('opacity-50', 'cursor-not-allowed');
                        } else {
                            btn.classList.remove('opacity-50', 'cursor-not-allowed');
                        }
                    });

                    // Reset input dan error
                    bookingTimeInput.value = '';
                    selectedJam = null;
                    jamError.classList.add('hidden');
                });
        });

        jamButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                if (btn.disabled) return;

                jamButtons.forEach(b => {
                    b.classList.remove('bg-blue-500', 'text-white');
                    b.classList.add('bg-gray-200', 'text-gray-800');
                });

                btn.classList.remove('bg-gray-200', 'text-gray-800');
                btn.classList.add('bg-blue-500', 'text-white');

                selectedJam = btn.getAttribute('data-jam');
                bookingTimeInput.value = selectedJam;
                jamError.classList.add('hidden');
            });
        });

        // Validasi submit jika belum pilih jam
        document.querySelector('form').addEventListener('submit', function(e) {
            if (!bookingTimeInput.value) {
                e.preventDefault();
                jamError.classList.remove('hidden');
            }
        });
    </script>


    @include('partials.footer')
</body>

</html>
