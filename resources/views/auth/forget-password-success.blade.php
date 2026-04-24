@extends('layouts.auth')

@section('title', 'Email Terkirim')
@section('icon', 'mark_email_unread')
@section('card_title', 'Periksa Email Anda')
@section('card_subtitle', 'Instruksi pemulihan kata sandi telah dikirim')

@section('content')
    <div class="text-center space-y-8">

        {{-- Pesan Informasi --}}
        <div class="space-y-3">
            <p class="text-slate-700 text-sm leading-relaxed px-2">
                Silakan periksa kotak masuk atau folder <strong class="text-slate-600">spam</strong> Anda. Tautan akan kedaluwarsa dalam <strong class="text-slate-600">5 menit</strong>.
            </p>
        </div>

        {{-- Tombol Aksi --}}
        <div class="space-y-3 pt-2">
            <a href="/login"
               class="w-full py-3.5 bg-gradient-to-r from-[#002045] to-[#1a365d] text-white rounded-xl font-bold text-sm tracking-wide hover:opacity-90 hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2 group">
                Kembali ke Halaman Masuk
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>

            {{-- Link Kirim Ulang --}}
            <div class="pt-4 border-t border-slate-100">
                <p class="text-xs text-slate-500">
                    Tidak menerima email?
                    <a href="/forget-password" class="text-[#002045] font-bold hover:underline transition-all">
                        Kirim ulang
                    </a>
                </p>
            </div>
        </div>

    </div>
@endsection
