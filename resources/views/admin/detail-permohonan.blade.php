@extends('layouts.admin')

@section('title', 'Detail Permohonan')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        {{-- Kiri: Info Peminjaman --}}
        <div class="lg:col-span-7">
            <div class="bg-white rounded-xl p-8 shadow-sm border border-slate-200">
                <div class="flex justify-between items-start mb-10">
                    <div>
                        <h2 class="text-2xl font-extrabold text-[#002045] font-headline tracking-tight mb-1">Informasi Peminjaman</h2>
                        <p class="text-sm text-slate-500">Dikirim pada 20 Okt 2026 • ID #REQ-20261012-042</p>
                    </div>
                    <span class="px-4 py-1.5 rounded-full bg-amber-100 text-amber-700 font-bold text-xs tracking-wider uppercase">
                        Menunggu
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Nama Peminjam</p>
                        <div class="flex items-center gap-3">
                            <span class="font-bold text-slate-900">Aditya Saputra</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-blue-800 border border-blue-100">Mahasiswa</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Ruangan</p>
                        <p class="font-bold text-slate-900">Lab Komputer 03</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Tanggal</p>
                        <p class="font-bold text-slate-900">24 Okt 2026</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Waktu</p>
                        <p class="font-bold text-slate-900">09:00 — 12:00 WIB</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Nama Kegiatan</p>
                        <p class="font-bold text-[#002045] text-lg">Praktikum Algoritma Lanjut</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Jumlah Peserta</p>
                        <p class="font-bold text-slate-900">40 Orang</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Keperluan</p>
                        <p class="text-slate-700 leading-relaxed bg-slate-50 p-4 rounded-lg border border-slate-100">
                            Kegiatan praktikum mata kuliah rutin untuk program studi Informatika semester 3.
                            Membutuhkan proyektor dan akses internet stabil.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kanan: Surat Permohonan --}}
        <div class="lg:col-span-5">
            <div class="bg-white border border-slate-200 rounded-xl p-8 sticky top-24 shadow-sm">
                <div class="flex items-center gap-3 mb-6">
                    <span class="material-symbols-outlined text-[#002045] text-3xl">description</span>
                    <h3 class="text-lg font-bold text-[#002045] font-headline">Surat Permohonan</h3>
                </div>

                <div class="aspect-[3/4] bg-slate-50 rounded-lg overflow-hidden mb-6 border border-slate-200 flex flex-col items-center justify-center p-6 text-center">
                    <div class="w-16 h-16 bg-white shadow-sm rounded-full flex items-center justify-center mb-4 text-[#002045]">
                        <span class="material-symbols-outlined text-4xl">picture_as_pdf</span>
                    </div>
                    <p class="font-bold text-[#002045] mb-1">Surat Peminjaman Lab.pdf</p>
                    <p class="text-xs text-slate-500">354 KB</p>
                </div>

                <div class="space-y-3">
                    <button class="w-full py-3 px-4 rounded-lg border-2 border-[#002045] text-[#002045] font-bold flex items-center justify-center gap-2 hover:bg-[#002045]/5 transition-colors">
                        <span class="material-symbols-outlined text-xl">download</span> Unduh Surat
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Action Bar --}}
    <div class="fixed bottom-0 right-0 left-64 bg-white/95 backdrop-blur-md px-10 py-4 z-40 border-t border-slate-200 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
        <div class="max-w-[1600px] mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="hidden md:block">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Status Tindakan</p>
                <p class="text-sm font-medium text-slate-900">Tinjauan admin diperlukan</p>
            </div>
            <div class="flex items-center gap-4 w-full md:w-auto">
                <button class="flex-1 md:flex-none px-8 py-3 rounded-lg border border-red-500 text-red-600 font-extrabold hover:bg-red-50 transition-colors">
                    Tolak
                </button>
                <button class="flex-1 md:flex-none px-10 py-3 rounded-lg bg-emerald-600 text-white font-extrabold shadow-md hover:bg-emerald-700 transition-all">
                    Setujui Permohonan
                </button>
            </div>
        </div>
    </div>

    {{-- Spacer agar konten tidak tertutup action bar --}}
    <div class="h-24"></div>

@endsection
