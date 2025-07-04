<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <x-slot name="logo">
            <a href="/">
                <img src="/logo.png" class="w-20 h-20" />
            </a>
        </x-slot>

        @if (session('error'))
            <div class="mb-4 text-red-600">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf

            <div class="mt-4">
                <label for="otp">Kode OTP</label>
                <input id="otp" class="block mt-1 w-full" type="text" name="otp" required autofocus>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="ml-4 btn btn-primary">Verifikasi</button>
            </div>
        </form>
    </div>
</x-guest-layout>
