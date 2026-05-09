@extends('layouts.user')

@section('title', 'Isi Detail Peminjaman')

@section('content')

    {{-- Breadcrumb --}}
    <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500">
        <a class="hover:text-[#002045] font-medium transition-colors flex items-center gap-1" href="/user/ajukan">
            <span class="material-symbols-outlined text-base">arrow_back</span> Kembali
        </a>
    </nav>

    {{-- Stepper --}}
    <div class="mb-10 max-w-3xl mx-auto">
        <div class="flex items-center justify-between relative">
            <div class="absolute top-1/2 left-0 w-full h-1 bg-slate-200 -translate-y-1/2 z-0"></div>
            <div class="absolute top-1/2 left-0 w-1/2 h-1 bg-[#002045] -translate-y-1/2 z-0"></div>

            <div class="relative z-10 flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-[20px]">check</span>
                </div>
                <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Pilih Ruangan</span>
            </div>

            <div class="relative z-10 flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-lg ring-4 ring-white">2</div>
                <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Isi Detail</span>
            </div>

            <div class="relative z-10 flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold border-2 border-white">3</div>
                <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Konfirmasi</span>
            </div>
        </div>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <div class="p-8 border-b border-slate-100">
            <h2 class="text-2xl font-extrabold text-[#002045] font-headline">Detail Peminjaman Ruangan</h2>
            <p class="text-slate-500 text-sm mt-1">Lengkapi informasi di bawah ini untuk mengajukan permohonan.</p>
        </div>

        <form action="#" method="POST" class="p-8">
            @csrf

            {{-- Info Ruangan Terpilih --}}
            <div class="bg-slate-50 p-6 rounded-xl flex flex-col sm:flex-row items-start sm:items-center justify-between border border-slate-200 mb-8">
                <div class="flex items-center gap-5">
                    <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0 border border-slate-200">
                        <img alt="Ruang Teater"
                             class="w-full h-full object-cover"
                             src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=200&q=80">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Ruangan Terpilih</label>
                        <h3 class="text-xl font-bold text-[#002045] font-headline">Ruang Teater - Gedung A</h3>
                        <div class="flex items-center gap-3 mt-1">
                            <span class="flex items-center gap-1 text-xs text-slate-500 font-medium">
                                <span class="material-symbols-outlined text-sm">groups</span> 50 Kapasitas
                            </span>
                        </div>
                    </div>
                </div>
                <a href="/user/ajukan" class="mt-4 sm:mt-0 text-[#002045] font-bold text-sm hover:underline">
                    Ubah Ruangan
                </a>
            </div>

            {{-- Input Fields --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                {{-- Kiri --}}
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Tanggal Peminjaman</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">calendar_today</span>
                            <input class="w-full pl-10 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none text-sm"
                                   type="date" value="2026-10-24">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Waktu Mulai</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">schedule</span>
                                <input class="w-full pl-10 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 outline-none text-sm"
                                       type="time" value="10:00">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Waktu Selesai</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">schedule</span>
                                <input class="w-full pl-10 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 outline-none text-sm"
                                       type="time" value="11:00">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Estimasi Jumlah Peserta</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">group_add</span>
                            <input class="w-full pl-10 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 outline-none text-sm"
                                   placeholder="Contoh: 40" type="number" min="1">
                        </div>
                        <p class="text-[10px] text-slate-400 mt-2 italic">*Maksimal kapasitas ruangan ini adalah 50 orang.</p>
                    </div>

                    <div class="pt-2">
                        <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Fasilitas Ruangan</label>
                        <div class="bg-blue-50/50 border border-blue-100 rounded-xl p-4">
                            <p class="text-xs text-slate-500 mb-3 leading-relaxed">
                                Ruangan ini dilengkapi dengan fasilitas berikut yang dapat Anda gunakan selama sesi peminjaman:
                            </p>
                            <ul class="space-y-2.5">
                                {{-- Looping data fasilitas dari Controller --}}
                                @forelse ($fasilitas ?? [] as $item)
                                    <li class="flex items-center gap-3 text-sm text-[#002045] font-semibold">
                                        <div class="w-7 h-7 rounded bg-white border {{ $item['border_color'] }} flex items-center justify-center {{ $item['text_color'] }} shrink-0">
                                            <span class="material-symbols-outlined text-[16px]">{{ $item['icon'] }}</span>
                                        </div>
                                        {{ $item['nama'] }}
                                    </li>
                                @empty
                                    <li class="text-sm text-slate-500 italic">
                                        Tidak ada fasilitas khusus yang terdaftar untuk ruangan ini.
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Kanan --}}
                <div class="space-y-6">
                    {{-- Pilihan Jenis Kegiatan --}}
                    <div>
                        <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Jenis Kegiatan</label>
                        <select class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 outline-none text-sm font-medium">
                            <option value="" disabled selected>Pilih kategori kegiatan</option>
                            <option value="sidang">Sidang</option>
                            <option value="ormawa">Ormawa</option>
                            <option value="fakultas">Fakultas</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Nama Kegiatan</label>
                        <input class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 outline-none text-sm"
                               placeholder="Masukkan judul kegiatan" type="text">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Keperluan</label>
                        <textarea class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 outline-none text-sm resize-none"
                                  placeholder="Jelaskan secara detail maksud penggunaan ruangan ini..."
                                  rows="4"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">
                            Surat Permohonan <span class="text-red-500">*</span>
                        </label>
                        <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 flex flex-col items-center justify-center bg-slate-50 hover:bg-blue-50/30 hover:border-blue-400 transition-all cursor-pointer relative">
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".pdf,.doc,.docx">
                            <span class="material-symbols-outlined text-4xl text-slate-400 mb-3">upload_file</span>
                            <p class="text-sm font-bold text-[#002045]">Klik atau seret file ke sini</p>
                            <p class="text-[10px] text-slate-500 mt-1.5">PDF, DOC, DOCX (Maks. 5MB)</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex items-center justify-between pt-8 border-t border-slate-100 mt-8">
                <a href="/user/ajukan"
                   class="px-8 py-3.5 rounded-lg border border-slate-200 bg-white text-slate-600 font-bold text-sm hover:bg-slate-50 flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">chevron_left</span> Kembali
                </a>
                <a href="/user/ajukan-konfirmasi"
                   class="px-10 py-3.5 rounded-lg bg-primary-gradient text-white font-bold text-sm shadow-lg hover:opacity-95 flex items-center gap-2">
                    Lanjutkan ke Konfirmasi
                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                </a>
            </div>
        </form>
    </div>

    {{-- Info Box --}}
    <div class="mt-6 flex items-start gap-4 p-5 rounded-xl bg-blue-50 border border-blue-100">
        <span class="material-symbols-outlined text-blue-700">info</span>
        <p class="text-xs text-slate-600 leading-relaxed">
            <strong>Informasi Penting:</strong> Pengajuan ini akan langsung diteruskan ke Admin SIMPRU untuk ditinjau.
            Pastikan deskripsi kegiatan dan berkas surat permohonan sudah benar.
        </p>
    </div>

@endsection
