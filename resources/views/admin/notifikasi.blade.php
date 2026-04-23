@extends('layouts.admin')

@section('title', 'Notifikasi Admin')

@section('content')
    <div class="max-w-5xl mx-auto">
        
        {{-- Header Halaman --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <nav class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">
                    <span>Admin</span>
                    <span class="material-symbols-outlined text-[10px]">chevron_right</span>
                    <span class="text-[#002045]">Notifikasi</span>
                </nav>
                <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Notifikasi Sistem</h2>
            </div>
            <button class="flex items-center gap-2 px-6 py-2.5 bg-blue-50 text-[#002045] rounded-lg font-bold text-sm hover:bg-blue-100 transition-colors border border-blue-100">
                <span class="material-symbols-outlined text-sm">done_all</span>
                Tandai Semua Dibaca
            </button>
        </div>

        {{-- Daftar Notifikasi --}}
        <div class="space-y-4">
            
            {{-- Notifikasi Belum Dibaca 1 --}}
            <div class="group relative flex items-start gap-6 p-6 bg-white rounded-xl shadow-sm border border-slate-200 border-l-4 border-l-[#002045] transition-all hover:translate-x-1 hover:shadow-md">
                <div class="mt-1 flex-shrink-0">
                    <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-[#002045]">
                        <span class="material-symbols-outlined">pending_actions</span>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-headline font-bold text-slate-800 text-lg leading-tight">Permohonan Baru: Lab Multimedia A oleh Budi Santoso</h3>
                        <span class="flex-shrink-0 ml-4 w-2.5 h-2.5 rounded-full bg-red-500 ring-4 ring-red-50" title="Belum dibaca"></span>
                    </div>
                    <p class="text-slate-500 text-sm mb-3">Seorang pengguna baru saja mengajukan peminjaman ruangan untuk kegiatan Workshop UI/UX.</p>
                    <div class="flex items-center gap-4">
                        <span class="flex items-center gap-1 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                            <span class="material-symbols-outlined text-xs">schedule</span>
                            2 menit yang lalu
                        </span>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest bg-red-50 text-red-600 border border-red-100">Urgent</span>
                    </div>
                </div>
                <div class="absolute right-6 bottom-6 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="text-[#002045] hover:underline text-sm font-bold">Detail Berkas</button>
                </div>
            </div>

            {{-- Notifikasi Belum Dibaca 2 --}}
            <div class="group relative flex items-start gap-6 p-6 bg-white rounded-xl shadow-sm border border-slate-200 border-l-4 border-l-[#002045] transition-all hover:translate-x-1 hover:shadow-md">
                <div class="mt-1 flex-shrink-0">
                    <div class="w-10 h-10 rounded-lg bg-orange-50 flex items-center justify-center text-orange-600">
                        <span class="material-symbols-outlined">cleaning_services</span>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-headline font-bold text-slate-800 text-lg leading-tight">Ruangan R. Seminar 1 membutuhkan pembersihan</h3>
                        <span class="flex-shrink-0 ml-4 w-2.5 h-2.5 rounded-full bg-red-500 ring-4 ring-red-50" title="Belum dibaca"></span>
                    </div>
                    <p class="text-slate-500 text-sm mb-3">Sesi peminjaman sebelumnya telah berakhir. Koordinasikan dengan tim fasilitas untuk pembersihan.</p>
                    <div class="flex items-center gap-4">
                        <span class="flex items-center gap-1 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                            <span class="material-symbols-outlined text-xs">schedule</span>
                            45 menit yang lalu
                        </span>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest bg-orange-50 text-orange-600 border border-orange-100">Maintenance</span>
                    </div>
                </div>
                <div class="absolute right-6 bottom-6 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="text-[#002045] hover:underline text-sm font-bold">Assign Tim</button>
                </div>
            </div>

            {{-- Notifikasi Sudah Dibaca 1 --}}
            <div class="group relative flex items-start gap-6 p-6 bg-slate-50/50 rounded-xl border border-slate-200 transition-all grayscale hover:grayscale-0 hover:bg-white hover:shadow-sm">
                <div class="mt-1 flex-shrink-0">
                    <div class="w-10 h-10 rounded-lg bg-slate-200 flex items-center justify-center text-slate-500">
                        <span class="material-symbols-outlined">file_download</span>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-headline font-semibold text-slate-700 text-lg leading-tight">Laporan bulanan Oktober siap diunduh</h3>
                    </div>
                    <p class="text-slate-500 text-sm mb-3">Statistik penggunaan ruangan dan efisiensi operasional bulan Oktober telah dikompilasi.</p>
                    <div class="flex items-center gap-4">
                        <span class="flex items-center gap-1 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                            <span class="material-symbols-outlined text-xs">schedule</span>
                            3 jam yang lalu
                        </span>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest bg-slate-200 text-slate-600">Report</span>
                    </div>
                </div>
                <div class="absolute right-6 bottom-6 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="text-[#002045] hover:underline text-sm font-bold">Download PDF</button>
                </div>
            </div>

            {{-- Notifikasi Sudah Dibaca 2 --}}
            <div class="group relative flex items-start gap-6 p-6 bg-slate-50/50 rounded-xl border border-slate-200 transition-all grayscale hover:grayscale-0 hover:bg-white hover:shadow-sm">
                <div class="mt-1 flex-shrink-0">
                    <div class="w-10 h-10 rounded-lg bg-slate-200 flex items-center justify-center text-slate-500">
                        <span class="material-symbols-outlined">verified_user</span>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-headline font-semibold text-slate-700 text-lg leading-tight">Pembaruan Keamanan Sistem Selesai</h3>
                    </div>
                    <p class="text-slate-500 text-sm mb-3">Patch keamanan rutin v2.4.1 telah berhasil diterapkan pada modul manajemen database.</p>
                    <div class="flex items-center gap-4">
                        <span class="flex items-center gap-1 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                            <span class="material-symbols-outlined text-xs">schedule</span>
                            Kemarin
                        </span>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest bg-slate-200 text-slate-600">System</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Footer & Pagination --}}
        <div class="mt-8 pt-6 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-sm text-slate-500 font-medium">Menampilkan <span class="font-bold text-slate-800">4</span> dari <span class="font-bold text-slate-800">42</span> notifikasi terbaru.</p>
            <div class="flex gap-2">
                <button class="p-2 rounded-lg bg-white border border-slate-200 hover:bg-slate-50 text-slate-500 hover:text-[#002045] transition-colors shadow-sm">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button class="p-2 rounded-lg bg-white border border-slate-200 hover:bg-slate-50 text-slate-500 hover:text-[#002045] transition-colors shadow-sm">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>

    </div>
@endsection