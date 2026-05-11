@extends('layouts.user')

@section('title', 'Konfirmasi Peminjaman')

@section('content')

@php
    $data = [
        'ruangan'     => request('roomName', 'Ruang Teater'),
        'gedung'      => request('building', 'A'),
        'kapasitas'   => request('capacity', 50),
        'image'       => request('img', 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=600&q=80'),
        'tanggal'     => request('date', '2026-10-24'),
        'timeStart'   => request('timeStart', '10:00'),
        'timeEnd'     => request('timeEnd', '11:00'),
        'participant' => request('participant', 40),
        'eventType'   => request('eventType', 'Sidang'),
        'eventName'   => request('eventName', 'Workshop Pemrograman'),
        'purpose'     => request('purpose', 'Praktikum Algoritma Lanjut'),
        'desc'        => request('desc', 'Tempat duduk berundak, Proyektor 4K, dan AC Central'),
    ];

    // Format Nama Gedung
    $nama_gedung = str_starts_with(strtolower($data['gedung']), 'gedung') 
                   ? $data['gedung'] 
                   : 'Gedung ' . $data['gedung'];

    // Format Tanggal (Contoh: Selasa, 24 Oktober 2026)
    $timestamp = strtotime($data['tanggal']);
    $hari_array = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    $bulan_array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
    $hari = $hari_array[date('w', $timestamp)];
    $tgl = date('j', $timestamp);
    $bln = $bulan_array[date('n', $timestamp) - 1];
    $thn = date('Y', $timestamp);
    $tanggal_format = "$hari, $tgl $bln $thn";

    // Generate Random Booking ID
    $booking_id = 'REQ-' . date('Ymd', $timestamp) . '-' . rand(100, 999);

    // Fasilitas
    $cleanedDesc = preg_replace('/^(Dilengkapi|Ruang teater dengan|Lab komputer dengan|Ruang seminar kapasitas \d+ orang dengan|Ruang rapat formal dengan)\s+/i', '', $data['desc']);
    $fasilitas_raw = preg_split('/\s*,\s*dan\s+|\s+dan\s+|\s*,\s*/i', $cleanedDesc);
    
    $fasilitas = [];
    foreach($fasilitas_raw as $fac) {
        $fac = rtrim(trim($fac), '.');
        if(!empty($fac)) {
            $fasilitas[] = ucfirst($fac);
        }
    }

    $queryString = request()->getQueryString() ? '?' . request()->getQueryString() : '';
@endphp

{{-- Breadcrumb --}}
<nav class="mb-8 flex items-center gap-2 text-sm text-slate-500">
    <a class="hover:text-[#002045] font-medium transition-colors flex items-center gap-1" href="/user/ajukan-detail{{ $queryString }}">
        <span class="material-symbols-outlined text-base">arrow_back</span> Kembali ke Detail
    </a>
</nav>

{{-- Stepper --}}
<div class="mb-10 max-w-3xl mx-auto">
    <div class="flex items-center justify-between relative">
        <div class="absolute top-1/2 left-0 w-full h-1 bg-[#002045] -translate-y-1/2 z-0"></div>

        <div class="relative z-10 flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold">
                <span class="material-symbols-outlined text-[20px]">check</span>
            </div>
            <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Pilih Ruangan</span>
        </div>

        <div class="relative z-10 flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold">
                <span class="material-symbols-outlined text-[20px]">check</span>
            </div>
            <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Isi Detail</span>
        </div>

        <div class="relative z-10 flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-lg ring-4 ring-white">3</div>
            <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Konfirmasi</span>
        </div>
    </div>
</div>

{{-- Container Utama --}}
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

    {{-- Header --}}
    <div class="p-8 border-b border-slate-100">
        <h2 class="text-2xl font-extrabold text-[#002045] font-headline">Konfirmasi Peminjaman Ruangan</h2>
        <p class="text-slate-500 text-sm mt-1">Tinjau kembali detail permohonan sebelum mengirimkannya ke pihak administrasi.</p>
    </div>

    <div class="p-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

            {{-- Detail --}}
            <div class="lg:col-span-8 space-y-6">

                <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Ruangan</label>
                            <h3 class="text-xl font-bold text-[#002045] font-headline">{{ $data['ruangan'] }}</h3>
                            <p class="text-xs text-slate-500 mt-1">{{ $nama_gedung }}</p>
                        </div>

                        <div class="text-right">
                            <p class="text-[10px] text-slate-400 uppercase">Booking ID</p>
                            <p class="font-mono text-sm font-bold text-[#002045]">#{{ $booking_id }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 text-sm">
                        <div>
                            <label class="text-[10px] text-slate-400 uppercase font-bold">Tanggal</label>
                            <div class="flex items-center gap-2 mt-1">
                                <p class="font-semibold text-slate-800">{{ $tanggal_format }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="text-[10px] text-slate-400 uppercase font-bold">Waktu</label>
                            <div class="flex items-center gap-2 mt-1">
                                <p class="font-semibold text-slate-800">{{ $data['timeStart'] }} - {{ $data['timeEnd'] }} WIB</p>
                            </div>
                        </div>

                        <div>
                            <label class="text-[10px] text-slate-400 uppercase font-bold">Jenis Kegiatan</label>
                            <p class="font-semibold text-slate-800 mt-1 text-capitalize">{{ $data['eventType'] }}</p>
                        </div>

                        <div>
                            <label class="text-[10px] text-slate-400 uppercase font-bold">Nama Kegiatan</label>
                            <div class="flex items-center gap-2 mt-1">
                                <p class="font-semibold text-slate-800">{{ $data['eventName'] }}</p>
                            </div>
                        </div>

                        
                        <div>
                            <label class="text-[10px] text-slate-400 uppercase font-bold">Estimasi Jumlah Peserta</label>
                            <p class="text-slate-700 mt-1 leading-relaxed">{{ $data['participant'] }} Orang</p>
                        </div>
                        
                        <div>
                            <label class="text-[10px] text-slate-400 uppercase font-bold">Keperluan</label>
                            <div class="flex items-center gap-2 mt-1">
                                <p class="font-semibold text-slate-800">{{ $data['purpose'] }}</p>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-[10px] text-slate-400 uppercase font-bold">Fasilitas Ruangan</label>
                            <div class="flex flex-wrap gap-2 mt-2">
                                @forelse ($fasilitas as $fac)
                                    <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">
                                        {{ $fac }}
                                    </span>
                                @empty
                                    <span class="text-sm text-slate-500 italic">Fasilitas standar tersedia.</span>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Penanggung Jawab --}}
                    <div class="mt-6 flex items-center gap-4 pt-6 border-t border-slate-200">
                        <div class="w-12 h-12 bg-white rounded-full border border-slate-200 flex items-center justify-center">
                            <span class="material-symbols-outlined text-slate-600">person</span>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Penanggung Jawab</p>
                            <p class="text-sm font-bold text-[#002045]">Ahmad Fauzi (2010411032)</p>
                        </div>
                    </div>
                </div>

                {{-- Info --}}
                <div class="bg-blue-50 p-5 rounded-xl border border-blue-100 flex gap-3">
                    <span class="material-symbols-outlined text-blue-700">info</span>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Setelah dikirim, permohonan akan diperiksa oleh Admin SIMPRU.
                        Anda akan mendapat notifikasi jika permohonan disetujui atau ditolak.
                    </p>
                </div>

            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-4 space-y-5">

                {{-- Foto --}}
                <div class="rounded-xl overflow-hidden border border-slate-200">
                    <img src="{{ $data['image'] }}" class="w-full h-48 object-cover" alt="Foto Ruangan">
                </div>

                {{-- File --}}
                <div class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-200 rounded-lg">
                    <div class="w-8 h-8 rounded bg-red-50 flex items-center justify-center text-red-500">
                        <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                    </div>

                    <div class="flex-1">
                        <p class="text-xs font-semibold text-[#002045]">Surat Permohonan.pdf</p>
                        <p class="text-[10px] text-slate-500">386 KB</p>
                    </div>

                    <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                </div>

                {{-- Tombol --}}
                <div class="space-y-3 pt-3 border-t border-slate-200">
                    <a href="/user/riwayat"
                       class="w-full bg-primary-gradient text-white font-bold py-3.5 rounded-lg flex justify-center items-center gap-2 hover:opacity-95 shadow-md">
                        Kirim Permohonan
                        <span class="material-symbols-outlined">send</span>
                    </a>

                    <a href="/user/ajukan-detail{{ $queryString }}"
                       class="w-full flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-bold py-3.5 rounded-xl hover:bg-slate-50 transition-colors">
                        Kembali Edit
                    </a>
                </div>

                <p class="text-[10px] text-center text-slate-400 italic">
                    Dengan menekan Kirim, Anda menyetujui syarat & ketentuan penggunaan ruangan.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection