@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')

    {{-- Selamat Datang --}}
    <div class="flex flex-col md:flex-row justify-between items-end gap-6 bg-white p-8 rounded-2xl shadow-sm border border-slate-200 mb-8">
        <div class="space-y-2">
            <h2 class="text-3xl font-extrabold tracking-tight text-[#002045] font-headline">Halo, Ahmad Fauzi 👋</h2>
            <p class="text-slate-500 font-medium">Selamat datang di portal akademik. Ada kegiatan apa hari ini?</p>
        </div>
        <a href="/user/ajukan"
           class="bg-primary-gradient text-white px-8 py-3.5 rounded-xl font-bold flex items-center gap-2 shadow-lg shadow-[#002045]/20 hover:opacity-95 active:scale-[0.98] transition-all">
            <span class="material-symbols-outlined">add_circle</span>
            Ajukan Peminjaman
        </a>
    </div>

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl border-l-4 border-blue-500 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-4">
                <div class="p-2 bg-blue-50 text-blue-600 rounded-lg group-hover:bg-blue-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">event_available</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Aktif</span>
            </div>
            <p class="text-3xl font-black text-[#002045] font-headline">03</p>
            <p class="text-sm font-medium text-slate-500 mt-1">Peminjaman Disetujui</p>
        </div>

        <div class="bg-white p-6 rounded-xl border-l-4 border-amber-400 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-4">
                <div class="p-2 bg-amber-50 text-amber-600 rounded-lg group-hover:bg-amber-400 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Menunggu</span>
            </div>
            <p class="text-3xl font-black text-[#002045] font-headline">01</p>
            <p class="text-sm font-medium text-slate-500 mt-1">Menunggu Konfirmasi</p>
        </div>

        <div class="bg-white p-6 rounded-xl border-l-4 border-red-500 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-4">
                <div class="p-2 bg-red-50 text-red-500 rounded-lg group-hover:bg-red-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Riwayat</span>
            </div>
            <p class="text-3xl font-black text-[#002045] font-headline">00</p>
            <p class="text-sm font-medium text-slate-500 mt-1">Permohonan Ditolak</p>
        </div>
    </div>

    {{-- Tabel Riwayat --}}
    <div class="space-y-4 mb-10">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-bold text-[#002045] font-headline flex items-center gap-2">
                <span class="material-symbols-outlined">history</span> Riwayat Peminjaman
            </h3>
            <a class="text-sm font-bold text-[#002045] hover:text-blue-600 transition-colors flex items-center gap-1"
               href="/user/riwayat">
                Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-slate-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Ruangan</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Tanggal</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Waktu</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Keperluan</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 bg-blue-50 border border-blue-100 text-blue-700 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-sm">meeting_room</span>
                                    </div>
                                    <span class="text-sm font-bold text-[#002045]">Lab Komputer 03</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-medium">12 Okt 2026</td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-medium">08:00 - 10:00</td>
                            <td class="px-6 py-4 text-sm text-slate-600">Latihan Pemrograman Web</td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-700 border border-green-200 uppercase tracking-wider">
                                    Disetujui
                                </span>
                            </td>
                        </tr>
                        <tr class="bg-slate-50/30 hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 bg-blue-50 border border-blue-100 text-blue-700 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-sm">meeting_room</span>
                                    </div>
                                    <span class="text-sm font-bold text-[#002045]">Ruang Teater A</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-medium">15 Okt 2026</td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-medium">13:00 - 15:00</td>
                            <td class="px-6 py-4 text-sm text-slate-600">Rapat Himpunan Mahasiswa</td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-amber-100 text-amber-700 border border-amber-200 uppercase tracking-wider">
                                    Menunggu
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 bg-blue-50 border border-blue-100 text-blue-700 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-sm">meeting_room</span>
                                    </div>
                                    <span class="text-sm font-bold text-[#002045]">Auditorium Utama A.1</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-medium">05 Okt 2026</td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-medium">09:00 - 17:00</td>
                            <td class="px-6 py-4 text-sm text-slate-600">Seminar Nasional AI</td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-red-50 text-red-600 border border-red-200 uppercase tracking-wider">
                                    Ditolak
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Rekomendasi Ruangan --}}
    <div class="space-y-4">
        <h3 class="text-xl font-bold text-[#002045] font-headline flex items-center gap-2">
            <span class="material-symbols-outlined">explore</span> Rekomendasi Ruangan
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="group relative overflow-hidden rounded-2xl aspect-[16/9] bg-slate-900 shadow-md">
                <img alt="Ruang Multimedia"
                     class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:scale-110 transition-transform duration-700"
                     src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=800&q=80" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#002045] via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 space-y-2 w-full">
                    <span class="bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-widest">Populer</span>
                    <h4 class="text-xl font-bold text-white font-headline">Ruang Multimedia A</h4>
                    <p class="text-slate-200 text-sm">Dilengkapi proyektor 4K dan sound system premium.</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl aspect-[16/9] bg-slate-900 shadow-md">
                <img alt="Co-Working Space"
                     class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:scale-110 transition-transform duration-700"
                     src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=800&q=80" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#002045] via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 space-y-2 w-full">
                    <span class="bg-emerald-500 text-white text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-widest">Baru</span>
                    <h4 class="text-xl font-bold text-white font-headline">Co-Working Space Lt. 2</h4>
                    <p class="text-slate-200 text-sm">Area terbuka nyaman untuk kolaborasi tim.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
