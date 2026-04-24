@extends('layouts.auth')

@section('title', 'Pendaftaran Berhasil')
@section('icon', 'check_circle')
@section('card_title', 'Akun Berhasil Dibuat!')
@section('card_subtitle', '')

@section('content')
    <div class="text-center space-y-8">

        {{-- Pesan Sukses --}}
        <div class="space-y-2">
            <p class="text-slate-700 text-sm leading-relaxed px-2">
                Akun Anda telah berhasil terdaftar di SIMPRU
                Silakan masuk untuk mulai mengajukan peminjaman ruangan.
            </p>
        </div>

        {{-- Tombol Aksi --}}
        <div class="space-y-3 pt-2">
            <a href="/login"
               class="w-full py-3.5 bg-gradient-to-r from-[#002045] to-[#1a365d] text-white rounded-xl font-bold text-sm tracking-wide hover:opacity-90 hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2 group">
                Masuk ke Akun Saya
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>

    </div>
@endsection
