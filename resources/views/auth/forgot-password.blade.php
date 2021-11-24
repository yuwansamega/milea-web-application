<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/img/Logo-only.png" width="100" alt="">

                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
            </a>
        </x-slot>

        <div class="mb-4 text-justify text-sm text-gray-600">
            {{ __('Lupa kata sandi? Silakan masukkan email akun terdaftar anda dibawah. Sistem akan mengirimkan pesan tautan otomatis melalui email anda.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Alamat E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button style="background-color: #11543cda">
                    {{ __('Kirim') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
