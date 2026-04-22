@extends('layouts.user')

@section('title', 'Konfirmasi Peminjaman')

@section('content')

    {{-- Breadcrumb --}}
    <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500">
        <a class="hover:text-[#002045] font-medium transition-colors flex items-center gap-1" href="/user/ajukan-detail">
            <span class="material-symbols-outlined text-base">arrow_back</span> Kembali ke Detail
        </a>
    </nav>

    {{-- Stepper --}}
    <div class="mb-12 max-w-3xl mx-auto">
        <div class="flex items-center justify-between relative">
            <div class="absolute top-1/2 left-0 w-full h-1 bg-[#002045] -translate-y-1/2 z-0"></div>

            <div class="relative z-10 flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-md">
                    <span class="material-symbols-outlined text-[20px]">check</span>
                </div>
                <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Pilih Ruangan</span>
            </div>

            <div class="relative z-10 flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-md">
                    <span class="material-symbols-outlined text-[20px]">check</span>
                </div>
                <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Isi Detail</span>
            </div>

            <div class="relative z-10 flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-lg ring-4 ring-white">3</div>
                <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Konfirmasi</span>
            </div>
        </div>
    </div>

    {{-- Header --}}
    <div class="mb-8">
        <h2 class="font-headline text-3xl font-extrabold text-[#002045] mb-2">Konfirmasi Peminjaman</h2>
        <p class="text-slate-500 max-w-lg leading-relaxed text-sm">
            Tinjau kembali detail permohonan sebelum mengirimkannya ke pihak administrasi.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        {{-- Kiri: Detail --}}
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-blue-700 bg-blue-50 px-2.5 py-1 rounded border border-blue-100">Summary</span>
                        <h3 class="font-headline text-2xl font-bold mt-4 text-[#002045]">Ruang Teater</h3>
                        <p class="text-sm text-slate-500 mt-1">Gedung Utama (Rektorat) Lt. 1</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Booking ID</p>
                        <p class="font-mono text-sm text-[#002045] font-bold">#REQ-DRAFT</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 py-6 border-t border-b border-slate-100">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Tanggal</p>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-slate-400 text-lg">calendar_today</span>
                            <p class="text-sm font-semibold text-slate-800">Selasa, 24 Oktober 2026</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Waktu</p>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-slate-400 text-lg">schedule</span>
                            <p class="text-sm font-semibold text-slate-800">10:00 - 11:00 WIB</p>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Keperluan</p>
                        <p class="text-sm leading-relaxed text-slate-700">
                            Praktikum Algoritma Lanjut. Estimasi peserta 40 orang.
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-slate-600">person</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Penanggung Jawab</p>
                        <p class="text-sm font-bold text-[#002045]">Ahmad Fauzi (2010411032)</p>
                    </div>
                </div>
            </div>

            {{-- Info Box --}}
            <div class="bg-blue-50 p-6 rounded-xl flex gap-4 items-start border border-blue-100">
                <span class="material-symbols-outlined text-blue-700 mt-0.5">verified_user</span>
                <div>
                    <p class="text-sm font-bold text-blue-900 mb-1">Catatan Penting</p>
                    <p class="text-xs text-blue-800/80 leading-relaxed">
                        Kamu akan mendapat notifikasi setelah permohonan disetujui atau ditolak.
                        Pastikan surat permohonan sudah ditandatangani oleh pihak terkait.
                    </p>
                </div>
            </div>
        </div>

        {{-- Kanan: Aksi --}}
        <div class="lg:col-span-4 sticky top-24">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 space-y-5">

                {{-- Foto --}}
                <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden group">
                    <img alt="Ruang Teater"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=600&q=80">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#002045]/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 flex items-center gap-2 text-white">
                        <span class="material-symbols-outlined text-sm">location_on</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Rektorat Lt. 1</span>
                    </div>
                </div>

                {{-- File --}}
                <div class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-lg">
                    <div class="w-8 h-8 rounded bg-red-50 flex items-center justify-center text-red-500 shrink-0">
                        <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                    </div>
                    <div class="overflow-hidden flex-1">
                        <p class="text-xs font-bold text-[#002045] truncate">Surat Peminjaman.pdf</p>
                        <p class="text-[10px] text-slate-500">386 KB</p>
                    </div>
                    <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                </div>

                {{-- Tombol --}}
                <div class="space-y-3 pt-2 border-t border-slate-100">
                    <a href="/user/dashboard"
                       class="w-full bg-primary-gradient text-white font-headline font-bold py-3.5 rounded-xl flex items-center justify-center gap-2 hover:shadow-lg active:scale-[0.98] transition-all">
                        Kirim Permohonan
                        <span class="material-symbols-outlined text-lg">send</span>
                    </a>
                    <a href="/user/ajukan-detail"
                       class="w-full flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-bold py-3.5 rounded-xl hover:bg-slate-50 transition-colors">
                        Kembali Edit
                    </a>
                </div>

                <p class="text-[10px] text-center text-slate-400 italic">
                    Dengan menekan Kirim, Anda menyetujui syarat & ketentuan penggunaan ruangan.
                </p>
            </div>
        </div>

    </div>

@endsection
