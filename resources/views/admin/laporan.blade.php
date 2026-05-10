@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
        <div>
            <h3 class="text-3xl font-extrabold font-headline text-[#002045] tracking-tight">Analitik Peminjaman</h3>
            <p class="text-slate-500 mt-2 text-sm">Pantau penggunaan ruangan dan status permohonan secara real-time.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <div class="bg-white p-1 rounded-xl shadow-sm flex items-center border border-slate-200">
                <div class="px-4 py-1">
                    <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-wider">Mulai</span>
                    <input class="border-none p-0 text-sm font-bold text-[#002045] focus:ring-0 bg-transparent outline-none" type="date" value="2026-10-01">
                </div>
                <div class="w-[1px] h-8 bg-slate-200"></div>
                <div class="px-4 py-1">
                    <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-wider">Selesai</span>
                    <input class="border-none p-0 text-sm font-bold text-[#002045] focus:ring-0 bg-transparent outline-none" type="date" value="2026-10-31">
                </div>
            </div>
            <div class="flex gap-2">
                <button class="bg-white border border-slate-200 text-slate-600 px-4 py-2.5 rounded-lg text-sm font-bold flex items-center gap-2 hover:bg-slate-50 shadow-sm">
                    <span class="material-symbols-outlined text-sm text-red-500">picture_as_pdf</span> PDF
                </button>
                <button class="bg-white border border-slate-200 text-slate-600 px-4 py-2.5 rounded-lg text-sm font-bold flex items-center gap-2 hover:bg-slate-50 shadow-sm">
                    <span class="material-symbols-outlined text-sm text-green-600">table_view</span> Excel
                </button>
            </div>
        </div>
    </div>

    {{-- Chart + Donut --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-10">

        {{-- Bar Chart --}}
        <div class="lg:col-span-8 bg-white p-8 rounded-xl shadow-sm border border-slate-200">
            <div class="flex justify-between items-center mb-8">
                <h4 class="font-headline text-lg font-bold text-[#002045]">Volume Peminjaman per Tipe Ruangan</h4>
            </div>
            <div class="h-64 flex items-end justify-between gap-4">
                
                {{-- Data sekarang diambil dari variabel $bars yang dikirim Controller --}}
                @forelse ($bars ?? [] as $bar)
                    <div class="flex-1 flex flex-col items-center gap-3">
                        <div class="w-full rounded-t-lg relative group transition-all hover:opacity-90"
                             style="height: {{ $bar['height'] }}%; background-color: {{ isset($bar['active']) && $bar['active'] ? '#002045' : 'rgba(0,32,69,0.1)' }}">
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-[#002045] text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                {{ $bar['value'] }}
                            </div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-500 uppercase text-center {{ isset($bar['active']) && $bar['active'] ? 'text-[#002045]' : '' }}">
                            {{ $bar['label'] }}
                        </span>
                    </div>
                @empty
                    <div class="w-full h-full flex items-center justify-center">
                        <p class="text-sm font-medium text-slate-400">Belum ada data peminjaman ruangan.</p>
                    </div>
                @endforelse

            </div>
        </div>

        {{-- Donut Chart --}}
        <div class="lg:col-span-4 bg-white p-8 rounded-xl shadow-sm border border-slate-200 flex flex-col">
            <h4 class="font-headline text-lg font-bold text-[#002045] mb-6">Distribusi Status</h4>
            <div class="flex-1 flex flex-col justify-center items-center">
                <div class="relative w-40 h-40 rounded-full overflow-hidden flex items-center justify-center shadow-inner">
                    <div class="absolute inset-0" style="background: conic-gradient(#002045 0% 65%, #fcd34d 65% 85%, #f87171 85% 100%);"></div>
                    <div class="absolute w-28 h-28 bg-white rounded-full flex flex-col items-center justify-center shadow-sm">
                        <span class="text-2xl font-black font-headline text-[#002045]">342</span>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total</span>
                    </div>
                </div>
                <div class="mt-8 w-full space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-[#002045]"></span>
                            <span class="text-sm font-medium text-slate-700">Disetujui</span>
                        </div>
                        <span class="text-sm font-bold text-[#002045]">65%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-amber-300"></span>
                            <span class="text-sm font-medium text-slate-700">Pending</span>
                        </div>
                        <span class="text-sm font-bold text-amber-600">20%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-red-400"></span>
                            <span class="text-sm font-medium text-slate-700">Ditolak</span>
                        </div>
                        <span class="text-sm font-bold text-red-600">15%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Riwayat --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 border-b border-slate-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h4 class="font-headline text-lg font-bold text-[#002045]">Daftar Riwayat Lengkap</h4>
            
            {{-- Filter Tab --}}
            <div class="flex items-center gap-1 p-1 bg-slate-100 rounded-lg w-fit overflow-x-auto">
                <button class="px-4 py-1.5 rounded-md text-xs font-bold bg-white text-[#002045] shadow-sm whitespace-nowrap">Semua</button>
                <button class="px-4 py-1.5 rounded-md text-xs font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors whitespace-nowrap">Menunggu</button>
                <button class="px-4 py-1.5 rounded-md text-xs font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors whitespace-nowrap">Disetujui</button>
                <button class="px-4 py-1.5 rounded-md text-xs font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors whitespace-nowrap">Ditolak</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-8 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Peminjam</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Ruangan</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Waktu</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-8 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-wider text-right">Detail</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-bold text-xs">AS</div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Aditya Saputra</p>
                                    <p class="text-[10px] text-slate-500">NIM: 11223344</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-medium text-slate-700">R. Seminar 1</p>
                            <p class="text-[10px] text-slate-500">Gedung Dekanat</p>
                        </td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-700">24 Okt 2026</td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-700">08:00 - 12:00</td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 bg-emerald-100 text-[10px] font-bold text-emerald-700 border border-emerald-200 rounded-full flex items-center w-max gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Disetujui
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <a href="/admin/detail-permohonan" class="inline-block p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-800 font-bold text-xs">RM</div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Rina Marlina</p>
                                    <p class="text-[10px] text-slate-500">NIDN: 19880112</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-medium text-slate-700">Lab Komputer 3</p>
                            <p class="text-[10px] text-slate-500">Gedung Teknik</p>
                        </td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-700">25 Okt 2026</td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-700">13:00 - 15:00</td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 bg-amber-100 text-[10px] font-bold text-amber-700 border border-amber-200 rounded-full flex items-center w-max gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menunggu
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <a href="/admin/detail-permohonan" class="inline-block p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-800 font-bold text-xs">BP</div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Bambang Pamungkas</p>
                                    <p class="text-[10px] text-slate-500">NIM: 11223355</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-medium text-slate-700">Auditorium Lt. 4</p>
                            <p class="text-[10px] text-slate-500">Gedung Utama</p>
                        </td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-700">26 Okt 2026</td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-700">10:00 - 17:00</td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 bg-red-100 text-[10px] font-bold text-red-700 border border-red-200 rounded-full flex items-center w-max gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span> Ditolak
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <a href="/admin/detail-permohonan" class="inline-block p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-8 py-6 bg-slate-50 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs font-medium text-slate-500">Menampilkan 1-3 dari 342 entri</p>
            <div class="flex items-center gap-1">
                <button class="p-2 rounded-lg text-slate-400 border border-slate-200 bg-white disabled:opacity-50" disabled>
                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                </button>
                <button class="w-8 h-8 rounded-lg bg-[#002045] text-white text-xs font-bold shadow-sm">1</button>
                <button class="w-8 h-8 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 text-xs font-bold">2</button>
                <button class="w-8 h-8 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 text-xs font-bold">3</button>
                <span class="px-2 text-slate-400">...</span>
                <button class="w-8 h-8 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 text-xs font-bold">86</button>
                <button class="p-2 rounded-lg text-slate-600 border border-slate-200 bg-white hover:bg-slate-100">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

@endsection
