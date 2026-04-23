@extends('layouts.auth')

@section('title', 'Instruksi Pemulihan Dikirim')
@section('icon', 'mark_email_unread') 
@section('card_title', 'Instruksi Pemulihan Dikirim')
@section('card_subtitle', 'Tautan untuk mengatur ulang kata sandi telah dikirim.')

@section('content')
    <div class="text-center space-y-8">
        
        {{-- Pesan Informasi --}}
        <p class="text-slate-600 text-sm leading-relaxed px-2">
            Kami telah mengirimkan email instruksi pemulihan kata sandi ke alamat email Anda. Silakan periksa kotak masuk atau folder <strong class="text-[#002045]">spam</strong> Anda.
        </p>

        {{-- Tombol Aksi & Link Subtext --}}
        <div class="space-y-5 pt-2">
            
            <a href="/login"
               class="w-full py-3.5 bg-gradient-to-r from-[#002045] to-[#1a365d] text-white rounded-xl font-bold text-sm tracking-wide hover:opacity-90 hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2 group">
                Kembali ke Login
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>

            {{-- Link Kirim Ulang --}}
            <div class="pt-5 border-t border-slate-100">
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