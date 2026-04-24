@extends('layouts.user')

@section('title', 'Detail Peminjaman')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

    {{-- Kiri: Informasi Peminjaman --}}
    <div class="lg:col-span-7">
        <div class="bg-white rounded-xl p-8 shadow-sm border border-slate-200">

            <div class="flex justify-between items-start mb-10">
                <div>
                    <h2 class="text-2xl font-extrabold text-[#002045] font-headline tracking-tight mb-1">
                        Informasi Peminjaman
                    </h2>
                    <p class="text-sm text-slate-500">Dibuat pada 20 Okt 2026 • ID #REQ-DRAFT</p>
                </div>

                <span class="px-4 py-1.5 rounded-full bg-emerald-100 text-emerald-700 font-bold text-xs tracking-wider uppercase">
                    Disetujui
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Ruangan</p>
                    <p class="font-bold text-slate-900">Ruang Teater - Gedung A</p>
                    <p class="text-xs text-slate-500 mt-1">Gedung Utama (Rektorat) Lt. 1</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Tanggal & Waktu</p>
                    <p class="font-bold text-slate-900">Selasa, 24 Oktober 2026</p>
                    <p class="text-xs text-slate-500 mt-1">10:00 - 11:00 WIB</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Nama Kegiatan</p>
                    <p class="font-bold text-[#002045] text-lg">Workshop Pemrograman</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Estimasi Peserta</p>
                    <p class="font-bold text-slate-900">40 Orang</p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Keperluan</p>
                    <p class="text-slate-700 leading-relaxed bg-slate-50 p-4 rounded-lg border border-slate-100">
                        Praktikum Algoritma Lanjut
                    </p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Penanggung Jawab</p>
                    <p class="font-bold text-slate-900">Ahmad Fauzi (2010411032)</p>
                </div>

            </div>
        </div>
    </div>

    {{-- Kanan: Surat Permohonan --}}
    <div class="lg:col-span-5">
        <div class="bg-white border border-slate-200 rounded-xl p-8 sticky top-24 shadow-sm">

            <div class="flex items-center gap-3 mb-6">
                <span class="material-symbols-outlined text-[#002045] text-3xl">description</span>
                <h3 class="text-lg font-bold text-[#002045] font-headline">Dokumen Lampiran</h3>
            </div>

            <div class="aspect-[3/4] bg-slate-50 rounded-lg overflow-hidden mb-6 border border-slate-200 flex flex-col items-center justify-center p-6 text-center">
                <div class="w-16 h-16 bg-white shadow-sm rounded-full flex items-center justify-center mb-4 text-red-600">
                    <span class="material-symbols-outlined text-4xl">picture_as_pdf</span>
                </div>

                <p class="font-bold text-[#002045] mb-1">Surat Peminjaman.pdf</p>
                <p class="text-xs text-slate-500">386 KB</p>
            </div>

            <div class="space-y-3">
                <button class="w-full py-3 px-4 rounded-lg border-2 border-[#002045] text-[#002045] font-bold flex items-center justify-center gap-2 hover:bg-[#002045]/5 transition-colors">
                    <span class="material-symbols-outlined text-xl">download</span>
                    Unduh Dokumen
                </button>

                <button class="w-full py-3 px-4 rounded-lg bg-primary-gradient text-white font-bold flex items-center justify-center gap-2 hover:opacity-90">
                    <span class="material-symbols-outlined text-xl">print</span>
                    Cetak Bukti
                </button>
            </div>

        </div>
    </div>

</div>

{{-- Info Box --}}
<div class="mt-8 p-6 bg-blue-50 rounded-2xl border border-blue-100">
    <div class="flex gap-4">
        <span class="material-symbols-outlined text-blue-700 mt-0.5">lightbulb</span>
        <p class="text-xs leading-relaxed text-blue-800/80">
            Harap tunjukkan bukti persetujuan ini kepada petugas keamanan saat tiba
            di lokasi untuk mendapatkan akses masuk ruangan.
        </p>
    </div>
</div>

@endsection
