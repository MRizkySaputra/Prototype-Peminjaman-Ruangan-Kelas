@extends('layouts.user')

@section('title', 'Detail Peminjaman')

@section('content')

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm font-medium text-slate-500 mb-8">
        <a href="/user/riwayat" class="hover:text-[#002045] transition-colors">Riwayat Peminjaman</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-[#002045] font-bold">Detail Peminjaman</span>
    </nav>

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-headline font-extrabold text-[#002045] mb-2">Detail: Lab Komputer</h2>
            <p class="text-slate-500 text-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">event_note</span>
                Dibuat pada 20 Okt 2026 • ID #REQ-882755
            </p>
        </div>
        <button class="px-6 py-2.5 text-sm font-bold bg-primary-gradient text-white rounded-lg shadow-md hover:opacity-90 flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">print</span> Cetak Bukti
        </button>
    </div>

    <div class="space-y-6">

        {{-- Info Utama --}}
        <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-100">
                <h3 class="text-lg font-bold text-[#002045] flex items-center gap-2 font-headline">
                    <span class="material-symbols-outlined">info</span> Informasi Utama
                </h3>
                <span class="px-4 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider border border-emerald-200 flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[14px]">check_circle</span> Disetujui
                </span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Ruangan</p>
                    <p class="text-base font-bold text-[#002045]">Lab Komputer Dasar - Gedung B</p>
                    <p class="text-xs text-slate-500 mt-1">Lantai 3, Ruang 304</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Tanggal & Waktu</p>
                    <p class="text-base font-bold text-[#002045]">Selasa, 24 Okt 2026</p>
                    <p class="text-xs text-slate-500 mt-1">08:00 - 11:00 WIB (3 Jam)</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Nama Kegiatan</p>
                    <p class="text-base font-bold text-[#002045]">Praktikum Pemrograman Web</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Deskripsi</p>
                    <p class="text-sm leading-relaxed text-slate-600 bg-slate-50 border border-slate-100 p-4 rounded-xl">
                        Sesi praktikum mandiri untuk mahasiswa tingkat akhir yang sedang mengerjakan tugas besar arsitektur perangkat lunak.
                    </p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Estimasi Peserta</p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="material-symbols-outlined text-slate-400">groups</span>
                        <p class="text-base font-bold text-[#002045]">25 Orang</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dokumen --}}
        <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm">
            <h3 class="text-lg font-bold text-[#002045] flex items-center gap-2 mb-6 font-headline">
                <span class="material-symbols-outlined">description</span> Dokumen Lampiran
            </h3>
            <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-xl hover:bg-blue-50/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-red-50 border border-red-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-red-600 text-xl">picture_as_pdf</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#002045]">Surat Permohonan Lab.pdf</p>
                        <p class="text-[10px] text-slate-400 uppercase tracking-widest mt-0.5 font-bold">PDF • 345 KB</p>
                    </div>
                </div>
                <button class="flex items-center gap-2 px-5 py-2.5 text-xs font-bold text-[#002045] bg-white border border-slate-300 rounded-lg hover:shadow-sm transition-all">
                    <span class="material-symbols-outlined text-sm">download</span> Unduh
                </button>
            </div>
        </div>

        {{-- Info Box --}}
        <div class="p-6 bg-blue-50 rounded-2xl border border-blue-100">
            <div class="flex gap-4">
                <span class="material-symbols-outlined text-blue-700 mt-0.5">lightbulb</span>
                <p class="text-xs leading-relaxed text-blue-800/80">
                    Harap tunjukkan bukti persetujuan ini kepada petugas keamanan saat tiba di lokasi untuk mendapatkan akses masuk ruangan.
                </p>
            </div>
        </div>

    </div>

@endsection
