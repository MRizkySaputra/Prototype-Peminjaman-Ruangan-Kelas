<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Peminjaman - SiPinjam Ruang</title>

    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js'])
</head>

<body class="user-body antialiased bg-[#f7fafc]">

    <aside class="fixed left-0 top-0 h-full z-40 flex flex-col w-64 border-r border-slate-200 bg-white shadow-sm">
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
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-50 rounded-lg transition-colors duration-200" href="/user/dashboard">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-headline text-sm font-medium">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-50 rounded-lg transition-colors duration-200" href="/user/ajukan">
                <span class="material-symbols-outlined">add_circle</span>
                <span class="font-headline text-sm font-medium">Ajukan Peminjaman</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-[#002045] font-bold border-r-4 border-[#002045] bg-blue-50/50 rounded-lg transition-all duration-200" href="/user/riwayat">
                <span class="material-symbols-outlined">history</span>
                <span class="font-headline text-sm font-medium">Riwayat Peminjaman</span>
            </a>
            <!-- <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-50 rounded-lg transition-colors duration-200" href="/user/notifikasi">
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

    <header class="flex justify-between items-center w-full px-8 py-4 sticky top-0 z-30 ml-64 bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200 max-w-[calc(100%-16rem)]">
        <div class="flex items-center flex-1">
            <div class="relative w-full max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                <input class="w-full pl-10 pr-4 py-2.5 bg-slate-100 border-none rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all" placeholder="Cari kode booking atau ruangan..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-4">
            <a href="/user/notifikasi" class="p-2 text-slate-600 hover:text-[#002045] hover:bg-slate-100 rounded-full transition-all relative">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
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

    <main class="ml-64 p-8 min-h-[calc(100vh-80px)] bg-[#f7fafc]">

        <div class="max-w-5xl mx-auto mb-10">
            <nav class="flex items-center gap-2 text-sm font-medium text-slate-500 mb-6">
                <a href="{{ url('/user/riwayat') }}" class="hover:text-[#002045] transition-colors">Riwayat Peminjaman</a>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
                <span class="text-[#002045] font-bold">Detail Peminjaman</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-headline font-extrabold text-[#002045] mb-2">Detail Peminjaman: Lab Komputer</h2>
                    <p class="text-slate-500 text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">event_note</span>
                        Dibuat pada 20 Okt 2026 • ID Permohonan #REQ-882755
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ url('/user/riwayat') }}" class="px-6 py-2.5 text-sm font-bold border border-slate-300 text-slate-600 bg-white rounded-lg hover:bg-slate-50 transition-colors">Kembali</a>
                    <button class="px-6 py-2.5 text-sm font-bold bg-primary-gradient text-white rounded-lg shadow-md hover:opacity-90 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">print</span> Cetak Bukti
                    </button>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto space-y-6">

            <section class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm">

                <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-100">
                    <h3 class="text-lg font-bold text-[#002045] flex items-center gap-2 font-headline">
                        <span class="material-symbols-outlined text-[#002045]">info</span>
                        Informasi Utama
                    </h3>
                    <span class="px-4 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider border border-emerald-200 flex items-center gap-1.5 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">check_circle</span>
                        Disetujui
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Ruangan</p>
                        <p class="text-base font-bold text-[#002045]">Lab Komputer Dasar - Gedung B</p>
                        <p class="text-xs text-slate-500 mt-1 font-medium">Lantai 3, Ruang 304</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Tanggal & Waktu</p>
                        <p class="text-base font-bold text-[#002045]">Selasa, 24 Okt 2026</p>
                        <p class="text-xs text-slate-500 mt-1 font-medium">08:00 - 11:00 WIB (3 Jam)</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Nama Kegiatan</p>
                        <p class="text-base font-bold text-[#002045]">Praktikum Pemrograman Web</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Keperluan & Deskripsi</p>
                        <p class="text-sm leading-relaxed text-slate-600 bg-slate-50 border border-slate-100 p-4 rounded-xl">
                            Sesi praktikum mandiri untuk mahasiswa tingkat akhir yang sedang mengerjakan tugas besar arsitektur perangkat lunak.
                        </p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Estimasi Jumlah Peserta</p>
                        <div class="flex items-center gap-2 mt-1 text-[#002045]">
                            <span class="material-symbols-outlined text-slate-400">groups</span>
                            <p class="text-base font-bold">25 Orang</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm">
                <h3 class="text-lg font-bold text-[#002045] flex items-center gap-2 mb-6 font-headline">
                    <span class="material-symbols-outlined text-[#002045]">description</span>
                    Dokumen Pendukung Lampiran
                </h3>

                <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-xl group hover:bg-blue-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-lg bg-red-50 border border-red-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-red-600 text-xl">picture_as_pdf</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-[#002045]">Surat Permohonan Lab.pdf</p>
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest mt-0.5 font-bold">PDF Document • 345 KB</p>
                        </div>
                    </div>
                    <button class="flex items-center gap-2 px-5 py-2.5 text-xs font-bold text-[#002045] bg-white border border-slate-300 rounded-lg hover:shadow-sm hover:border-[#002045]/30 transition-all">
                        <span class="material-symbols-outlined text-sm">download</span> Unduh
                    </button>
                </div>
            </section>

            <div class="p-6 bg-blue-50 rounded-2xl border border-blue-100 shadow-sm">
                <div class="flex gap-4">
                    <span class="material-symbols-outlined text-blue-700 mt-0.5">lightbulb</span>
                    <div>
                        <p class="text-sm font-bold text-blue-900 mb-1.5">Informasi Penting</p>
                        <p class="text-xs leading-relaxed text-blue-800/80">
                            Harap tunjukkan bukti persetujuan (digital atau cetak) ini kepada petugas keamanan atau teknisi gedung fakultas saat tiba di lokasi untuk mendapatkan akses masuk ruangan.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

</html>