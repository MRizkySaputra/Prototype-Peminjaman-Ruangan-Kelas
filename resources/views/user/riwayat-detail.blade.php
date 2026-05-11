@extends('layouts.user')

@section('title', 'Detail Peminjaman')

@section('content')

@php
    $status = request('status', 'pending'); 
    
    $dummy_data = [
        'disetujui' => [
            'id' => 'REQ-882910',
            'ruangan' => 'Lab Komputer Dasar',
            'gedung' => 'Gedung B',
            'tanggal' => '24 Okt 2026',
            'waktu' => '08:00 - 11:00 WIB',
            'jenis' => 'Kegiatan Fakultas',
            'nama_kegiatan' => 'Praktikum Jaringan',
            'peserta' => '40 Orang',
            'pic' => 'Aditya Saputra (11223344)',
            'keperluan' => 'Pelaksanaan praktikum jaringan komputer untuk mahasiswa semester 5.',
            'fasilitas' => ['40 Unit PC High-spec', 'Koneksi LAN Gigabit', 'Proyektor', 'AC Central'],
            'alasan' => null
        ],
        'pending' => [
            'id' => 'REQ-882755',
            'ruangan' => 'Ruang Teater',
            'gedung' => 'Fakultas Seni',
            'tanggal' => '25 Okt 2026',
            'waktu' => '13:00 - 15:30 WIB',
            'jenis' => 'Sidang / Seminar',
            'nama_kegiatan' => 'Seminar Nasional Robotika',
            'peserta' => '120 Orang',
            'pic' => 'Siti Rahayu (19880112)',
            'keperluan' => 'Pelaksanaan seminar nasional dengan pembicara tamu dari industri teknologi.',
            'fasilitas' => ['Sound System Premium', 'Proyektor 4K', 'Panggung Utama', 'AC Central'],
            'alasan' => null
        ],
        'ditolak' => [
            'id' => 'REQ-882735',
            'ruangan' => 'Ruang Teater',
            'gedung' => 'Fakultas Seni',
            'tanggal' => '25 Okt 2026',
            'waktu' => '15:00 - 16:30 WIB',
            'jenis' => 'Organisasi (Ormawa)',
            'nama_kegiatan' => 'Rapat Koordinasi BEM',
            'peserta' => '30 Orang',
            'pic' => 'BEM Fakultas Teknik',
            'keperluan' => 'Rapat koordinasi awal periode kepengurusan BEM.',
            'fasilitas' => ['Sound System', 'Proyektor', 'AC Central'],
            'alasan' => 'Mohon maaf, jadwal yang Anda pilih bentrok dengan jadwal pemeliharaan (maintenance) ruangan. Silakan ajukan ulang untuk tanggal yang berbeda.'
        ]
    ];

    // Ambil data sesuai status, jika tidak ada fallback ke 'pending'
    $data = $dummy_data[$status] ?? $dummy_data['pending'];
@endphp

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

    {{-- Kiri: Informasi Peminjaman --}}
    <div class="lg:col-span-7">
        <div class="bg-white rounded-xl p-8 shadow-sm border border-slate-200">

            <div class="flex justify-between items-start mb-8">
                <div>
                    <h2 class="text-2xl font-extrabold text-[#002045] font-headline tracking-tight mb-1">
                        Informasi Peminjaman
                    </h2>
                    <p class="text-sm text-slate-500">Dibuat pada 20 Okt 2026 • ID #{{ $data['id'] }}</p>
                </div>

                {{-- Badge Status Dinamis --}}
                @if($status === 'disetujui')
                    <span class="px-4 py-1.5 rounded-full bg-emerald-100 text-emerald-700 font-bold text-xs tracking-wider uppercase">
                        Disetujui
                    </span>
                @elseif($status === 'ditolak')
                    <span class="px-4 py-1.5 rounded-full bg-red-100 text-red-700 font-bold text-xs tracking-wider uppercase">
                        Ditolak
                    </span>
                @else
                    <span class="px-4 py-1.5 rounded-full bg-amber-100 text-amber-700 font-bold text-xs tracking-wider uppercase">
                        Diproses
                    </span>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">

                {{-- Alasan Penolakan (Hanya Muncul Jika Ditolak) --}}
                @if($status === 'ditolak')
                <div class="md:col-span-2">
                    <div class="bg-red-50 border border-red-100 rounded-xl p-5 flex gap-4 items-start shadow-sm">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shrink-0 shadow-sm text-red-500">
                            <span class="material-symbols-outlined text-xl">block</span>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-red-500 font-bold mb-1">Alasan Penolakan Admin</p>
                            <p class="text-sm font-medium text-red-800 leading-relaxed">
                                {{ $data['alasan'] }}
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Ruangan</p>
                    <p class="font-bold text-slate-900">{{ $data['ruangan'] }}</p>
                    <p class="text-xs text-slate-500 mt-1">{{ $data['gedung'] }}</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Tanggal & Waktu</p>
                    <p class="font-bold text-slate-900">{{ $data['tanggal'] }}</p>
                    <p class="text-xs text-slate-500 mt-1">{{ $data['waktu'] }}</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Jenis Kegiatan</p>
                    <p class="font-bold text-slate-900">{{ $data['jenis'] }}</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Nama Kegiatan</p>
                    <p class="font-bold text-[#002045] text-lg">{{ $data['nama_kegiatan'] }}</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Estimasi Peserta</p>
                    <p class="font-bold text-slate-900">{{ $data['peserta'] }}</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Penanggung Jawab</p>
                    <p class="font-bold text-slate-900">{{ $data['pic'] }}</p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Keperluan</p>
                    <p class="text-slate-700 leading-relaxed bg-slate-50 p-4 rounded-lg border border-slate-100">
                        {{ $data['keperluan'] }}
                    </p>
                </div>

                <div class="md:col-span-2 border-t border-slate-100 pt-6 mt-[-1rem]">
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Fasilitas Ruangan Tersedia</p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach($data['fasilitas'] as $fasilitas)
                            <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">
                                {{ $fasilitas }}
                            </span>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Kanan: Surat Permohonan --}}
    <div class="lg:col-span-5">
        <div class="bg-white border border-slate-200 rounded-xl p-8 sticky top-24 shadow-sm">

            <div class="flex items-center gap-3 mb-6">
                <span class="material-symbols-outlined text-[#002045] text-3xl">description</span>
                <h3 class="text-lg font-bold text-[#002045] font-headline">Dokumen Lampiran</h3>
            </div>

            <div class="aspect-[3/4] bg-slate-50 rounded-lg overflow-hidden mb-6 border border-slate-200 flex flex-col items-center justify-center p-6 text-center">
                <div class="w-16 h-16 bg-white shadow-sm rounded-full flex items-center justify-center mb-4 text-red-600">
                    <span class="material-symbols-outlined text-4xl">picture_as_pdf</span>
                </div>

                <p class="font-bold text-[#002045] mb-1">Surat_Permohonan_{{ $data['id'] }}.pdf</p>
                <p class="text-xs text-slate-500">386 KB</p>
            </div>

            <div class="space-y-3">
                <button class="w-full py-3 px-4 rounded-lg border-2 border-[#002045] text-[#002045] font-bold flex items-center justify-center gap-2 hover:bg-[#002045]/5 transition-colors">
                    <span class="material-symbols-outlined text-xl">download</span>
                    Unduh Dokumen
                </button>

                {{-- Logika Tombol Cetak Bukti --}}
                @if($status === 'ditolak')
                    <button class="w-full py-3 px-4 rounded-lg bg-slate-200 text-slate-400 font-bold flex items-center justify-center gap-2 cursor-not-allowed" disabled>
                        <span class="material-symbols-outlined text-xl">print</span>
                        Cetak Bukti (Ditolak)
                    </button>
                @elseif($status === 'pending')
                    <button class="w-full py-3 px-4 rounded-lg bg-slate-200 text-slate-400 font-bold flex items-center justify-center gap-2 cursor-not-allowed" disabled>
                        <span class="material-symbols-outlined text-xl">print</span>
                        Cetak Bukti (Menunggu)
                    </button>
                @else
                    <button class="w-full py-3 px-4 rounded-lg bg-primary-gradient text-white font-bold flex items-center justify-center gap-2 hover:opacity-90">
                        <span class="material-symbols-outlined text-xl">print</span>
                        Cetak Bukti
                    </button>
                @endif
            </div>

        </div>
    </div>

</div>

{{-- Info Box Dinamis Menyesuaikan Status --}}
@if($status === 'disetujui')
    <div class="mt-8 p-6 bg-blue-50 rounded-2xl border border-blue-100">
        <div class="flex gap-4">
            <span class="material-symbols-outlined text-blue-700 mt-0.5">lightbulb</span>
            <p class="text-sm font-medium leading-relaxed text-blue-800">
                <strong>Informasi Penting:</strong> Harap tunjukkan bukti persetujuan ini beserta Kartu Tanda Mahasiswa (KTM) kepada petugas keamanan saat tiba di lokasi untuk mendapatkan akses masuk ruangan.
            </p>
        </div>
    </div>
@elseif($status === 'ditolak')
    <div class="mt-8 p-6 bg-red-50 rounded-2xl border border-red-100">
        <div class="flex gap-4">
            <span class="material-symbols-outlined text-red-600 mt-0.5">info</span>
            <p class="text-sm font-medium leading-relaxed text-red-800">
                Permohonan Anda tidak dapat disetujui. Silakan periksa alasan penolakan di atas. 
                Anda dapat mengajukan permohonan baru melalui halaman <a href="/user/ajukan" class="font-bold underline hover:text-red-900">Jadwal & Pengajuan</a>.
            </p>
        </div>
    </div>
@else
    <div class="mt-8 p-6 bg-amber-50 rounded-2xl border border-amber-100 flex gap-4">
        <span class="material-symbols-outlined text-amber-600 mt-0.5">pending_actions</span>
        <p class="text-sm font-medium leading-relaxed text-amber-800">
            Permohonan Anda sedang dalam antrean untuk ditinjau oleh Admin SIMPRU. Harap tunggu dan periksa halaman ini secara berkala.
        </p>
    </div>
@endif

@endsection