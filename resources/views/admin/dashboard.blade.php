@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    {{-- Header Kalender --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-6 rounded-xl shadow-sm border border-slate-100 mb-6">
        <div class="flex items-center gap-6">
            <h2 class="text-2xl font-extrabold text-[#002045] font-headline tracking-tight">Oktober 2026</h2>
            <div class="flex items-center bg-slate-100 rounded-lg p-1">
                <button class="p-2 hover:bg-white rounded-md transition-all text-slate-600">
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </button>
                <button class="px-4 py-2 hover:bg-white rounded-md transition-all text-sm font-bold text-slate-700 shadow-sm">Hari Ini</button>
                <button class="p-2 hover:bg-white rounded-md transition-all text-slate-600">
                    <span class="material-symbols-outlined text-xl">chevron_right</span>
                </button>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex bg-slate-100 p-1 rounded-lg">
                <button class="px-4 py-2 bg-white text-[#002045] font-bold rounded-md shadow-sm text-sm">Minggu</button>
                <button class="px-4 py-2 text-slate-500 hover:text-slate-700 font-medium rounded-md text-sm transition-colors">Bulan</button>
            </div>
            <button class="px-4 py-2 bg-primary-gradient text-white text-sm font-semibold rounded-lg shadow-md hover:opacity-90 transition-opacity flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">add</span> Booking Baru
            </button>
        </div>
    </div>

    {{-- Kalender --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-slate-200">

        {{-- Header Hari --}}
        <div class="calendar-grid bg-slate-50 border-b border-slate-200">
            <div class="p-4 border-r border-slate-200"></div>
            <div class="p-4 border-r border-slate-200 text-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Sen</p>
                <p class="text-xl font-extrabold text-[#002045] font-headline">23</p>
            </div>
            <div class="p-4 border-r border-slate-200 text-center bg-blue-50">
                <p class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Sel</p>
                <p class="text-xl font-extrabold text-[#002045] font-headline">24</p>
            </div>
            <div class="p-4 border-r border-slate-200 text-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Rab</p>
                <p class="text-xl font-extrabold text-[#002045] font-headline">25</p>
            </div>
            <div class="p-4 border-r border-slate-200 text-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kam</p>
                <p class="text-xl font-extrabold text-[#002045] font-headline">26</p>
            </div>
            <div class="p-4 border-r border-slate-200 text-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Jum</p>
                <p class="text-xl font-extrabold text-[#002045] font-headline">27</p>
            </div>
            <div class="p-4 border-r border-slate-200 text-center text-slate-400">
                <p class="text-[10px] font-bold uppercase tracking-widest">Sab</p>
                <p class="text-xl font-extrabold font-headline">28</p>
            </div>
            <div class="p-4 text-center text-slate-400">
                <p class="text-[10px] font-bold uppercase tracking-widest">Min</p>
                <p class="text-xl font-extrabold font-headline">29</p>
            </div>
        </div>

        {{-- Grid Jam --}}
        <div class="calendar-grid overflow-y-auto max-h-[600px]">

            {{-- Kolom Jam --}}
            <div class="bg-slate-50">
                @for ($i = 7; $i <= 21; $i++)
                    <div class="time-cell flex items-center justify-center text-[11px] font-bold text-slate-400">
                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                    </div>
                @endfor
            </div>

            {{-- Senin --}}
            <div class="relative bg-white border-r border-slate-100">
                @for ($i = 7; $i <= 21; $i++) <div class="time-cell"></div> @endfor
            </div>

            {{-- Selasa (hari aktif) --}}
            <div class="relative bg-blue-50/30 border-r border-slate-100">
                <div class="booking-block bg-[#002045] text-white shadow-md" style="top: 200px; height: 300px;">
                    <p class="font-bold mb-1">Lab. Komputer 03</p>
                    <p class="text-[10px] opacity-90">Praktikum Algoritma Lanjut</p>
                    <div class="mt-2 flex items-center gap-1 opacity-80 text-[9px]">
                        <span class="material-symbols-outlined text-[12px]">schedule</span>
                        09:00 - 12:00
                    </div>
                </div>
                <div class="booking-block bg-emerald-100 text-emerald-800 border border-emerald-200" style="top: 700px; height: 200px;">
                    <p class="font-bold text-[10px] uppercase tracking-wide">Tersedia</p>
                    <p class="text-[10px]">Aula Utama</p>
                </div>
                @for ($i = 7; $i <= 21; $i++) <div class="time-cell"></div> @endfor
            </div>

            {{-- Rabu --}}
            <div class="relative bg-white border-r border-slate-100">
                <div class="booking-block bg-[#002045] text-white shadow-md" style="top: 600px; height: 250px;">
                    <p class="font-bold mb-1">Ruang Teater A</p>
                    <p class="text-[10px] opacity-90">Seminar Nasional Robotika</p>
                </div>
                @for ($i = 7; $i <= 21; $i++) <div class="time-cell"></div> @endfor
            </div>

            {{-- Kamis --}}
            <div class="relative bg-white border-r border-slate-100">
                <div class="booking-block bg-[#002045] text-white shadow-md" style="top: 300px; height: 150px;">
                    <p class="font-bold mb-1">R. Rapat Senat</p>
                    <p class="text-[10px] opacity-90">Rapat Koordinasi Prodi</p>
                </div>
                @for ($i = 7; $i <= 21; $i++) <div class="time-cell"></div> @endfor
            </div>

            {{-- Jumat --}}
            <div class="relative bg-white border-r border-slate-100">
                <div class="booking-block bg-emerald-100 text-emerald-800 border border-emerald-200" style="top: 100px; height: 200px;">
                    <p class="font-bold text-[10px] uppercase tracking-wide">Tersedia</p>
                    <p class="text-[10px]">Lab Komputer - R.301</p>
                </div>
                @for ($i = 7; $i <= 21; $i++) <div class="time-cell"></div> @endfor
            </div>

            {{-- Sabtu --}}
            <div class="relative bg-white border-r border-slate-100">
                <div class="booking-block bg-[#002045] text-white shadow-md" style="top: 100px; height: 900px;">
                    <p class="font-bold mb-1">Aula Utama</p>
                    <p class="text-[10px] opacity-90">Wisuda Gelombang II</p>
                </div>
                @for ($i = 7; $i <= 21; $i++) <div class="time-cell"></div> @endfor
            </div>

            {{-- Minggu --}}
            <div class="relative bg-white">
                @for ($i = 7; $i <= 21; $i++) <div class="time-cell"></div> @endfor
            </div>

        </div>
    </div>

    {{-- Legenda --}}
    <div class="flex items-center gap-6 pt-4 px-2 mt-4">
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 rounded bg-[#002045]"></div>
            <span class="text-xs font-semibold text-slate-600">Terisi (Booked)</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 rounded bg-emerald-100 border border-emerald-200"></div>
            <span class="text-xs font-semibold text-slate-600">Tersedia (Available)</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 rounded bg-blue-50 border border-blue-200"></div>
            <span class="text-xs font-semibold text-slate-600">Hari Terpilih</span>
        </div>
    </div>

@endsection
