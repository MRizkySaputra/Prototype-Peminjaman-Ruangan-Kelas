<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Riwayat Peminjaman - SiPinjam Ruang</title>

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
            <a class="flex items-center gap-3 px-4 py-3 text-[#002045] font-bold border-r-4 border-[#002045] bg-blue-50/50 rounded-lg transition-all duration-200" href="#">
                <span class="material-symbols-outlined">history</span>
                <span class="font-headline text-sm font-medium">Riwayat Peminjaman</span>
            </a>
            <!-- <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-50 rounded-lg transition-colors duration-200" href="/user/notifikasi">
                <span class="material-symbols-outlined">notifications</span>
                <span class="font-headline text-sm font-medium">Notifikasi</span>
            </a> -->

        </nav>

        <div class="p-4 mt-auto border-t border-slate-100">
            <div class="p-6 mt-auto border-t border-slate-100">
                <a href="/login" class="flex items-center gap-3 text-slate-500 hover:text-red-600 transition-colors duration-200 font-medium text-sm px-2">
                    <span class="material-symbols-outlined">logout</span>
                    Logout
                </a>
            </div>
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

    <main class="ml-64 p-8 min-h-[calc(100vh-80px)]">
        <div class="max-w-6xl mx-auto">

            <div class="mb-10">
                <h2 class="text-3xl font-headline font-extrabold text-[#002045] mb-2">Riwayat Peminjaman</h2>
                <p class="text-slate-500 text-sm tracking-wide">Pantau status pengajuan peminjaman ruangan Anda secara real-time.</p>
            </div>

            <div class="flex items-center gap-2 mb-8 p-1 bg-slate-200/50 rounded-lg w-fit">
                <button class="px-6 py-2 rounded-md text-sm font-bold bg-white text-[#002045] shadow-sm">Semua</button>
                <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Menunggu</button>
                <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Disetujui</button>
                <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Ditolak</button>
            </div>

            <div class="grid grid-cols-1 gap-6">

                <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center transition-all hover:shadow-md border border-slate-200 group">
                    <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100">
                        <img alt="Lab Komputer" class="w-full h-full object-cover transition-transform group-hover:scale-105 duration-500" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80">
                    </div>
                    <div class="flex-1 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 bg-slate-100 px-2 py-1 rounded">REQ-882910</span>
                        </div>
                        <h3 class="text-xl font-headline font-bold text-[#002045]">Lab Komputer Dasar - Gedung B</h3>
                        <div class="flex flex-wrap gap-5 text-sm text-slate-500 pt-1">
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">calendar_today</span>
                                <span>24 Okt 2026</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">schedule</span>
                                <span>08:00 - 11:00</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-3 w-full md:w-auto md:border-l md:border-slate-100 md:pl-6">
                        <div class="my-auto">
                            <span class="text-xs font-bold px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">Disetujui</span>
                        </div>
                        <a href="/user/riwayat-detail" class="bg-white border-2 border-[#002045] text-[#002045] text-center px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors w-full">Lihat Detail</a>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center transition-all hover:shadow-md border border-slate-200 group">
                    <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100">
                        <img alt="Ruang Teater" class="w-full h-full object-cover transition-transform group-hover:scale-105 duration-500" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80">
                    </div>
                    <div class="flex-1 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 bg-slate-100 px-2 py-1 rounded">REQ-882755</span>
                        </div>
                        <h3 class="text-xl font-headline font-bold text-[#002045]">Ruang Teater - Fakultas Seni</h3>
                        <div class="flex flex-wrap gap-5 text-sm text-slate-500 pt-1">
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">calendar_today</span>
                                <span>25 Okt 2026</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">schedule</span>
                                <span>13:00 - 15:30</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-3 w-full md:w-auto md:border-l md:border-slate-100 md:pl-6">
                        <div class="my-auto">
                            <span class="text-xs font-bold px-3 py-1 rounded-full bg-amber-100 text-amber-800 border border-amber-200">Diproses</span>
                        </div>
                        <a class="bg-white border-2 border-[#002045] text-[#002045] text-center px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors w-full">Lihat Detail</a>
                    </div>
                </div>

                <!-- <div class="bg-white rounded-xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center transition-all hover:shadow-md border border-slate-200 group">
                    <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-100 grayscale group-hover:grayscale-0 transition-all duration-500">
                        <img alt="Ruang Diskusi" class="w-full h-full object-cover transition-transform group-hover:scale-105 duration-500" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=400&q=80">
                    </div> -->
                <!-- <div class="flex-1 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 bg-slate-100 px-2 py-1 rounded">REQ-882601</span>
                            <span class="text-xs font-bold px-3 py-1 rounded-full bg-red-100 text-red-700 border border-red-200">Ditolak</span>
                        </div>
                        <h3 class="text-xl font-headline font-bold text-[#002045]">Ruang Diskusi 04 - Perpustakaan</h3>
                        <p class="text-xs text-red-500 font-medium bg-red-50 p-2 rounded border border-red-100 mt-2">Alasan: Bentrok dengan kegiatan seminar fakultas.</p>
                        <div class="flex flex-wrap gap-5 text-sm text-slate-500 pt-2">
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">calendar_today</span>
                                <span>18 Okt 2026</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base">schedule</span>
                                <span>10:00 - 12:00</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3 w-full md:w-auto md:border-l md:border-slate-100 md:pl-6">
                        <a class="bg-white border-2 border-[#002045] text-[#002045] text-center px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors w-full">Lihat Detail</button>
                    </div>
                </div> -->

            </div>

            <div class="mt-12 flex items-center justify-between border-t border-slate-200 pt-6">
                <p class="text-sm text-slate-500 font-medium">Menampilkan 1-3 dari 12 pengajuan</p>
                <div class="flex items-center gap-2">
                    <button class="p-2 rounded-lg hover:bg-slate-200 text-slate-400 transition-colors disabled:opacity-50" disabled>
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#002045] text-white text-sm font-bold shadow-sm">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-sm font-medium transition-colors">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-sm font-medium transition-colors">3</button>
                    <button class="p-2 rounded-lg hover:bg-slate-200 text-slate-600 transition-colors">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- <div id="bookingModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-[#002045]/40 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-6 pt-6 pb-4 sm:p-8">
                    <div class="flex justify-between items-start mb-6 border-b border-slate-100 pb-4">
                        <h3 class="text-xl font-headline font-extrabold text-[#002045]" id="modal-title">Detail Peminjaman</h3>
                        <button onclick="closeModal('bookingModal')" class="text-slate-400 hover:text-red-500 bg-slate-50 hover:bg-red-50 rounded-full p-1.5 transition-colors">
                            <span class="material-symbols-outlined text-sm">close</span>
                        </button>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex justify-between items-center bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Status Pengajuan</span>
                            <span class="text-xs font-bold px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">Disetujui</span>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1.5">Ruangan</p>
                                <p class="text-sm font-bold text-[#002045]">Ruang Teater - Fakultas Seni</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1.5">Kode Booking</p>
                                <p class="text-sm font-bold text-[#002045] bg-slate-100 px-2 py-0.5 rounded w-max">REQ-882755</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1.5">Tanggal</p>
                                <p class="text-sm font-bold text-[#002045]">25 Okt 2026</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1.5">Waktu</p>
                                <p class="text-sm font-bold text-[#002045]">13:00 - 15:30</p>
                            </div>
                        </div>
                        
                        <div class="pt-4 border-t border-slate-100">
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-2">Kegiatan / Aktivitas</p>
                            <p class="text-sm text-slate-600 bg-slate-50 p-4 rounded-lg border border-slate-100 leading-relaxed">
                                Latihan drama persiapan pementasan tahunan Fakultas Seni Budaya semester ganjil.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-slate-50 px-6 py-5 sm:px-8 flex justify-end border-t border-slate-200">
                    <button onclick="closeModal('bookingModal')" type="button" class="w-full sm:w-auto inline-flex justify-center rounded-lg px-8 py-2.5 bg-[#002045] text-sm font-bold text-white shadow-md hover:opacity-95 transition-all">
                        Tutup Detail
                    </button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                // Mengunci scroll di background saat modal terbuka
                document.body.classList.add('overflow-hidden');
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                // Mengembalikan scroll
                document.body.classList.remove('overflow-hidden');
            }
        }
    </script> -->
</body>

</html>