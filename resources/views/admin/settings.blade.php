@extends('layouts.admin')

@section('title', 'Pengaturan Aplikasi')

@section('content')

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Pengaturan Aplikasi</h2>
            <p class="text-slate-500 text-sm mt-1">Kelola identitas, dan konfigurasi sistem SIMPRU.</p>
        </div>
        <button onclick="saveSettings()"
                class="bg-primary-gradient text-white px-6 py-2.5 rounded-lg font-bold text-sm flex items-center gap-2 hover:opacity-95 shadow-md self-start md:self-auto">
            <span class="material-symbols-outlined text-sm">save</span>
            Simpan Perubahan
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- Sidebar Tab Navigasi --}}
        <div class="lg:col-span-3">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden sticky top-24">
                <div class="p-4 border-b border-slate-100 bg-slate-50">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Menu Pengaturan</p>
                </div>
                <nav class="p-2 space-y-0.5">
                    <button onclick="switchTab('identitas')" id="tab-identitas"
                            class="settings-tab w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold text-[#002045] bg-blue-50 border-l-4 border-[#002045] text-left transition-all">
                        <span class="material-symbols-outlined text-base">business</span>
                        Identitas Aplikasi
                    </button>
                    <button onclick="switchTab('notifikasi')" id="tab-notifikasi"
                            class="settings-tab w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-slate-500 hover:bg-slate-50 hover:text-[#002045] text-left transition-all">
                        <span class="material-symbols-outlined text-base">notifications</span>
                        Notifikasi Email
                    </button>
                    <button onclick="switchTab('peminjaman')" id="tab-peminjaman"
                            class="settings-tab w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-slate-500 hover:bg-slate-50 hover:text-[#002045] text-left transition-all">
                        <span class="material-symbols-outlined text-base">rule_settings</span>
                        Aturan Peminjaman
                    </button>
                    <button onclick="switchTab('sistem')" id="tab-sistem"
                            class="settings-tab w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-slate-500 hover:bg-slate-50 hover:text-[#002045] text-left transition-all">
                        <span class="material-symbols-outlined text-base">dns</span>
                        Sistem & Backup
                    </button>
                </nav>
            </div>
        </div>

        {{-- Konten Panel --}}
        <div class="lg:col-span-9 space-y-6">

            {{-- ===== PANEL: IDENTITAS APLIKASI ===== --}}
            <div id="panel-identitas" class="settings-panel space-y-6">

                {{-- Logo & Nama --}}
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-50 text-[#002045] rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">business</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#002045] font-headline">Logo & Nama Aplikasi</h3>
                            <p class="text-xs text-slate-400">Atur identitas visual utama SIMPRU</p>
                        </div>
                    </div>
                    <div class="p-6 space-y-6">

                        {{-- Upload Logo --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-3">Logo Utama</label>
                                <div class="border-2 border-dashed border-slate-300 rounded-xl p-6 flex flex-col items-center justify-center bg-slate-50 hover:bg-blue-50/30 hover:border-blue-400 transition-all cursor-pointer relative group"
                                     onclick="document.getElementById('logoInput').click()">
                                    <input type="file" id="logoInput" accept="image/*" class="hidden" onchange="previewLogo(this, 'logoPreview')">
                                    <div id="logoPreview" class="w-20 h-20 bg-[#002045] rounded-xl flex items-center justify-center text-white mb-3 overflow-hidden shadow-sm">
                                        <span class="material-symbols-outlined text-3xl">account_balance</span>
                                    </div>
                                    <p class="text-xs font-bold text-[#002045]">Klik untuk unggah logo</p>
                                    <p class="text-[10px] text-slate-400 mt-1">PNG, SVG (Maks. 2MB)</p>
                                    <div class="absolute inset-0 bg-blue-500/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-3">Favicon</label>
                                <div class="border-2 border-dashed border-slate-300 rounded-xl p-6 flex flex-col items-center justify-center bg-slate-50 hover:bg-blue-50/30 hover:border-blue-400 transition-all cursor-pointer relative group"
                                     onclick="document.getElementById('faviconInput').click()">
                                    <input type="file" id="faviconInput" accept="image/*" class="hidden" onchange="previewLogo(this, 'faviconPreview')">
                                    <div id="faviconPreview" class="w-16 h-16 bg-slate-200 rounded-lg flex items-center justify-center text-slate-500 mb-3 overflow-hidden shadow-sm">
                                        <span class="material-symbols-outlined text-2xl">tab</span>
                                    </div>
                                    <p class="text-xs font-bold text-[#002045]">Klik untuk unggah favicon</p>
                                    <p class="text-[10px] text-slate-400 mt-1">ICO, PNG 32×32px</p>
                                </div>
                            </div>
                        </div>

                        {{-- Nama & Tagline --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Nama Aplikasi</label>
                                <input type="text" value="SIMPRU"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-bold text-slate-800 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Singkatan / Inisial</label>
                                <input type="text" value="SIMPRU"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium text-slate-800 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Tagline / Deskripsi Singkat</label>
                                <input type="text" value="Sistem Informasi Manajemen Peminjaman Ruangan"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium text-slate-800 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Informasi Institusi --}}
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">domain</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#002045] font-headline">Informasi Institusi</h3>
                            <p class="text-xs text-slate-400">Data lembaga yang akan muncul di dokumen resmi</p>
                        </div>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Nama Institusi</label>
                            <input type="text" value="Universitas Ma'soem"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium text-slate-800 focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Alamat</label>
                            <textarea rows="2"
                                      class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium text-slate-800 focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all resize-none">Jl. H.A.A. Sanusi No.1, Cicadas, Kec. Sagalaherang, Kabupaten Subang, Jawa Barat 41212</textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Telepon</label>
                            <input type="text" value="+62 264 517 622"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium text-slate-800 focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Website</label>
                            <input type="url" value="https://masoem.ac.id"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium text-slate-800 focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Footer Teks (tampil di bawah halaman)</label>
                            <input type="text" value="© 2026 Ma'soem University • All Rights Reserved"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium text-slate-800 focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all">
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== PANEL: NOTIFIKASI EMAIL ===== --}}
            <div id="panel-notifikasi" class="settings-panel hidden space-y-6">

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-3">
                        <div class="w-8 h-8 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">mail</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#002045] font-headline">Konfigurasi Email (SMTP)</h3>
                            <p class="text-xs text-slate-400">Pengaturan server email untuk pengiriman notifikasi</p>
                        </div>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">SMTP Host</label>
                            <input type="text" value="smtp.masoem.ac.id"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Port</label>
                            <input type="number" value="587"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Username SMTP</label>
                            <input type="email" value="noreply@masoem.ac.id"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Password SMTP</label>
                            <div class="relative">
                                <input type="password" value="secret_password" id="smtpPass"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 pr-10 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                                <button onclick="toggleSmtp()" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-[#002045]">
                                    <span id="smtpIcon" class="material-symbols-outlined text-sm">visibility</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Enkripsi</label>
                            <select class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                                <option selected>TLS</option>
                                <option>SSL</option>
                                <option>None</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Nama Pengirim</label>
                            <input type="text" value="SIMPRU - Ma'soem University"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <button class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg text-sm font-bold hover:bg-emerald-700 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">send</span>
                                Kirim Email Uji Coba
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Trigger Notifikasi --}}
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-3">
                        <div class="w-8 h-8 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">notifications_active</span>
                        </div>
                        <h3 class="font-bold text-[#002045] font-headline">Trigger Notifikasi Otomatis</h3>
                    </div>
                    <div class="p-6 space-y-3">
                        @php
                        $triggers = [
                            ['label' => 'Permohonan baru masuk', 'sub' => 'Kirim notifikasi ke admin saat ada pengajuan baru', 'checked' => true],
                            ['label' => 'Permohonan disetujui', 'sub' => 'Kirim notifikasi ke peminjam saat permohonan disetujui', 'checked' => true],
                            ['label' => 'Permohonan ditolak', 'sub' => 'Kirim notifikasi ke peminjam saat permohonan ditolak', 'checked' => true],
                            ['label' => 'Pengingat jadwal (H-1)', 'sub' => 'Ingatkan peminjam sehari sebelum jadwal penggunaan', 'checked' => false],
                            ['label' => 'Sesi peminjaman berakhir', 'sub' => 'Notifikasi saat waktu peminjaman telah usai', 'checked' => false],
                            ['label' => 'Laporan mingguan ke admin', 'sub' => 'Ringkasan aktivitas dikirim setiap Senin pagi', 'checked' => true],
                        ];
                        @endphp
                        @foreach ($triggers as $t)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                            <div>
                                <p class="text-sm font-bold text-slate-700">{{ $t['label'] }}</p>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $t['sub'] }}</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" {{ $t['checked'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#002045]"></div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ===== PANEL: ATURAN PEMINJAMAN ===== --}}
            <div id="panel-peminjaman" class="settings-panel hidden space-y-6">

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-50 text-[#002045] rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">rule</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#002045] font-headline">Batas Waktu Peminjaman</h3>
                            <p class="text-xs text-slate-400">Atur batas-batas waktu penggunaan sistem</p>
                        </div>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Pengajuan Paling Cepat (hari sebelumnya)</label>
                            <div class="flex items-center gap-3">
                                <input type="number" value="1" min="0"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-[#002045]/20 outline-none">
                                <span class="text-sm font-medium text-slate-500 shrink-0">hari</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Pengajuan Paling Lambat (hari sebelumnya)</label>
                            <div class="flex items-center gap-3">
                                <input type="number" value="30" min="1"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-[#002045]/20 outline-none">
                                <span class="text-sm font-medium text-slate-500 shrink-0">hari</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Durasi Maksimum Peminjaman</label>
                            <div class="flex items-center gap-3">
                                <input type="number" value="8" min="1"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-[#002045]/20 outline-none">
                                <span class="text-sm font-medium text-slate-500 shrink-0">jam</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Batas Pengajuan Aktif per Pengguna</label>
                            <div class="flex items-center gap-3">
                                <input type="number" value="3" min="1"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-[#002045]/20 outline-none">
                                <span class="text-sm font-medium text-slate-500 shrink-0">pengajuan</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Jam Operasional Mulai</label>
                            <input type="time" value="07:00"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Jam Operasional Selesai</label>
                            <input type="time" value="21:00"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        </div>
                    </div>
                </div>

                {{-- Kebijakan --}}
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-3">
                        <div class="w-8 h-8 bg-red-50 text-red-500 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">policy</span>
                        </div>
                        <h3 class="font-bold text-[#002045] font-headline">Kebijakan & Peraturan</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                            <div>
                                <p class="text-sm font-bold text-slate-700">Wajib Upload Surat Permohonan</p>
                                <p class="text-xs text-slate-400 mt-0.5">Pengajuan tanpa surat tidak dapat diproses</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#002045]"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                            <div>
                                <p class="text-sm font-bold text-slate-700">Izinkan Peminjaman di Hari Libur</p>
                                <p class="text-xs text-slate-400 mt-0.5">Ruangan dapat dipinjam pada hari libur nasional</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#002045]"></div>
                            </label>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Syarat & Ketentuan Penggunaan</label>
                            <textarea rows="5"
                                      class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-sm text-slate-700 focus:ring-2 focus:ring-[#002045]/20 outline-none resize-none">1. Peminjam bertanggung jawab penuh atas kebersihan dan keamanan ruangan.
2. Ruangan harus dikembalikan dalam kondisi semula setelah penggunaan.
3. Dilarang melakukan perubahan fisik terhadap fasilitas ruangan.
4. Peminjam wajib hadir tepat waktu sesuai jadwal yang disetujui.
5. Pelanggaran dapat mengakibatkan pemblokiran akun peminjaman.</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== PANEL: SISTEM & BACKUP ===== --}}
            <div id="panel-sistem" class="settings-panel hidden space-y-6">

                {{-- Info Sistem --}}
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-3">
                        <div class="w-8 h-8 bg-slate-100 text-slate-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">info</span>
                        </div>
                        <h3 class="font-bold text-[#002045] font-headline">Informasi Sistem</h3>
                    </div>
                    <div class="p-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                        @php
                        $sysInfo = [
                            ['label' => 'Versi Aplikasi', 'value' => 'v2.4.1', 'icon' => 'new_releases', 'color' => 'blue'],
                            ['label' => 'Versi Laravel', 'value' => '12.x', 'icon' => 'code', 'color' => 'red'],
                            ['label' => 'Versi PHP', 'value' => '8.2.0', 'icon' => 'terminal', 'color' => 'purple'],
                            ['label' => 'Database', 'value' => 'MySQL 8.0', 'icon' => 'storage', 'color' => 'emerald'],
                        ];
                        $sysColors = ['blue'=>'bg-blue-50 text-blue-700','red'=>'bg-red-50 text-red-700','purple'=>'bg-purple-50 text-purple-700','emerald'=>'bg-emerald-50 text-emerald-700'];
                        @endphp
                        @foreach ($sysInfo as $info)
                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                            <div class="w-8 h-8 {{ $sysColors[$info['color']] }} rounded-lg flex items-center justify-center mb-3">
                                <span class="material-symbols-outlined text-sm">{{ $info['icon'] }}</span>
                            </div>
                            <p class="text-lg font-black text-slate-800 font-headline">{{ $info['value'] }}</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $info['label'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Backup & Maintenance --}}
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 flex items-center gap-3">
                        <div class="w-8 h-8 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">backup</span>
                        </div>
                        <h3 class="font-bold text-[#002045] font-headline">Backup & Pemeliharaan</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <button class="p-5 bg-emerald-50 border border-emerald-200 rounded-xl hover:bg-emerald-100 transition-colors text-center group">
                                <div class="w-10 h-10 bg-emerald-600 text-white rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined">backup</span>
                                </div>
                                <p class="text-sm font-bold text-emerald-800">Buat Backup</p>
                                <p class="text-[10px] text-emerald-600 mt-1">Export seluruh data</p>
                            </button>
                            <button class="p-5 bg-blue-50 border border-blue-200 rounded-xl hover:bg-blue-100 transition-colors text-center group">
                                <div class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined">cached</span>
                                </div>
                                <p class="text-sm font-bold text-blue-800">Bersihkan Cache</p>
                                <p class="text-[10px] text-blue-600 mt-1">Optimasi performa</p>
                            </button>
                            <button onclick="openModal('maintenanceModal')" class="p-5 bg-amber-50 border border-amber-200 rounded-xl hover:bg-amber-100 transition-colors text-center group">
                                <div class="w-10 h-10 bg-amber-500 text-white rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined">construction</span>
                                </div>
                                <p class="text-sm font-bold text-amber-800">Mode Maintenance</p>
                                <p class="text-[10px] text-amber-600 mt-1">Nonaktifkan sementara</p>
                            </button>
                        </div>

                        {{-- Backup Terbaru --}}
                        <div class="mt-2">
                            <p class="text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-3">Riwayat Backup Terakhir</p>
                            <div class="space-y-2">
                                @php
                                $backups = [
                                    ['name' => 'backup_20261024_030000.sql', 'size' => '24.3 MB', 'date' => '24 Okt 2026, 03:00'],
                                    ['name' => 'backup_20261023_030000.sql', 'size' => '24.1 MB', 'date' => '23 Okt 2026, 03:00'],
                                    ['name' => 'backup_20261022_030000.sql', 'size' => '23.8 MB', 'date' => '22 Okt 2026, 03:00'],
                                ];
                                @endphp
                                @foreach ($backups as $backup)
                                <div class="flex items-center gap-4 p-3 bg-slate-50 border border-slate-200 rounded-lg">
                                    <div class="w-8 h-8 bg-slate-200 text-slate-500 rounded-lg flex items-center justify-center shrink-0">
                                        <span class="material-symbols-outlined text-sm">database</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-bold text-slate-700 truncate">{{ $backup['name'] }}</p>
                                        <p class="text-[10px] text-slate-400">{{ $backup['date'] }} • {{ $backup['size'] }}</p>
                                    </div>
                                    <button class="p-1.5 bg-white border border-slate-200 text-slate-500 hover:text-[#002045] hover:border-[#002045] rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-sm">download</span>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Zona Berbahaya --}}
                <div class="bg-white rounded-xl shadow-sm border border-red-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-red-100 bg-red-50 flex items-center gap-3">
                        <div class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-base">warning</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-red-700 font-headline">Zona Berbahaya</h3>
                            <p class="text-xs text-red-500">Tindakan di bawah ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                            <div>
                                <p class="text-sm font-bold text-slate-700">Reset Semua Data Peminjaman</p>
                                <p class="text-xs text-slate-400 mt-0.5">Hapus seluruh riwayat pengajuan dan persetujuan</p>
                            </div>
                            <button onclick="openModal('resetModal')" class="px-4 py-2 bg-red-50 border border-red-200 text-red-600 rounded-lg text-xs font-bold hover:bg-red-600 hover:text-white transition-all">
                                Reset Data
                            </button>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                            <div>
                                <p class="text-sm font-bold text-slate-700">Reset ke Pengaturan Awal</p>
                                <p class="text-xs text-slate-400 mt-0.5">Kembalikan semua konfigurasi ke nilai default</p>
                            </div>
                            <button onclick="openModal('factoryModal')" class="px-4 py-2 bg-red-50 border border-red-200 text-red-600 rounded-lg text-xs font-bold hover:bg-red-600 hover:text-white transition-all">
                                Factory Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Modal Maintenance --}}
    <div id="maintenanceModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-8 w-full max-w-sm text-center shadow-2xl mx-4">
            <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-5 border-4 border-amber-100">
                <span class="material-symbols-outlined text-3xl">construction</span>
            </div>
            <h3 class="text-xl font-bold text-[#002045] font-headline mb-2">Aktifkan Maintenance?</h3>
            <p class="text-sm text-slate-500 mb-6 leading-relaxed">Pengguna tidak dapat mengakses sistem saat mode ini aktif. Hanya Admin yang dapat masuk.</p>
            <div class="flex flex-col gap-3">
                <button class="w-full py-3 rounded-lg bg-amber-500 text-white font-bold text-sm hover:bg-amber-600">Ya, Aktifkan Mode Maintenance</button>
                <button onclick="closeModal('maintenanceModal')" class="w-full py-3 rounded-lg text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50">Batal</button>
            </div>
        </div>
    </div>

    {{-- Modal Reset Data --}}
    <div id="resetModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-8 w-full max-w-sm text-center shadow-2xl mx-4">
            <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-5 border-4 border-red-100">
                <span class="material-symbols-outlined text-3xl">delete_forever</span>
            </div>
            <h3 class="text-xl font-bold text-[#002045] font-headline mb-2">Reset Semua Data?</h3>
            <p class="text-sm text-slate-500 mb-4 leading-relaxed">Seluruh data peminjaman akan dihapus permanen dan tidak dapat dipulihkan.</p>
            <input type="text" placeholder='Ketik "HAPUS" untuk konfirmasi' class="w-full border border-red-200 bg-red-50 rounded-lg px-4 py-2.5 text-sm text-center mb-4 focus:ring-2 focus:ring-red-500/20 outline-none font-bold">
            <div class="flex flex-col gap-3">
                <button class="w-full py-3 rounded-lg bg-red-600 text-white font-bold text-sm hover:bg-red-700">Hapus Semua Data</button>
                <button onclick="closeModal('resetModal')" class="w-full py-3 rounded-lg text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50">Batal</button>
            </div>
        </div>
    </div>

    {{-- Modal Factory Reset --}}
    <div id="factoryModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-8 w-full max-w-sm text-center shadow-2xl mx-4">
            <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-5 border-4 border-red-100">
                <span class="material-symbols-outlined text-3xl">restart_alt</span>
            </div>
            <h3 class="text-xl font-bold text-[#002045] font-headline mb-2">Factory Reset?</h3>
            <p class="text-sm text-slate-500 mb-6 leading-relaxed">Semua pengaturan akan dikembalikan ke nilai bawaan. Data tidak akan terhapus.</p>
            <div class="flex flex-col gap-3">
                <button class="w-full py-3 rounded-lg bg-red-600 text-white font-bold text-sm hover:bg-red-700">Ya, Reset Pengaturan</button>
                <button onclick="closeModal('factoryModal')" class="w-full py-3 rounded-lg text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50">Batal</button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Tab Switcher
    function switchTab(name) {
        document.querySelectorAll('.settings-panel').forEach(p => p.classList.add('hidden'));
        document.querySelectorAll('.settings-tab').forEach(t => {
            t.className = 'settings-tab w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-slate-500 hover:bg-slate-50 hover:text-[#002045] text-left transition-all';
        });

        document.getElementById('panel-' + name).classList.remove('hidden');
        const activeTab = document.getElementById('tab-' + name);
        activeTab.className = 'settings-tab w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold text-[#002045] bg-blue-50 border-l-4 border-[#002045] text-left transition-all';
    }

    // Logo Preview
    function previewLogo(input, targetId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                const el = document.getElementById(targetId);
                el.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-contain p-1">`;
                el.style.background = 'white';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Color Preset
    function selectPreset(btn, color) {
        document.querySelectorAll('.color-preset').forEach(el => {
            el.className = el.className.replace('border-[#002045] bg-blue-50', 'border-slate-200');
        });
        btn.className = btn.className.replace('border-slate-200', 'border-[#002045] bg-blue-50');
        document.getElementById('primaryColor').value = color;
        document.getElementById('primaryColorText').value = color;
        document.getElementById('previewBtn').style.backgroundColor = color;
    }

    // SMTP password toggle
    function toggleSmtp() {
        const input = document.getElementById('smtpPass');
        const icon = document.getElementById('smtpIcon');
        input.type = input.type === 'password' ? 'text' : 'password';
        icon.textContent = input.type === 'password' ? 'visibility' : 'visibility_off';
    }

    // Modal
    function openModal(id) { const m = document.getElementById(id); m.classList.remove('hidden'); m.classList.add('flex'); }
    function closeModal(id) { const m = document.getElementById(id); m.classList.add('hidden'); m.classList.remove('flex'); }

    // Save Settings Toast
    function saveSettings() {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-6 right-6 z-50 bg-emerald-600 text-white px-5 py-3 rounded-xl shadow-lg flex items-center gap-2 text-sm font-bold transition-all';
        toast.innerHTML = '<span class="material-symbols-outlined text-base">check_circle</span> Pengaturan berhasil disimpan!';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // Color picker sync
    document.getElementById('primaryColor').addEventListener('input', function() {
        document.getElementById('primaryColorText').value = this.value;
        document.getElementById('previewBtn').style.backgroundColor = this.value;
    });
</script>
@endpush
