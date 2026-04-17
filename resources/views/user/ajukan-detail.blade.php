<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Isi Detail Peminjaman - SiPinjam Ruang</title>

    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js'])
</head>

<body class="user-body antialiased">

    <aside class="fixed left-0 top-0 h-full z-40 flex flex-col w-64 border-r border-slate-200 bg-slate-50 shadow-sm">
        <div class="px-6 py-8">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-primary-gradient rounded-lg flex items-center justify-center text-white shadow-md">
                    <span class="material-symbols-outlined">school</span>
                </div>
                <div>
                    <h1 class="text-xl font-black text-[#002045] font-headline leading-tight">SIMPRU</h1>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mt-0.5">Portal Mahasiswa</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-1 overflow-y-auto mt-2">
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-100 rounded-lg transition-colors duration-200" href="/user/dashboard">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-headline text-sm font-medium">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-[#002045] font-bold border-r-4 border-[#002045] bg-blue-50/50 rounded-lg transition-all duration-200" href="user/ajukan">
                <span class="material-symbols-outlined">add_circle</span>
                <span class="font-headline text-sm font-medium">Ajukan Peminjaman</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-100 rounded-lg transition-colors duration-200" href="/user/riwayat">
                <span class="material-symbols-outlined">history</span>
                <span class="font-headline text-sm font-medium">Riwayat Peminjaman</span>
            </a>
            <!-- <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-100 rounded-lg transition-colors duration-200" href="/user/notifikasi">
                <span class="material-symbols-outlined">notifications</span>
                <span class="font-headline text-sm font-medium">Notifikasi</span>
            </a> -->
        </nav>

        <div class="p-6 mt-auto border-t border-slate-100">
            <a href="/login" class="flex items-center gap-3 text-slate-500 hover:text-red-600 transition-colors duration-200 font-medium text-sm px-2">
                <span class="material-symbols-outlined">logout</span>
                Logout
            </a>
        </div>
    </aside>

    <header class="flex justify-between items-center w-full px-8 py-4 sticky top-0 z-30 ml-64 bg-white/80 backdrop-blur-md border-b border-slate-200 max-w-[calc(100%-16rem)] shadow-sm">
        <div class="flex items-center gap-4 flex-1">
            <div class="relative w-full max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                <input class="w-full pl-10 pr-4 py-2.5 bg-slate-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 focus:bg-white outline-none transition-all" placeholder="Cari ruangan atau jadwal..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-6">
            <a href="/user/notifikasi" class="relative text-slate-600 hover:text-[#002045] transition-colors">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
            </a>
        </div>
        <div class="h-8 w-px bg-slate-200 mx-2"></div>
        <a href="/user/profil">
            <div class="flex items-center gap-3">
                <p class="text-sm font-semibold text-[#002045] font-headline hidden sm:block">Ahmad Fauzi</p>
                <img alt="User Avatar" class="w-8 h-8 rounded-full border border-slate-200 shadow-sm" src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff" />
            </div>
        </a>
    </header>

    <main class="ml-64 p-8 min-h-screen bg-[#f7fafc]">
        <div class="max-w-5xl mx-auto">

            <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                <a class="hover:text-[#002045] font-medium transition-colors" href="/user/ajukan">Kembali ke Pemilihan Ruangan</a>
            </nav>

            <div class="mb-10 max-w-3xl mx-auto">
                <div class="flex items-center justify-between relative">
                    <div class="absolute top-1/2 left-0 w-full h-1 bg-slate-200 -translate-y-1/2 z-0"></div>
                    <div class="absolute top-1/2 left-0 w-1/2 h-1 bg-[#002045] -translate-y-1/2 z-0 transition-all duration-500"></div>

                    <div class="relative z-10 flex flex-col items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold">
                            <span class="material-symbols-outlined text-[20px]">check</span>
                        </div>
                        <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Pilih Ruangan</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-lg shadow-[#002045]/20 ring-4 ring-white">
                            2
                        </div>
                        <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Isi Detail</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold border-2 border-white">
                            3
                        </div>
                        <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Konfirmasi</span>
                    </div>
                </div>
            </div>

            <div class="hidden mb-8 p-4 bg-red-50 text-red-600 border border-red-200 rounded-xl flex items-center gap-4 animate-pulse">
                <span class="material-symbols-outlined">warning</span>
                <p class="text-sm font-medium">Waktu ini sudah dipesan, silakan pilih waktu lain pada kalender.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                <div class="p-8 border-b border-slate-100 bg-white">
                    <h2 class="text-2xl font-extrabold text-[#002045] font-headline">Detail Peminjaman Ruangan</h2>
                    <p class="text-slate-500 text-sm mt-1">Lengkapi informasi di bawah ini untuk mengajukan permohonan penggunaan ruangan.</p>
                </div>

                <form action="#" method="POST" class="p-8">
                    @csrf

                    <div class="bg-slate-50 p-6 rounded-xl flex flex-col sm:flex-row items-start sm:items-center justify-between border border-slate-200 mb-8">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0 border border-slate-200">
                                <img alt="Ruang Teater" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=200&q=80" />
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Ruangan Terpilih</label>
                                <h3 class="text-xl font-bold text-[#002045] font-headline">Ruang Teater - Gedung A</h3>
                                <div class="flex items-center gap-3 mt-1">
                                    <span class="flex items-center gap-1 text-xs text-slate-500 font-medium">
                                        <span class="material-symbols-outlined text-sm">groups</span> 50 Kapasitas
                                    </span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                                    <span class="flex items-center gap-1 text-xs text-slate-500 font-medium">
                                        <span class="material-symbols-outlined text-sm">surround_sound</span> Sound System
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/user/ajukan') }}" class="mt-4 sm:mt-0 text-[#002045] font-bold text-sm hover:underline hover:text-blue-600 transition-colors">
                            Ubah Ruangan
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Tanggal Peminjaman</label>
                                <div class="relative group">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#002045] transition-colors">calendar_today</span>
                                    <input class="w-full pl-10 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all text-sm" type="date" value="2026-10-24" required />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Waktu Mulai</label>
                                    <div class="relative group">
                                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#002045] transition-colors">schedule</span>
                                        <input class="w-full pl-10 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all text-sm" type="time" value="10:00" required />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Waktu Selesai</label>
                                    <div class="relative group">
                                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#002045] transition-colors">schedule</span>
                                        <input class="w-full pl-10 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all text-sm" type="time" value="11:00" required />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Estimasi Jumlah Peserta</label>
                                <div class="relative group">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#002045] transition-colors">group_add</span>
                                    <input class="w-full pl-10 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all text-sm" placeholder="Contoh: 40" type="number" min="1" required />
                                </div>
                                <p class="text-[10px] text-slate-400 mt-2 font-medium italic">*Maksimal kapasitas ruangan ini adalah 50 orang.</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Judul/Nama Kegiatan</label>
                                <input class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all text-sm" placeholder="Masukkan judul kegiatan Anda" type="text" required />
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Tujuan / Deskripsi Kegiatan</label>
                                <textarea class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all text-sm resize-none" placeholder="Jelaskan secara detail maksud penggunaan ruangan ini..." rows="5" required></textarea>
                            </div>

                            <div class="mt-6 space-y-3">
                                <label class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">
                                    Surat Permohonan Peminjaman <span class="text-red-500">*</span>
                                </label>

                                <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 flex flex-col items-center justify-center bg-slate-50 hover:bg-blue-50/30 hover:border-blue-400 transition-all cursor-pointer group relative">
                                    <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".pdf,.doc,.docx" required>

                                    <span class="material-symbols-outlined text-4xl text-slate-400 group-hover:text-blue-500 mb-3 transition-colors">upload_file</span>
                                    <p class="text-sm font-bold text-[#002045]">Klik atau seret surat permohonan ke sini</p>
                                    <p class="text-[10px] text-slate-500 mt-1.5 font-medium">Mendukung PDF, DOC, DOCX (Maks. 5MB)</p>
                                </div>

                                <div class="mt-4 flex items-center justify-between p-4 bg-white border border-slate-200 rounded-lg shadow-sm hidden">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded bg-red-50 border border-red-100 flex items-center justify-center text-red-500">
                                            <span class="material-symbols-outlined">picture_as_pdf</span>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-sm font-bold text-[#002045] truncate">Surat_Peminjaman_Teater.pdf</p>
                                            <p class="text-[10px] text-slate-400 font-medium">1.2 MB</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                                        <button class="p-1 hover:bg-slate-100 rounded-full text-slate-400 hover:text-red-500 transition-colors" type="button">
                                            <span class="material-symbols-outlined text-lg">close</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-8 border-t border-slate-100 mt-10">
                        <a href="/user/ajukan" class="px-8 py-3.5 rounded-lg border border-slate-200 bg-white text-slate-600 font-bold text-sm hover:bg-slate-50 active:scale-95 transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">chevron_left</span> Kembali
                        </a>
                        <a href="/user/ajukan-konfirmasi" type="submit" class="px-10 py-3.5 rounded-lg bg-primary-gradient text-white font-bold text-sm shadow-lg hover:opacity-95 active:scale-[0.98] transition-all flex items-center gap-2">
                            Lanjutkan ke Konfirmasi <span class="material-symbols-outlined text-lg">chevron_right</span>
                        </a>
                    </div>
                </form>
            </div>

            <div class="mt-8 flex items-start gap-4 p-5 rounded-xl bg-blue-50 border border-blue-100">
                <span class="material-symbols-outlined text-blue-700">info</span>
                <div class="text-xs text-slate-600 leading-relaxed">
                    <strong>Informasi Penting:</strong> Pengajuan ini akan langsung diteruskan ke Admin Akademik untuk ditinjau. Pastikan deskripsi kegiatan dan berkas surat permohonan yang dilampirkan sudah benar untuk mempercepat proses verifikasi persetujuan.
                </div>
            </div>

        </div>
    </main>

</body>

</html>