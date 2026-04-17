<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Notifikasi - SiPinjam Ruang</title>

    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js'])
</head>
<body class="user-body antialiased bg-[#f7fafc]">

    <aside class="fixed left-0 top-0 h-full z-40 flex flex-col w-64 border-r border-slate-200 bg-slate-50 shadow-sm hidden md:flex">
        <div class="px-6 py-8">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-primary-gradient rounded-lg flex items-center justify-center text-white shadow-md">
                    <span class="material-symbols-outlined">school</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-[#002045] font-headline leading-tight">SIMPRU</h1>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mt-0.5">Portal Mahasiswa</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-1 overflow-y-auto mt-2">
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-100 rounded-lg transition-colors duration-200" href="/user/dashboard">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-headline text-sm font-medium">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-100 rounded-lg transition-colors duration-200" href="/user/ajukan">
                <span class="material-symbols-outlined">add_circle</span>
                <span class="font-headline text-sm font-medium">Ajukan Peminjaman</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-100 rounded-lg transition-colors duration-200" href="/user/riwayat">
                <span class="material-symbols-outlined">history</span>
                <span class="font-headline text-sm font-medium">Riwayat Peminjaman</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-[#002045] font-bold border-r-4 border-[#002045] bg-blue-50/50 rounded-lg transition-all duration-200" href="#">
                <span class="material-symbols-outlined">notifications</span>
                <span class="font-headline text-sm font-medium">Notifikasi</span>
            </a>
        </nav>

        <!-- <div class="p-4 mt-auto border-t border-slate-200/50">
            <a href="/user/profil">
                <div class="bg-slate-50 rounded-xl p-4 flex items-center gap-3 border border-slate-100 hover:border-slate-200 transition-colors cursor-pointer">
                    <img alt="User Profile" class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff"/>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-[#002045] truncate">Ahmad Fauzi</p>
                        <p class="text-[10px] font-semibold text-slate-500 truncate">NIM: 2010411032</p>
                    </div>
                </div>
            </a>
        </div> -->
        <div class="p-6 mt-auto border-t border-slate-100">
            <a href="/login" class="flex items-center gap-3 text-slate-500 hover:text-red-600 transition-colors duration-200 font-medium text-sm px-2">
                <span class="material-symbols-outlined">logout</span>
                Logout
            </a>
        </div>
    </aside>

    <header class="flex justify-between items-center w-full px-6 py-4 sticky top-0 z-30 md:ml-64 bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200/50 md:max-w-[calc(100%-16rem)]">
        <div class="flex items-center gap-4">
            <button class="md:hidden text-[#002045] p-1">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <h2 class="text-xl font-extrabold text-[#002045] font-headline">Pusat Notifikasi</h2>
        </div>
        <div class="flex items-center gap-4">
            <button class="p-2 text-slate-600 hover:text-[#002045] hover:bg-slate-100 rounded-full transition-all">
                <span class="material-symbols-outlined">search</span>
            </button>
            <div class="h-8 w-px bg-slate-200 mx-1"></div>
            <img alt="User Avatar" class="w-8 h-8 rounded-full border border-slate-200 shadow-sm" src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff"/>
        </div>
    </header>

    <main class="md:ml-64 min-h-screen pb-24 md:pb-12 bg-[#f7fafc]">
        <div class="max-w-4xl mx-auto px-4 md:px-8 py-8">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-[#002045] tracking-tight font-headline">Informasi & Update</h3>
                    <p class="text-slate-500 text-sm mt-1">Pantau status persetujuan peminjaman ruangan Anda di sini.</p>
                </div>
                <button class="flex items-center justify-center gap-2 px-6 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-full text-sm font-bold hover:bg-slate-50 transition-colors shadow-sm self-start sm:self-auto active:scale-95">
                    <span class="material-symbols-outlined text-sm">done_all</span>
                    Tandai Semua Dibaca
                </button>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-blue-600 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Total Notifikasi</p>
                    <p class="text-2xl font-black text-[#002045] mt-1 font-headline">24</p>
                </div>
                <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-blue-400 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Belum Dibaca</p>
                    <p class="text-2xl font-black text-blue-600 mt-1 font-headline">3</p>
                </div>
                <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-emerald-500 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Disetujui</p>
                    <p class="text-2xl font-black text-emerald-600 mt-1 font-headline">12</p>
                </div>
                <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-red-500 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Ditolak</p>
                    <p class="text-2xl font-black text-red-600 mt-1 font-headline">2</p>
                </div>
            </div>

            <div class="space-y-4">
                
                <div class="bg-white border border-slate-200 border-l-4 border-l-blue-600 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-blue-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                    
                    <div class="flex gap-4 relative z-10">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600">
                            <span class="material-symbols-outlined">check_circle</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-1.5">
                                <h4 class="font-bold text-[#002045] text-base">Permohonan Disetujui</h4>
                                <span class="text-[10px] font-bold text-blue-700 bg-blue-100 border border-blue-200 px-2.5 py-0.5 rounded-full uppercase tracking-widest">Baru</span>
                            </div>
                            <p class="text-sm text-slate-600 mb-3">Selamat! Peminjaman <span class="font-bold text-[#002045]">Lab Multimedia 02</span> telah disetujui oleh Admin Akademik.</p>
                            <div class="flex flex-wrap items-center gap-y-2 gap-x-5 text-xs text-slate-500 font-medium">
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">calendar_today</span> 24 Okt 2026</span>
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">schedule</span> 08:30 WIB</span>
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">meeting_room</span> Lt. 3, Gedung A</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 border-l-4 border-l-blue-600 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-blue-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                    
                    <div class="flex gap-4 relative z-10">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600">
                            <span class="material-symbols-outlined">schedule</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-1.5">
                                <h4 class="font-bold text-[#002045] text-base">Menunggu Konfirmasi</h4>
                                <span class="text-[10px] font-bold text-blue-700 bg-blue-100 border border-blue-200 px-2.5 py-0.5 rounded-full uppercase tracking-widest">Baru</span>
                            </div>
                            <p class="text-sm text-slate-600 mb-3">Pengajuan Anda untuk <span class="font-bold text-[#002045]">Ruang Seminar 01</span> sedang dalam tahap verifikasi dokumen oleh petugas.</p>
                            <div class="flex flex-wrap items-center gap-y-2 gap-x-5 text-xs text-slate-500 font-medium">
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">calendar_today</span> 25 Okt 2026</span>
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">schedule</span> 14:00 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 border border-slate-200 border-l-4 border-l-transparent rounded-xl p-6 hover:bg-slate-100 transition-colors cursor-pointer">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-50 border border-red-100 flex items-center justify-center text-red-500">
                            <span class="material-symbols-outlined">cancel</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-1.5">
                                <h4 class="font-bold text-slate-700 text-base">Permohonan Ditolak</h4>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">2 Hari Lalu</span>
                            </div>
                            <p class="text-sm text-slate-600 mb-3">Maaf, pengajuan <span class="font-bold text-slate-700">Aula Utama</span> tidak dapat diproses saat ini.</p>
                            
                            <div class="bg-white p-3.5 rounded-lg border border-red-100 border-l-2 border-l-red-500 mb-4 shadow-sm">
                                <p class="text-xs text-red-600 font-medium leading-relaxed">"Ruangan sedang digunakan untuk acara Dies Natalis Fakultas pada tanggal tersebut. Silakan cari jadwal alternatif."</p>
                            </div>
                            
                            <div class="flex flex-wrap items-center gap-y-2 gap-x-5 text-xs text-slate-400 font-medium">
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">calendar_today</span> 22 Okt 2026</span>
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">schedule</span> 10:00 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 border border-slate-200 border-l-4 border-l-transparent rounded-xl p-6 hover:bg-slate-100 transition-colors cursor-pointer">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400">
                            <span class="material-symbols-outlined">history</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-1.5">
                                <h4 class="font-bold text-slate-700 text-base">Peminjaman Selesai</h4>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">1 Minggu Lalu</span>
                            </div>
                            <p class="text-sm text-slate-600 mb-3">Masa pinjam <span class="font-bold text-slate-700">Ruang Diskusi B</span> telah berakhir. Terima kasih telah menjaga fasilitas kampus.</p>
                            <div class="flex flex-wrap items-center gap-y-2 gap-x-5 text-xs text-slate-400 font-medium">
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">calendar_today</span> 18 Okt 2026</span>
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-sm">schedule</span> 09:00 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-10 flex justify-center">
                <button class="text-[#002045] bg-blue-50 px-6 py-2.5 rounded-full text-sm font-bold border border-blue-100 flex items-center gap-2 hover:bg-[#002045] hover:text-white transition-all">
                    Tampilkan Lebih Banyak
                    <span class="material-symbols-outlined text-lg">expand_more</span>
                </button>
            </div>
            
        </div>
    </main>

    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md flex justify-around items-center h-16 px-2 shadow-[0_-2px_10px_rgba(0,0,0,0.05)] border-t border-slate-200">
        <a class="flex flex-col items-center justify-center w-full h-full text-slate-500 hover:text-[#002045] transition-colors" href="{{ url('/user/dashboard') }}">
            <span class="material-symbols-outlined text-xl">dashboard</span>
            <span class="text-[10px] mt-1 font-medium">Beranda</span>
        </a>
        <a class="flex flex-col items-center justify-center w-full h-full text-slate-500 hover:text-[#002045] transition-colors" href="{{ url('/user/ajukan') }}">
            <span class="material-symbols-outlined text-xl">add_circle</span>
            <span class="text-[10px] mt-1 font-medium">Pinjam</span>
        </a>
        <a class="flex flex-col items-center justify-center w-full h-full text-[#002045]" href="#">
            <div class="relative">
                <span class="material-symbols-outlined text-xl">notifications</span>
                <span class="absolute -top-0.5 -right-0.5 w-2 h-2 bg-red-500 rounded-full"></span>
            </div>
            <span class="text-[10px] mt-1 font-bold">Notif</span>
        </a>
        <a class="flex flex-col items-center justify-center w-full h-full text-slate-500 hover:text-[#002045] transition-colors" href="{{ url('/user/riwayat') }}">
            <span class="material-symbols-outlined text-xl">history</span>
            <span class="text-[10px] mt-1 font-medium">Riwayat</span>
        </a>
        <a class="flex flex-col items-center justify-center w-full h-full text-slate-500 hover:text-[#002045] transition-colors" href="#">
            <span class="material-symbols-outlined text-xl">person</span>
            <span class="text-[10px] mt-1 font-medium">Profil</span>
        </a>
    </nav>

</body>
</html>