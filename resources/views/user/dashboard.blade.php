<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard - SiPinjam Ruang</title>

    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js'])
</head>

<body class="user-body antialiased">

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
            <a class="flex items-center gap-3 px-4 py-3 text-[#002045] font-bold border-r-4 border-[#002045] bg-blue-50/50 rounded-lg transition-all duration-200" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-headline text-sm font-medium">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-50 rounded-lg transition-colors duration-200" href="/user/ajukan">
                <span class="material-symbols-outlined">add_circle</span>
                <span class="font-headline text-sm font-medium">Ajukan Peminjaman</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-50 rounded-lg transition-colors duration-200" href="/user/riwayat">
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

    <main class="ml-64 min-h-screen flex flex-col">

        <header class="flex justify-between items-center w-full px-8 py-4 sticky top-0 z-30 bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200">
            <div class="flex items-center flex-1">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                    <input class="w-full pl-10 pr-4 py-2.5 bg-slate-100 border-none rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all" placeholder="Cari ruangan atau jadwal peminjaman..." type="text" />
                </div>
            </div>
            <div class="flex items-center gap-4">
                <a href="/user/notifikasi" class="p-2 text-slate-600 hover:text-[#002045] hover:bg-slate-100 rounded-full transition-all relative">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </a>
                <div class="h-8 w-px bg-slate-200 mx-2"></div>
                <a href="/user/profil">
                    <div class="flex items-center gap-3">
                        <p class="text-sm font-semibold text-[#002045] font-headline hidden sm:block">Ahmad Fauzi</p>
                        <img alt="User Avatar" class="w-8 h-8 rounded-full border border-slate-200 shadow-sm" src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff" />
                    </div>
                </a>
            </div>
        </header>

        <div class="p-8 max-w-6xl mx-auto space-y-10 w-full flex-1">

            <section class="flex flex-col md:flex-row justify-between items-end gap-6 bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
                <div class="space-y-2">
                    <h2 class="text-3xl font-extrabold tracking-tight text-[#002045] font-headline">Halo, Ahmad Fauzi 👋</h2>
                    <p class="text-slate-500 font-medium">Selamat datang di portal akademik. Ada kegiatan apa hari ini?</p>
                </div>
                <a href="/user/ajukan" class="bg-primary-gradient text-white px-8 py-3.5 rounded-xl font-bold flex items-center gap-2 shadow-lg shadow-[#002045]/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
                    <span class="material-symbols-outlined">add_circle</span>
                    Ajukan Peminjaman
                </a>
            </section>

            <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl border-l-4 border-blue-500 shadow-sm hover:shadow-md transition-shadow group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-2 bg-blue-50 text-blue-600 rounded-lg group-hover:bg-blue-500 group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined">event_available</span>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Aktif</span>
                    </div>
                    <p class="text-3xl font-black text-[#002045] font-headline">03</p>
                    <p class="text-sm font-medium text-slate-500 mt-1">Peminjaman Disetujui</p>
                </div>

                <div class="bg-white p-6 rounded-xl border-l-4 border-amber-400 shadow-sm hover:shadow-md transition-shadow group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-2 bg-amber-50 text-amber-600 rounded-lg group-hover:bg-amber-400 group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined">pending_actions</span>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Menunggu</span>
                    </div>
                    <p class="text-3xl font-black text-[#002045] font-headline">01</p>
                    <p class="text-sm font-medium text-slate-500 mt-1">Menunggu Konfirmasi</p>
                </div>

                <div class="bg-white p-6 rounded-xl border-l-4 border-red-500 shadow-sm hover:shadow-md transition-shadow group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-2 bg-red-50 text-red-500 rounded-lg group-hover:bg-red-500 group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined">cancel</span>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Riwayat</span>
                    </div>
                    <p class="text-3xl font-black text-[#002045] font-headline">00</p>
                    <p class="text-sm font-medium text-slate-500 mt-1">Permohonan Ditolak</p>
                </div>
            </section>

            <section class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-[#002045] font-headline flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#002045]">history</span> Riwayat Peminjaman
                    </h3>
                    <a class="text-sm font-bold text-[#002045] hover:text-blue-600 transition-colors flex items-center gap-1" href="#">
                        Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-slate-200">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200">
                                    <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Ruangan</th>
                                    <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Tanggal</th>
                                    <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Waktu</th>
                                    <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Keperluan</th>
                                    <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">Status</th>
                                    <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="h-8 w-8 bg-blue-50 border border-blue-100 text-blue-700 rounded-lg flex items-center justify-center">
                                                <span class="material-symbols-outlined text-sm">meeting_room</span>
                                            </div>
                                            <span class="text-sm font-bold text-[#002045]">Lab Komputer 03</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">12 Okt 2026</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">08:00 - 10:00</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 truncate max-w-[150px]">Latihan Pemrograman Web</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-700 border border-green-200 uppercase tracking-wider">
                                            Disetujui
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-2 text-slate-400 hover:text-[#002045] rounded-lg transition-colors"><span class="material-symbols-outlined">more_vert</span></button>
                                    </td>
                                </tr>
                                <tr class="bg-slate-50/30 hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="h-8 w-8 bg-blue-50 border border-blue-100 text-blue-700 rounded-lg flex items-center justify-center">
                                                <span class="material-symbols-outlined text-sm">meeting_room</span>
                                            </div>
                                            <span class="text-sm font-bold text-[#002045]">Ruang Teater A</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">15 Okt 2026</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">13:00 - 15:00</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 truncate max-w-[150px]">Rapat Himpunan Mahasiswa</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-amber-100 text-amber-700 border border-amber-200 uppercase tracking-wider">
                                            Menunggu
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-2 text-slate-400 hover:text-[#002045] rounded-lg transition-colors"><span class="material-symbols-outlined">more_vert</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="h-8 w-8 bg-blue-50 border border-blue-100 text-blue-700 rounded-lg flex items-center justify-center">
                                                <span class="material-symbols-outlined text-sm">meeting_room</span>
                                            </div>
                                            <span class="text-sm font-bold text-[#002045]">Auditorium Utama A.1</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">05 Okt 2026</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">09:00 - 17:00</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 truncate max-w-[150px]">Seminar Nasional AI</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-red-50 text-red-600 border border-red-200 uppercase tracking-wider">
                                            Ditolak
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-2 text-slate-400 hover:text-[#002045] rounded-lg transition-colors"><span class="material-symbols-outlined">more_vert</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="space-y-6 pt-4">
                <h3 class="text-xl font-bold text-[#002045] font-headline flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#002045]">explore</span> Rekomendasi Ruangan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="group relative overflow-hidden rounded-2xl aspect-[16/9] bg-slate-900 shadow-md">
                        <img alt="Conference Room" class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=800&q=80" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#002045] via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 space-y-2 w-full">
                            <span class="bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-widest shadow-sm">Populer</span>
                            <h4 class="text-xl font-bold text-white font-headline">Ruang Multimedia A</h4>
                            <p class="text-slate-200 text-sm">Dilengkapi dengan proyektor 4K dan sound system premium.</p>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-2xl aspect-[16/9] bg-slate-900 shadow-md">
                        <img alt="Study Lounge" class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=800&q=80" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#002045] via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 space-y-2 w-full">
                            <span class="bg-emerald-500 text-white text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-widest shadow-sm">Baru</span>
                            <h4 class="text-xl font-bold text-white font-headline">Co-Working Space Lt. 2</h4>
                            <p class="text-slate-200 text-sm">Area terbuka yang nyaman untuk kolaborasi tim dan diskusi santai.</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

</body>

</html>