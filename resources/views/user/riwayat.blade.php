@extends('layouts.user')

@section('title', 'Riwayat Peminjaman')

@section('content')

    @php
        // Data riwayat peminjaman (Simulasi Database)
        $riwayats = [
            [
                'id_req' => 'REQ-882910',
                'ruangan' => 'Lab Komputer Dasar - Gedung B',
                'tanggal' => '24 Okt 2026',
                'waktu' => '08:00 - 11:00',
                'status' => 'disetujui',
                'jenis_kegiatan' => 'Fakultas',
                'jenis_class' => 'text-blue-700 bg-blue-50 border-blue-200',
                'image' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'id_req' => 'REQ-882755',
                'ruangan' => 'Ruang Teater - Fakultas Seni',
                'tanggal' => '25 Okt 2026',
                'waktu' => '13:00 - 15:30',
                'status' => 'pending',
                'jenis_kegiatan' => 'Sidang',
                'jenis_class' => 'text-purple-700 bg-purple-50 border-purple-200',
                'image' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'id_req' => 'REQ-882735',
                'ruangan' => 'Ruang Teater - Fakultas Seni',
                'tanggal' => '25 Okt 2026',
                'waktu' => '15:00 - 16:30',
                'status' => 'ditolak',
                'jenis_kegiatan' => 'Ormawa',
                'jenis_class' => 'text-orange-700 bg-orange-50 border-orange-200',
                'image' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80'
            ]
        ];

        // Konfigurasi warna badge berdasarkan status
        $statusStyles = [
            'disetujui' => ['label' => 'Disetujui', 'class' => 'bg-emerald-100 text-emerald-800 border-emerald-200'],
            'pending'   => ['label' => 'Menunggu',  'class' => 'bg-amber-100 text-amber-800 border-amber-200'],
            'ditolak'   => ['label' => 'Ditolak',   'class' => 'bg-red-100 text-red-800 border-red-200'],
        ];
    @endphp

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
            <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors whitespace-nowrap">Menunggu</button>
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

    {{-- Daftar Riwayat (Sekarang menggunakan looping otomatis) --}}
    <div class="grid grid-cols-1 gap-6 mb-10">

        @forelse ($riwayats as $item)
            @php $status = $statusStyles[$item['status']]; @endphp
            
            <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center border border-slate-200 hover:shadow-md transition-all group">
                <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100">
                    <img alt="{{ $item['ruangan'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $item['image'] }}">
                </div>
                
                <div class="flex-1 space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 bg-slate-100 px-2 py-1 rounded">{{ $item['id_req'] }}</span>
                        {{-- Badge Jenis Kegiatan --}}
                        <span class="text-[10px] font-bold uppercase tracking-widest border px-2 py-1 rounded {{ $item['jenis_class'] }}">
                            {{ $item['jenis_kegiatan'] }}
                        </span>
                    </div>
                    <h3 class="text-xl font-headline font-bold text-[#002045]">{{ $item['ruangan'] }}</h3>
                    <div class="flex flex-wrap gap-5 text-sm text-slate-500 pt-1">
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-base">calendar_today</span>
                            <span>{{ $item['tanggal'] }}</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-base">schedule</span>
                            <span>{{ $item['waktu'] }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-row gap-3 w-full md:w-auto md:border-l md:border-slate-100 md:pl-6">
                    <div class="my-auto">
                        <span class="text-xs font-bold px-3 py-1 rounded-full border {{ $status['class'] }}">{{ $status['label'] }}</span>
                    </div>
                    {{-- Link Detail (Mengirim parameter status) --}}
                    <a href="/user/riwayat-detail?status={{ $item['status'] }}" class="bg-white border-2 border-[#002045] text-[#002045] text-center px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors w-full md:w-auto">
                        Lihat Detail
                    </a>
                </div>
            </div>

        @empty
            <div class="bg-white rounded-xl p-10 text-center border border-slate-200">
                <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl">inbox</span>
                </div>
                <h3 class="text-lg font-bold text-[#002045] mb-1">Belum Ada Riwayat</h3>
                <p class="text-sm text-slate-500">Anda belum pernah mengajukan peminjaman ruangan.</p>
            </div>
        @endforelse

    </div>

    {{-- Pagination --}}
    <div class="flex items-center justify-between border-t border-slate-200 pt-6">
        <p class="text-sm text-slate-500 font-medium">Menampilkan {{ count($riwayats) }} pengajuan</p>
        <div class="flex items-center gap-2">
            <button class="p-2 rounded-lg hover:bg-slate-200 text-slate-400 transition-colors disabled:opacity-50" disabled>
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#002045] text-white text-sm font-bold shadow-sm">1</button>
            <button class="p-2 rounded-lg hover:bg-slate-200 text-slate-400 transition-colors disabled:opacity-50" disabled>
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>
    </div>

@endsection