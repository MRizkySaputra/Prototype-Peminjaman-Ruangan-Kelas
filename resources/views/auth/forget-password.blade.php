@extends('layouts.auth')

@section('title', 'Lupa Kata Sandi')
@section('icon', 'lock_reset')
@section('card_title', 'Lupa Kata Sandi?')
@section('card_subtitle', 'Masukkan email Anda untuk menerima instruksi pemulihan kata sandi')

@section('content')

    <form action="/forgot-password-process" method="POST" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div class="space-y-2">
            <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Alamat Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-outline-color text-xl">mail</span>
                </div>
                <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                       name="email" type="email" placeholder="Masukkan alamat email Anda" required>
            </div>
        </div>

        {{-- Tombol Kirim --}}
        <a href="/forget-password-success" class="w-full bg-primary-gradient text-white font-headline font-bold py-3.5 rounded-lg shadow-md hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
            Kirim Tautan Pemulihan
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
        </a>

        {{-- Kembali ke Login --}}
        <div class="flex justify-end">
            <a href="/login" class="text-sm font-medium text-[#002045] hover:underline">
                Kembali ke halaman masuk
            </a>
        </div>

    </form>

@endsection
