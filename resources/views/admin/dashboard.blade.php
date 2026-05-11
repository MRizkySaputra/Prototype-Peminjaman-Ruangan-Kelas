@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    {{-- Selamat Datang --}}
    <div class="flex flex-col md:flex-row justify-between items-end gap-6 bg-white p-8 rounded-2xl shadow-sm border border-slate-200 mb-8">
        <div class="space-y-2">
            <h2 class="text-3xl font-extrabold tracking-tight text-[#002045] font-headline">Selamat Datang, Admin 👋</h2>
            <p class="text-slate-500 font-medium">Berikut ringkasan aktivitas sistem hari ini.</p>
        </div>
        <div class="flex gap-3">
            <a href="/admin/jadwal"
               class="flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-[#002045] rounded-lg font-bold text-sm hover:bg-slate-50 shadow-sm transition-colors">
                <span class="material-symbols-outlined text-sm">calendar_month</span>
                Lihat Jadwal
            </a>
            <a href="/admin/permohonan"
               class="flex items-center gap-2 px-5 py-2.5 bg-primary-gradient text-white rounded-lg font-bold text-sm shadow-md hover:opacity-95 transition-all">
                <span class="material-symbols-outlined text-sm">inbox</span>
                Tinjau Permohonan
            </a>
        </div>
    </div>

    {{-- Kartu Statistik Utama --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

        {{-- Total Ruangan --}}
        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-5">
                <div class="p-2.5 bg-blue-50 text-[#002045] rounded-lg group-hover:bg-[#002045] group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">meeting_room</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Ruangan</span>
            </div>
            <p class="text-4xl font-black text-[#002045] font-headline">{{ $stats['total_ruangan'] ?? 0 }}</p>
            <div class="flex items-center gap-2 mt-3 pt-3 border-t border-slate-100">
                <span class="flex items-center gap-1 text-xs font-bold text-emerald-600">
                    <span class="material-symbols-outlined text-sm">arrow_upward</span> {{ $stats['ruangan_tersedia'] ?? 0 }}
                </span>
                <span class="text-xs text-slate-400 font-medium">tersedia hari ini</span>
            </div>
        </div>

        {{-- Permohonan --}}
        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-5">
                <div class="p-2.5 bg-amber-50 text-amber-600 rounded-lg group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Permohonan</span>
            </div>
            <p class="text-4xl font-black text-amber-600 font-headline">{{ $stats['total_permohonan'] ?? 0 }}</p>
            <div class="flex items-center gap-2 mt-3 pt-3 border-t border-slate-100">
                <span class="flex items-center gap-1 text-xs font-bold text-red-500">
                    <span class="material-symbols-outlined text-sm">priority_high</span> {{ $stats['permohonan_menunggu'] ?? 0 }}
                </span>
                <span class="text-xs text-slate-400 font-medium">menunggu tinjauan</span>
            </div>
        </div>

        {{-- Disetujui --}}
        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-5">
                <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-lg group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">check_circle</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widests">Disetujui</span>
            </div>
            <p class="text-4xl font-black text-emerald-600 font-headline">{{ $stats['total_disetujui'] ?? 0 }}</p>
            <div class="flex items-center gap-2 mt-3 pt-3 border-t border-slate-100">
                <span class="flex items-center gap-1 text-xs font-bold text-emerald-600">
                    <span class="material-symbols-outlined text-sm">trending_up</span> {{ $stats['persentase_disetujui'] ?? '+0%' }}
                </span>
                <span class="text-xs text-slate-400 font-medium">bulan ini</span>
            </div>
        </div>

        {{-- Ditolak --}}
        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-5">
                <div class="p-2.5 bg-red-50 text-red-500 rounded-lg group-hover:bg-red-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widests">Ditolak</span>
            </div>
            {{-- Menggunakan str_pad agar angka di bawah 10 tetap memiliki angka 0 di depannya (contoh: 07) --}}
            <p class="text-4xl font-black text-red-500 font-headline">{{ str_pad($stats['total_ditolak'] ?? 0, 2, '0', STR_PAD_LEFT) }}</p>
            <div class="flex items-center gap-2 mt-3 pt-3 border-t border-slate-100">
                <span class="flex items-center gap-1 text-xs font-bold text-slate-500">
                    <span class="material-symbols-outlined text-sm">trending_down</span> {{ $stats['persentase_ditolak'] ?? '-0%' }}
                </span>
                <span class="text-xs text-slate-400 font-medium">bulan ini</span>
            </div>
        </div>

    </div>

    {{-- Row: Permohonan Menunggu + Aktivitas Terkini --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">

        {{-- Permohonan Menunggu --}}
        <div class="lg:col-span-7 bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                <div>
                    <h3 class="font-headline text-base font-bold text-[#002045]">Permohonan Menunggu Tinjauan</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Memerlukan tindakan segera</p>
                </div>
                <a href="/admin/permohonan" class="text-xs font-bold text-[#002045] hover:underline flex items-center gap-1">
                    Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
            <div class="divide-y divide-slate-100">

                @php
                $menungguList = [
                    ['init' => 'AN', 'color' => 'blue', 'name' => 'Aditya Nugraha', 'role' => 'Mahasiswa', 'room' => 'Lab Komputer 03', 'date' => '24 Okt 2026', 'time' => '09:00 - 12:00', 'purpose' => 'Praktikum Algoritma Lanjut', 'urgent' => true],
                    ['init' => 'SR', 'color' => 'purple', 'name' => 'Siti Rahayu', 'role' => 'Dosen', 'room' => 'Ruang Teater A', 'date' => '25 Okt 2026', 'time' => '13:00 - 15:30', 'purpose' => 'Seminar Nasional Robotika', 'urgent' => false],
                    ['init' => 'BEM', 'color' => 'orange', 'name' => 'BEM Fakultas Teknik', 'role' => 'Organisasi', 'room' => 'R. Rapat Senat', 'date' => '26 Okt 2026', 'time' => '10:00 - 11:30', 'purpose' => 'Rapat Koordinasi BEM', 'urgent' => false],
                    ['init' => 'DL', 'color' => 'emerald', 'name' => 'Diana Lestari', 'role' => 'Staf Akademik', 'room' => 'Aula Utama', 'date' => '28 Okt 2026', 'time' => '08:00 - 17:00', 'purpose' => 'Wisuda Gelombang II', 'urgent' => true],
                ];
                $colorMap = [
                    'blue' => 'bg-blue-100 text-blue-800',
                    'purple' => 'bg-purple-100 text-purple-800',
                    'orange' => 'bg-orange-100 text-orange-800',
                    'emerald' => 'bg-emerald-100 text-emerald-800',
                ];
                @endphp

                @foreach ($menungguList as $item)
                <div class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50/50 transition-colors">
                    <div class="w-9 h-9 rounded-full {{ $colorMap[$item['color']] }} flex items-center justify-center text-xs font-bold shrink-0">
                        {{ $item['init'] }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <p class="text-sm font-bold text-[#002045] truncate">{{ $item['name'] }}</p>
                            @if ($item['urgent'])
                                <span class="px-1.5 py-0.5 bg-red-100 text-red-600 text-[9px] font-bold rounded uppercase tracking-wider shrink-0">Urgent</span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-500 truncate">{{ $item['room'] }} • {{ $item['date'] }}, {{ $item['time'] }}</p>
                    </div>
                    <div class="flex items-center gap-1.5 shrink-0">
                        <a href="/admin/detail-permohonan" class="p-1.5 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded-lg transition-all" title="Detail">
                            <span class="material-symbols-outlined text-sm">visibility</span>
                        </a>
                        <button class="p-1.5 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded-lg transition-all" title="Setujui">
                            <span class="material-symbols-outlined text-sm">check</span>
                        </button>
                        <button class="p-1.5 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all" title="Tolak">
                            <span class="material-symbols-outlined text-sm">close</span>
                        </button>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        {{-- Aktivitas Terkini + Ruangan Paling Sering Dipinjam --}}
        <div class="lg:col-span-5 flex flex-col gap-6">

            {{-- Aktivitas Terkini --}}
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex-1">
                <div class="px-6 py-5 border-b border-slate-200">
                    <h3 class="font-headline text-base font-bold text-[#002045]">Aktivitas Terkini</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Log perubahan status hari ini</p>
                </div>
                <div class="divide-y divide-slate-100">
                    @php
                    $activities = [
                        ['icon' => 'check_circle', 'color' => 'text-emerald-600 bg-emerald-50', 'msg' => 'Permohonan <strong>Ahmad Fauzi</strong> disetujui', 'time' => '09:15'],
                        ['icon' => 'cancel', 'color' => 'text-red-500 bg-red-50', 'msg' => 'Permohonan <strong>Budi Santoso</strong> ditolak', 'time' => '08:42'],
                        ['icon' => 'add_circle', 'color' => 'text-blue-600 bg-blue-50', 'msg' => 'Permohonan baru dari <strong>Diana Lestari</strong>', 'time' => '08:10'],
                        ['icon' => 'edit', 'color' => 'text-amber-600 bg-amber-50', 'msg' => 'Ruangan <strong>Lab Komputer 02</strong> diperbarui', 'time' => 'Kemarin'],
                        ['icon' => 'person_add', 'color' => 'text-purple-600 bg-purple-50', 'msg' => 'Pengguna baru <strong>Rina Marlina</strong> terdaftar', 'time' => 'Kemarin'],
                    ];
                    @endphp
                    @foreach ($activities as $act)
                    <div class="flex items-start gap-3 px-6 py-3.5 hover:bg-slate-50/50 transition-colors">
                        <div class="w-7 h-7 rounded-full {{ $act['color'] }} flex items-center justify-center shrink-0 mt-0.5">
                            <span class="material-symbols-outlined text-[14px]">{{ $act['icon'] }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs text-slate-700 leading-relaxed">{!! $act['msg'] !!}</p>
                        </div>
                        <span class="text-[10px] text-slate-400 font-medium shrink-0">{{ $act['time'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    {{-- Row: Penggunaan Ruangan + Jadwal Hari Ini --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        {{-- Top Ruangan Paling Sering Dipinjam --}}
        <div class="lg:col-span-5 bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-200">
                <h3 class="font-headline text-base font-bold text-[#002045]">Ruangan Paling Aktif</h3>
                <p class="text-xs text-slate-400 mt-0.5">Berdasarkan jumlah peminjaman bulan ini</p>
            </div>
            <div class="p-6 space-y-4">
                @php
                $topRooms = [
                    ['name' => 'R. Seminar B', 'building' => 'Gedung B', 'count' => 124, 'pct' => 100],
                    ['name' => 'Auditorium Utama', 'building' => 'Gedung A', 'count' => 86, 'pct' => 69],
                    ['name' => 'Lab Komputer 01', 'building' => 'Gedung B', 'count' => 78, 'pct' => 63],
                    ['name' => 'R. Kelas Umum', 'building' => 'Gedung C', 'count' => 64, 'pct' => 52],
                    ['name' => 'Lab Komputer 02', 'building' => 'Gedung B', 'count' => 42, 'pct' => 34],
                ];
                @endphp
                @foreach ($topRooms as $i => $r)
                <div class="flex items-center gap-4">
                    <span class="text-xs font-black text-slate-400 w-4 shrink-0">{{ $i + 1 }}</span>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-center mb-1.5">
                            <p class="text-sm font-bold text-slate-800 truncate">{{ $r['name'] }}</p>
                            <span class="text-xs font-bold text-[#002045] ml-2 shrink-0">{{ $r['count'] }}x</span>
                        </div>
                        <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-[#002045] rounded-full transition-all" style="width: {{ $r['pct'] }}%"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Jadwal Hari Ini (mini) --}}
        <div class="lg:col-span-7 bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                <div>
                    <h3 class="font-headline text-base font-bold text-[#002045]">Jadwal Hari Ini</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Jumat, 24 Oktober 2026</p>
                </div>
                <a href="/admin/jadwal" class="text-xs font-bold text-[#002045] hover:underline flex items-center gap-1">
                    Kalender Penuh <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
            <div class="divide-y divide-slate-100">
                @php
                $todaySchedule = [
                    ['time' => '08:00 - 11:00', 'room' => 'Auditorium Utama', 'event' => 'Wisuda Gelombang II', 'person' => 'Diana Lestari', 'status' => 'approved'],
                    ['time' => '09:00 - 11:00', 'room' => 'Ruang Teater A', 'event' => 'Praktikum Algoritma', 'person' => 'Aditya Nugraha', 'status' => 'approved'],
                    ['time' => '09:00 - 10:00', 'room' => 'R. Rapat Senat', 'event' => 'Rapat Koordinasi', 'person' => 'Bambang P.', 'status' => 'menunggu'],
                    ['time' => '13:00 - 15:00', 'room' => 'Lab Komputer 02', 'event' => 'Pemrograman Web', 'person' => 'Ahmad Fauzi', 'status' => 'approved'],
                    ['time' => '13:00 - 15:00', 'room' => 'Auditorium Utama', 'event' => 'Seminar Nasional', 'person' => 'BEM FT', 'status' => 'menunggu'],
                ];
                $statusStyles = [
                    'approved' => ['dot' => 'bg-emerald-500', 'badge' => 'bg-emerald-100 text-emerald-700', 'label' => 'Disetujui'],
                    'menunggu'  => ['dot' => 'bg-amber-400', 'badge' => 'bg-amber-100 text-amber-700', 'label' => 'Menunggu'],
                ];
                @endphp
                @foreach ($todaySchedule as $sched)
                @php $ss = $statusStyles[$sched['status']]; @endphp
                <div class="flex items-center gap-4 px-6 py-3.5 hover:bg-slate-50/50 transition-colors">
                    <div class="text-right shrink-0 w-24">
                        <p class="text-[11px] font-bold text-[#002045]">{{ explode(' - ', $sched['time'])[0] }}</p>
                        <p class="text-[10px] text-slate-400">{{ explode(' - ', $sched['time'])[1] }}</p>
                    </div>
                    <div class="w-px h-8 bg-slate-200 shrink-0"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ $sched['event'] }}</p>
                        <p class="text-xs text-slate-500">{{ $sched['room'] }} • {{ $sched['person'] }}</p>
                    </div>
                    <span class="px-2.5 py-1 text-[10px] font-bold rounded-full {{ $ss['badge'] }} uppercase tracking-wider shrink-0 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full {{ $ss['dot'] }}"></span>
                        {{ $ss['label'] }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
