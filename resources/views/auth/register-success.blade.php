@extends('layouts.auth')

@section('title', 'Pendaftaran Berhasil')
@section('icon', 'check_circle') 
@section('card_title', 'Akun Berhasil Dibuat')
@section('card_subtitle', 'Pendaftaran akun baru telah divalidasi.')

@section('content')
    <div class="text-center space-y-8">
        
        {{-- Pesan Sukses --}}
        <p class="text-slate-600 text-sm leading-relaxed px-2">
            Selamat! Akun Anda telah berhasil didaftarkan. Silakan masuk untuk mulai menggunakan layanan <strong class="text-[#002045]">SiPinjam Ruang</strong>.
        </p>

        {{-- Tombol Aksi --}}
        <div class="space-y-5 pt-2">
            <a href="/login"
               class="w-full py-3.5 bg-gradient-to-r from-[#002045] to-[#1a365d] text-white rounded-xl font-bold text-sm tracking-wide hover:opacity-90 hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                Lanjut ke Login
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>

            {{-- Link Bantuan --}}
            <div class="pt-5 border-t border-slate-100">
                <p class="text-xs text-slate-500">
                    Ada kendala? 
                    <a href="#" class="text-[#002045] font-bold hover:underline transition-all">
                        Hubungi IT Support
                    </a>
                </p>
            </div>
        </div>
        
    </div>
@endsection