@extends('layouts.user')

@section('title', 'Notifikasi')

@section('content')

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h3 class="text-3xl font-bold text-[#002045] tracking-tight font-headline">Pusat Notifikasi</h3>
            <p class="text-slate-500 text-sm mt-1">Pantau status persetujuan peminjaman ruangan Anda.</p>
        </div>
        <button class="flex items-center justify-center gap-2 px-6 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-full text-sm font-bold hover:bg-slate-50 shadow-sm self-start sm:self-auto">
            <span class="material-symbols-outlined text-sm">done_all</span> Tandai Semua Dibaca
        </button>
    </div>

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-blue-600 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Total</p>
            <p class="text-2xl font-black text-[#002045] mt-1 font-headline">24</p>
        </div>
        <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-yellow-400 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Belum Dibaca</p>
            <p class="text-2xl font-black text-yellow-600 mt-1 font-headline">3</p>
        </div>
        <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-emerald-500 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Disetujui</p>
            <p class="text-2xl font-black text-emerald-600 mt-1 font-headline">12</p>
        </div>
        <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-red-500 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Ditolak</p>
            <p class="text-2xl font-black text-red-600 mt-1 font-headline">2</p>
        </div>
    </div>

    {{-- Daftar Notifikasi --}}
    <div class="space-y-4">

        {{-- Notif 1: Disetujui (belum dibaca) --}}
        <div class="group relative flex items-start gap-6 p-6 bg-white rounded-xl shadow-sm border border-slate-200 border-l-4 border-l-blue-600 transition-all hover:translate-x-1 hover:shadow-md">
            <div class="flex gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600">
                    <span class="material-symbols-outlined">check_circle</span>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-start mb-1.5">
                        <h4 class="font-bold text-[#002045] text-base">Permohonan Disetujui</h4>
                        <span class="text-[10px] font-bold text-blue-700 bg-blue-100 border border-blue-200 px-2.5 py-0.5 rounded-full uppercase tracking-widest">Baru</span>
                    </div>
                    <p class="text-sm text-slate-600 mb-3">
                        Peminjaman <span class="font-bold text-[#002045]">Lab Multimedia 02</span> telah disetujui oleh Admin Akademik.
                    </p>
                    <div class="flex flex-wrap items-center gap-5 text-xs text-slate-500 font-medium">
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">calendar_today</span> 24 Okt 2026</span>
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">schedule</span> 08:30 WIB</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Notif 2: Menunggu (belum dibaca) --}}
        <div class="group relative flex items-start gap-6 p-6 bg-white rounded-xl shadow-sm border border-slate-200 border-l-4 border-l-yellow-600 transition-all hover:translate-x-1 hover:shadow-md">
            <div class="flex gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600">
                    <span class="material-symbols-outlined">schedule</span>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-start mb-1.5">
                        <h4 class="font-bold text-[#002045] text-base">Menunggu </h4>
                        <span class="text-[10px] font-bold text-blue-700 bg-blue-100 border border-blue-200 px-2.5 py-0.5 rounded-full uppercase tracking-widest">Baru</span>
                    </div>
                    <p class="text-sm text-slate-600 mb-3">
                        Pengajuan <span class="font-bold text-[#002045]">Ruang Seminar 01</span> sedang dalam tahap verifikasi dokumen.
                    </p>
                    <div class="flex flex-wrap items-center gap-5 text-xs text-slate-500 font-medium">
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">calendar_today</span> 25 Okt 2026</span>
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">schedule</span> 14:00 WIB</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Notif 3: Ditolak (sudah dibaca) --}}
        <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 hover:bg-slate-100 transition-colors cursor-pointer">
            <div class="flex gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-50 border border-red-100 flex items-center justify-center text-red-500">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-start mb-1.5">
                        <h4 class="font-bold text-slate-700 text-base">Permohonan Ditolak</h4>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">2 Hari Lalu</span>
                    </div>
                    <p class="text-sm text-slate-600 mb-3">
                        Pengajuan <span class="font-bold text-slate-700">Aula Utama</span> tidak dapat diproses saat ini.
                    </p>
                    <div class="bg-white p-3.5 rounded-lg border border-red-100 border-l-2 border-l-red-500 mb-3">
                        <p class="text-xs text-red-600 font-medium leading-relaxed">
                            "Ruangan sedang digunakan untuk acara Dies Natalis Fakultas pada tanggal tersebut."
                        </p>
                    </div>
                    <div class="flex flex-wrap items-center gap-5 text-xs text-slate-400 font-medium">
                        <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">calendar_today</span> 22 Okt 2026</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Notif 4: Selesai (sudah dibaca) --}}
        <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 hover:bg-slate-100 transition-colors cursor-pointer">
            <div class="flex gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400">
                    <span class="material-symbols-outlined">history</span>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-start mb-1.5">
                        <h4 class="font-bold text-slate-700 text-base">Peminjaman Selesai</h4>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">1 Minggu Lalu</span>
                    </div>
                    <p class="text-sm text-slate-600">
                        Masa pinjam <span class="font-bold text-slate-700">Ruang Diskusi B</span> telah berakhir. Terima kasih telah menjaga fasilitas kampus.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- Load More --}}
    <div class="mt-10 flex justify-center">
        <button class="text-[#002045] bg-blue-50 px-6 py-2.5 rounded-full text-sm font-bold border border-blue-100 flex items-center gap-2 hover:bg-[#002045] hover:text-white transition-all">
            Tampilkan Lebih Banyak
            <span class="material-symbols-outlined text-lg">expand_more</span>
        </button>
    </div>

@endsection
