@extends('layouts.user')

@section('title', 'Ajukan Peminjaman')

@section('container_class', 'h-[calc(100vh-73px)] flex flex-col overflow-hidden')

@section('content')

    {{-- Filter Bar --}}
    <section class="px-8 py-5 bg-white border-b border-slate-200 shrink-0">
        <div class="flex flex-wrap items-end gap-4">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Pilih Gedung</label>
                <select class="w-full bg-slate-50 border border-slate-200 rounded-lg py-3 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                    <option>Gedung A (Rektorat)</option>
                    <option>Gedung B (Fakultas Teknik)</option>
                    <option>Gedung C (Fakultas Ekonomi)</option>
                </select>
            </div>
            <div class="flex-1 min-w-[180px]">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Pilih Ruangan</label>
                <select class="w-full bg-slate-50 border border-slate-200 rounded-lg py-3 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                    <option>Ruang Teater - Gedung A</option>
                    <option>Lab Komputer 02 - Gedung B</option>
                </select>
            </div>
            <div class="flex-1 min-w-[180px]">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Tanggal</label>
                <input class="w-full bg-slate-50 border border-slate-200 rounded-lg py-3 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none" type="date" value="2026-10-23">
            </div>
            <div class="w-40">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Min. Kapasitas</label>
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg py-3 px-4">
                    <span class="material-symbols-outlined text-sm text-slate-400 mr-2">group</span>
                    <input class="w-full bg-transparent border-none p-0 focus:ring-0 text-sm font-medium outline-none" placeholder="40" type="number">
                </div>
            </div>
            <button class="bg-primary-gradient text-white px-6 py-3 rounded-lg font-bold text-sm shadow-md hover:opacity-95 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">filter_alt</span> Filter
            </button>
        </div>
    </section>

    {{-- Konten Utama: Kalender + Panel Kanan --}}
    <div class="flex flex-1 overflow-hidden">

        {{-- Kalender --}}
        <div class="flex-1 overflow-auto p-8">
            <div class="min-w-[700px] bg-white rounded-xl shadow-sm border border-slate-200 p-6">

                {{-- Header Hari --}}
                <div class="grid grid-cols-8 border-b border-slate-200 mb-4 pb-4">
                    <div class="p-2"></div>
                    @php
                        $days = [
                            ['label' => 'Sen', 'date' => '23', 'active' => false],
                            ['label' => 'Sel', 'date' => '24', 'active' => true],
                            ['label' => 'Rab', 'date' => '25', 'active' => false],
                            ['label' => 'Kam', 'date' => '26', 'active' => false],
                            ['label' => 'Jum', 'date' => '27', 'active' => false],
                            ['label' => 'Sab', 'date' => '28', 'active' => false],
                            ['label' => 'Min', 'date' => '29', 'active' => false],
                        ];
                    @endphp
                    @foreach ($days as $day)
                        <div class="p-2 text-center {{ $day['active'] ? 'bg-blue-50 rounded-xl border border-blue-100' : '' }}">
                            <span class="block text-xs font-bold uppercase tracking-tighter mb-1 {{ $day['active'] ? 'text-[#002045]' : 'text-slate-400' }}">
                                {{ $day['label'] }}
                            </span>
                            <span class="text-xl font-headline font-extrabold {{ $day['active'] ? 'text-[#002045]' : 'text-slate-800' }}">
                                {{ $day['date'] }}
                            </span>
                        </div>
                    @endforeach
                </div>

                {{-- Slot Waktu --}}
                @php
                    $slots = [
                        ['time' => '07:00', 'status' => ['empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty']],
                        ['time' => '08:00', 'status' => ['booked', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty']],
                        ['time' => '09:00', 'status' => ['booked', 'empty', 'empty', 'booked', 'empty', 'empty', 'empty']],
                        ['time' => '10:00', 'status' => ['empty', 'selected', 'empty', 'empty', 'empty', 'empty', 'empty']],
                        ['time' => '11:00', 'status' => ['empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty']],
                        ['time' => '12:00', 'status' => ['empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty']],
                    ];
                @endphp

                <div class="relative space-y-1">
                    @foreach ($slots as $slot)
                        <div class="grid grid-cols-8 h-14">
                            <div class="text-[10px] font-bold text-slate-400 text-right pr-4 pt-2 border-r border-slate-100">
                                {{ $slot['time'] }}
                            </div>
                            @foreach ($slot['status'] as $index => $status)
                                @if ($status === 'booked')
                                    <div class="border-r border-slate-100 relative p-1 cursor-not-allowed bg-red-50">
                                        <div class="absolute inset-1 bg-red-100 border border-red-200 text-[10px] font-bold text-red-600 rounded flex items-center justify-center">
                                            Terisi
                                        </div>
                                    </div>
                                @elseif ($status === 'selected')
                                    <div class="border-r border-slate-100 relative p-1 cursor-pointer bg-blue-50">
                                        <div class="absolute inset-1 bg-[#002045] text-white text-[10px] font-bold rounded flex items-center justify-center shadow-md">
                                            <span class="material-symbols-outlined text-sm mr-1">check_circle</span> Dipilih
                                        </div>
                                    </div>
                                @else
                                    <div class="border-r border-slate-100 bg-slate-50 cursor-pointer hover:bg-blue-100 transition-colors {{ $index === 6 ? 'border-r-0' : '' }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>

                {{-- Legenda --}}
                <div class="mt-8 pt-6 border-t border-slate-200 flex gap-8 justify-center">
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-slate-100 border border-slate-200 rounded"></div>
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Kosong</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-red-100 border border-red-200 rounded"></div>
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Terisi</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-[#002045] rounded shadow-sm"></div>
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Pilihan Anda</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Panel Kanan --}}
        <aside class="w-[380px] border-l border-slate-200 bg-white p-8 flex flex-col overflow-y-auto shrink-0">
            <div class="flex-1">

                {{-- Foto Ruangan --}}
                <img class="w-full h-44 object-cover rounded-xl shadow-sm mb-5 border border-slate-100"
                     src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=800&q=80"
                     alt="Ruang Teater">

                {{-- Nama Ruangan --}}
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-xl font-extrabold font-headline text-[#002045] leading-tight">Ruang Teater - Gedung A</h2>
                    <span class="bg-blue-50 border border-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase">A-102</span>
                </div>
                <div class="flex items-center gap-2 text-slate-500 text-sm mb-6">
                    <span class="material-symbols-outlined text-sm">location_on</span>
                    <span>Gedung Utama (Rektorat), Lantai 1</span>
                </div>

                {{-- Kapasitas --}}
                <div class="mb-6">
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Kapasitas</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-slate-50 border border-slate-100 rounded-lg p-4 flex flex-col items-center text-center">
                            <span class="material-symbols-outlined text-[#002045] mb-1">group</span>
                            <span class="text-lg font-extrabold text-slate-800">50</span>
                            <span class="text-[10px] text-slate-500 font-bold uppercase">Kursi</span>
                        </div>
                        <div class="bg-slate-50 border border-slate-100 rounded-lg p-4 flex flex-col items-center text-center">
                            <span class="material-symbols-outlined text-[#002045] mb-1">square_foot</span>
                            <span class="text-lg font-extrabold text-slate-800">120</span>
                            <span class="text-[10px] text-slate-500 font-bold uppercase">m²</span>
                        </div>
                    </div>
                </div>

                {{-- Waktu Terpilih --}}
                <div class="bg-blue-50/50 p-5 rounded-xl border border-blue-100 relative mb-6">
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                    <h3 class="text-[10px] font-black text-blue-800 uppercase tracking-widest mb-3">Waktu Terpilih</h3>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-slate-600">Selasa, 24 Okt 2026</span>
                        <span class="text-sm font-bold text-[#002045] bg-white px-2 py-1 rounded border border-blue-100">10:00 - 11:00</span>
                    </div>
                </div>

            </div>

            {{-- Tombol Lanjut --}}
            <div class="pt-4 border-t border-slate-100">
                <a class="w-full bg-primary-gradient text-white py-4 rounded-xl font-bold text-sm shadow-lg hover:opacity-95 active:scale-[0.98] transition-all flex items-center justify-center gap-2"
                   href="/user/ajukan-detail">
                    Lanjut Isi Formulir
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </a>
                <p class="text-center text-[10px] text-slate-400 mt-3 uppercase font-bold tracking-widest">Langkah 1 dari 2</p>
            </div>
        </aside>

    </div>

@endsection
