@extends('layouts.user')

@section('title', 'Riwayat Peminjaman')

@section('content')

    @php
        // Simulasi data riwayat peminjaman dari database
        $riwayats = [
            [
                'id_req' => 'REQ-20261024-042',
                'ruangan' => 'Lab Komputer Dasar',
                'gedung' => 'Gedung B',
                'tanggal' => '24 Okt 2026',
                'waktu' => '08:00 - 11:00',
                'status' => 'disetujui',
                'image' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'id_req' => 'REQ-20261025-018',
                'ruangan' => 'Ruang Teater',
                'gedung' => 'Gedung A',
                'tanggal' => '25 Okt 2026',
                'waktu' => '13:00 - 15:30',
                'status' => 'pending',
                'image' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'id_req' => 'REQ-20261028-005',
                'ruangan' => 'Auditorium Utama',
                'gedung' => 'Gedung Rektorat',
                'tanggal' => '28 Okt 2026',
                'waktu' => '09:00 - 16:00',
                'status' => 'ditolak',
                'image' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80'
            ]
        ];

        // Konfigurasi warna badge berdasarkan status
        $statusStyles = [
            'disetujui' => ['label' => 'Disetujui', 'class' => 'bg-emerald-100 text-emerald-800 border-emerald-200'],
            'pending'   => ['label' => 'Diproses',  'class' => 'bg-amber-100 text-amber-800 border-amber-200'],
            'ditolak'   => ['label' => 'Ditolak',   'class' => 'bg-red-100 text-red-800 border-red-200'],
        ];
    @endphp

    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-3xl font-headline font-extrabold text-[#002045] mb-2">Riwayat Peminjaman</h2>
        <p class="text-slate-500 text-sm">Pantau status pengajuan peminjaman ruangan Anda secara real-time.</p>
    </div>

    {{-- Filter Tab --}}
    <div class="flex items-center gap-2 mb-8 p-1 bg-slate-200/50 rounded-lg w-fit">
        <button class="px-6 py-2 rounded-md text-sm font-bold bg-white text-[#002045] shadow-sm">Semua</button>
        <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Diproses</button>
        <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Disetujui</button>
        <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Ditolak</button>
    </div>

    {{-- Daftar Riwayat --}}
    <div class="grid grid-cols-1 gap-6 mb-10">
        
        @forelse ($riwayats as $item)
            @php $style = $statusStyles[$item['status']]; @endphp
            
            <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center border border-slate-200 hover:shadow-md transition-all group">
                <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100">
                    <img alt="{{ $item['ruangan'] }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         src="{{ $item['image'] }}">
                </div>
                <div class="flex-1 space-y-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 bg-slate-100 px-2 py-1 rounded">{{ $item['id_req'] }}</span>
                    <h3 class="text-xl font-headline font-bold text-[#002045]">{{ $item['ruangan'] }} - {{ $item['gedung'] }}</h3>
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
                        <span class="text-xs font-bold px-3 py-1 rounded-full border {{ $style['class'] }}">
                            {{ $style['label'] }}
                        </span>
                    </div>
                    <a href="/user/riwayat-detail?status={{ $item['status'] }}"
                       class="bg-white border-2 border-[#002045] text-[#002045] text-center px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors w-full md:w-auto">
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