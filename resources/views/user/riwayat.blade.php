@extends('layouts.user')

@section('title', 'Riwayat Peminjaman')

@section('content')

    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-3xl font-headline font-extrabold text-[#002045] mb-2">Riwayat Peminjaman</h2>
        <p class="text-slate-500 text-sm">Pantau status pengajuan peminjaman ruangan Anda secara real-time.</p>
    </div>

    {{-- Filter Area --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        
        {{-- Filter Tab Status --}}
        <div class="flex items-center gap-2 p-1 bg-slate-200/50 rounded-lg w-fit overflow-x-auto max-w-full">
            <button class="px-6 py-2 rounded-md text-sm font-bold bg-white text-[#002045] shadow-sm whitespace-nowrap">Semua</button>
            <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors whitespace-nowrap">Diproses</button>
            <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors whitespace-nowrap">Disetujui</button>
            <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors whitespace-nowrap">Ditolak</button>
        </div>

        {{-- Filter Dropdown Jenis Kegiatan --}}
        <div class="flex items-center gap-3 w-full md:w-auto">
            <span class="material-symbols-outlined text-slate-400 hidden md:block">filter_list</span>
            <select class="w-full md:w-auto bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-600 focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all shadow-sm cursor-pointer">
                <option value="">Semua Jenis Kegiatan</option>
                <option value="sidang">Sidang</option>
                <option value="ormawa">Organisasi Mahasiswa (Ormawa)</option>
                <option value="fakultas">Kegiatan Fakultas</option>
            </select>
        </div>

    </div>

    {{-- Daftar Riwayat --}}
    <div class="grid grid-cols-1 gap-6 mb-10">

        {{-- Item 1: DISETUJUI --}}
        <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center border border-slate-200 hover:shadow-md transition-all group">
            <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100">
                <img alt="Lab Komputer" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80">
            </div>
            <div class="flex-1 space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 bg-slate-100 px-2 py-1 rounded">REQ-882910</span>
                    {{-- Badge Jenis Kegiatan --}}
                    <span class="text-[10px] font-bold uppercase tracking-widest text-blue-700 bg-blue-50 border border-blue-200 px-2 py-1 rounded">Fakultas</span>
                </div>
                <h3 class="text-xl font-headline font-bold text-[#002045]">Lab Komputer Dasar - Gedung B</h3>
                <div class="flex flex-wrap gap-5 text-sm text-slate-500 pt-1">
                    <div class="flex items-center gap-1.5"><span class="material-symbols-outlined text-base">calendar_today</span><span>24 Okt 2026</span></div>
                    <div class="flex items-center gap-1.5"><span class="material-symbols-outlined text-base">schedule</span><span>08:00 - 11:00</span></div>
                </div>
            </div>
            <div class="flex flex-row gap-3 w-full md:w-auto md:border-l md:border-slate-100 md:pl-6">
                <div class="my-auto">
                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">Disetujui</span>
                </div>
                {{-- Link dengan parameter status=disetujui --}}
                <a href="/user/riwayat-detail?status=disetujui" class="bg-white border-2 border-[#002045] text-[#002045] text-center px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors w-full md:w-auto">
                    Lihat Detail
                </a>
            </div>
        </div>

        {{-- Item 2: DIPROSES --}}
        <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center border border-slate-200 hover:shadow-md transition-all group">
            <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100">
                <img alt="Ruang Teater" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80">
            </div>
            <div class="flex-1 space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 bg-slate-100 px-2 py-1 rounded">REQ-882755</span>
                    {{-- Badge Jenis Kegiatan --}}
                    <span class="text-[10px] font-bold uppercase tracking-widest text-purple-700 bg-purple-50 border border-purple-200 px-2 py-1 rounded">Sidang</span>
                </div>
                <h3 class="text-xl font-headline font-bold text-[#002045]">Ruang Teater - Fakultas Seni</h3>
                <div class="flex flex-wrap gap-5 text-sm text-slate-500 pt-1">
                    <div class="flex items-center gap-1.5"><span class="material-symbols-outlined text-base">calendar_today</span><span>25 Okt 2026</span></div>
                    <div class="flex items-center gap-1.5"><span class="material-symbols-outlined text-base">schedule</span><span>13:00 - 15:30</span></div>
                </div>
            </div>
            <div class="flex flex-row gap-3 w-full md:w-auto md:border-l md:border-slate-100 md:pl-6">
                <div class="my-auto">
                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-amber-100 text-amber-800 border border-amber-200">Diproses</span>
                </div>
                {{-- Link dengan parameter status=diproses --}}
                <a href="/user/riwayat-detail?status=diproses" class="bg-white border-2 border-[#002045] text-[#002045] text-center px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors w-full md:w-auto">
                    Lihat Detail
                </a>
            </div>
        </div>

        {{-- Item 3: DITOLAK --}}
        <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center border border-slate-200 hover:shadow-md transition-all group">
            <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100">
                <img alt="Ruang Teater" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80">
            </div>
            <div class="flex-1 space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 bg-slate-100 px-2 py-1 rounded">REQ-882735</span>
                    {{-- Badge Jenis Kegiatan --}}
                    <span class="text-[10px] font-bold uppercase tracking-widest text-orange-700 bg-orange-50 border border-orange-200 px-2 py-1 rounded">Ormawa</span>
                </div>
                <h3 class="text-xl font-headline font-bold text-[#002045]">Ruang Teater - Fakultas Seni</h3>
                <div class="flex flex-wrap gap-5 text-sm text-slate-500 pt-1">
                    <div class="flex items-center gap-1.5"><span class="material-symbols-outlined text-base">calendar_today</span><span>25 Okt 2026</span></div>
                    <div class="flex items-center gap-1.5"><span class="material-symbols-outlined text-base">schedule</span><span>15:00 - 16:30</span></div>
                </div>
            </div>
            <div class="flex flex-row gap-3 w-full md:w-auto md:border-l md:border-slate-100 md:pl-6">
                <div class="my-auto">
                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-red-100 text-red-800 border border-red-200">Ditolak</span>
                </div>
                {{-- Link dengan parameter status=ditolak --}}
                <a href="/user/riwayat-detail?status=ditolak" class="bg-white border-2 border-[#002045] text-[#002045] text-center px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors w-full md:w-auto">
                    Lihat Detail
                </a>
            </div>
        </div>

    </div>

    {{-- Pagination --}}
    <div class="flex items-center justify-between border-t border-slate-200 pt-6">
        <p class="text-sm text-slate-500 font-medium">Menampilkan 1-3 dari 12 pengajuan</p>
        <div class="flex items-center gap-2">
            <button class="p-2 rounded-lg hover:bg-slate-200 text-slate-400 transition-colors disabled:opacity-50" disabled>
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#002045] text-white text-sm font-bold shadow-sm">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-sm font-medium">2</button>
            <button class="p-2 rounded-lg hover:bg-slate-200 text-slate-600 transition-colors">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>
    </div>

@endsection