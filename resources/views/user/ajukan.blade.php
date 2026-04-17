<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ajukan Peminjaman - SiPinjam Ruang</title>

    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js'])
    <style>
        /* Menghilangkan scrollbar bawaan agar UI kalender lebih bersih */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="user-body antialiased overflow-hidden h-screen flex">

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
            <a class="flex items-center gap-3 px-4 py-3 text-[#002045] font-bold border-r-4 border-[#002045] bg-blue-50/50 rounded-lg transition-all duration-200" href="#">
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

    <main class="ml-64 flex-1 flex flex-col h-screen relative bg-[#f7fafc]">

        <header class="flex justify-between items-center w-full px-8 py-4 sticky top-0 z-30 bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200">
            <div class="flex items-center flex-1">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                    <input class="w-full pl-10 pr-4 py-2.5 bg-slate-100 border-none rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-[#002045]/20 outline-none transition-all" placeholder="Cari gedung atau ruangan..." type="text" />
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

        <section class="px-8 py-6 bg-white border-b border-slate-200">
            <div class="flex flex-wrap items-end gap-6">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Pilih Gedung</label>
                    <select class="w-full bg-slate-50 border border-slate-200 rounded-lg py-3 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        <option>Gedung A (Rektorat)</option>
                        <option>Gedung B (Fakultas Teknik)</option>
                        <option>Gedung C (Fakultas Ekonomi)</option>
                        <option>Perpustakaan</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Pilih Ruangan</label>
                    <select class="w-full bg-slate-50 border border-slate-200 rounded-lg py-3 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        <option>Ruang Teater - Gedung A</option>
                        <option>Lab Komputer 02 - Gedung B</option>
                        <option>Ruang Seminar 3.1 - Gedung C</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Pilih Tanggal Mulai</label>
                    <input class="w-full bg-slate-50 border border-slate-200 rounded-lg py-3 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none" type="date" value="2026-10-23" />
                </div>
                <div class="w-48">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Min. Kapasitas</label>
                    <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg py-3 px-4">
                        <span class="material-symbols-outlined text-sm text-slate-400 mr-2">group</span>
                        <input class="w-full bg-transparent border-none p-0 focus:ring-0 text-sm font-medium outline-none" placeholder="40" type="number" />
                    </div>
                </div>
                <button class="bg-primary-gradient text-white px-8 py-3 rounded-lg font-bold text-sm shadow-md hover:opacity-95 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">filter_alt</span> Terapkan Filter
                </button>
            </div>
        </section>

        <div class="flex-1 flex overflow-hidden bg-slate-50">

            <div class="flex-1 overflow-auto p-8 hide-scrollbar">
                <div class="min-w-[800px] bg-white rounded-xl shadow-sm border border-slate-200 p-6">

                    <div class="grid grid-cols-8 border-b border-slate-200 mb-4 pb-4">
                        <div class="p-2"></div>
                        <div class="p-2 text-center">
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-tighter mb-1">Sen</span>
                            <span class="text-xl font-headline font-extrabold text-slate-800">23</span>
                        </div>
                        <div class="p-2 text-center bg-blue-50 rounded-xl border border-blue-100">
                            <span class="block text-xs font-bold text-[#002045] uppercase tracking-tighter mb-1">Sel</span>
                            <span class="text-xl font-headline font-extrabold text-[#002045]">24</span>
                        </div>
                        <div class="p-2 text-center">
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-tighter mb-1">Rab</span>
                            <span class="text-xl font-headline font-extrabold text-slate-800">25</span>
                        </div>
                        <div class="p-2 text-center">
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-tighter mb-1">Kam</span>
                            <span class="text-xl font-headline font-extrabold text-slate-800">26</span>
                        </div>
                        <div class="p-2 text-center">
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-tighter mb-1">Jum</span>
                            <span class="text-xl font-headline font-extrabold text-slate-800">27</span>
                        </div>
                        <div class="p-2 text-center">
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-tighter mb-1">Sab</span>
                            <span class="text-xl font-headline font-extrabold text-slate-800">28</span>
                        </div>
                        <div class="p-2 text-center">
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-tighter mb-1">Min</span>
                            <span class="text-xl font-headline font-extrabold text-slate-800">29</span>
                        </div>
                    </div>

                    <div class="relative space-y-1">

                        <div class="grid grid-cols-8 h-14">
                            <div class="text-[10px] font-bold text-slate-400 text-right pr-4 pt-2 border-r border-slate-100">07:00</div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-blue-50/30 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50"></div>
                        </div>

                        <div class="grid grid-cols-8 h-14">
                            <div class="text-[10px] font-bold text-slate-400 text-right pr-4 pt-2 border-r border-slate-100">08:00</div>
                            <div class="bg-red-50 border-r border-slate-100 relative p-1 cursor-not-allowed">
                                <div class="absolute inset-1 bg-red-100 border border-red-200 text-[10px] font-bold text-red-600 rounded flex items-center justify-center">Terisi</div>
                            </div>
                            <div class="bg-blue-50/30 border-r border-slate-100 cursor-pointer hover:bg-blue-100 transition-colors"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50"></div>
                        </div>

                        <div class="grid grid-cols-8 h-14">
                            <div class="text-[10px] font-bold text-slate-400 text-right pr-4 pt-2 border-r border-slate-100">09:00</div>
                            <div class="bg-red-50 border-r border-slate-100 relative p-1 cursor-not-allowed">
                                <div class="absolute inset-1 bg-red-100 border border-red-200 text-[10px] font-bold text-red-600 rounded flex items-center justify-center">Terisi</div>
                            </div>
                            <div class="bg-blue-50/30 border-r border-slate-100 cursor-pointer hover:bg-blue-100 transition-colors"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-red-50 border-r border-slate-100 relative p-1 cursor-not-allowed">
                                <div class="absolute inset-1 bg-red-100 border border-red-200 text-[10px] font-bold text-red-600 rounded flex items-center justify-center">Terisi</div>
                            </div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50"></div>
                        </div>

                        <div class="grid grid-cols-8 h-14">
                            <div class="text-[10px] font-bold text-slate-400 text-right pr-4 pt-2 border-r border-slate-100">10:00</div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-blue-50 border-r border-slate-100 relative p-1 cursor-pointer">
                                <div class="absolute inset-1 bg-[#002045] text-white text-[10px] font-bold rounded flex items-center justify-center shadow-md">
                                    <span class="material-symbols-outlined text-sm mr-1">check_circle</span> Dipilih
                                </div>
                            </div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50"></div>
                        </div>

                        <div class="grid grid-cols-8 h-14">
                            <div class="text-[10px] font-bold text-slate-400 text-right pr-4 pt-2 border-r border-slate-100">11:00</div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-blue-50/30 border-r border-slate-100 cursor-pointer hover:bg-blue-100 transition-colors"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50"></div>
                        </div>

                        <div class="grid grid-cols-8 h-14">
                            <div class="text-[10px] font-bold text-slate-400 text-right pr-4 pt-2 border-r border-slate-100">12:00</div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-blue-50/30 border-r border-slate-100 cursor-pointer hover:bg-blue-100 transition-colors"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50 border-r border-slate-100"></div>
                            <div class="bg-slate-50"></div>
                        </div>

                    </div>

                    <div class="mt-8 pt-6 border-t border-slate-200 flex gap-8 text-[10px] font-bold text-slate-500 uppercase tracking-widest justify-center">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-slate-100 border border-slate-200 rounded"></div>
                            <span>Kosong (Klik untuk Pilih)</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-red-100 border border-red-200 rounded"></div>
                            <span>Terisi / Booked</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-[#002045] rounded shadow-sm"></div>
                            <span>Pilihan Anda</span>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="w-[400px] border-l border-slate-200 bg-white p-8 flex flex-col shadow-[-4px_0_15px_-3px_rgba(0,0,0,0.05)] z-20">
                <div class="flex-1 overflow-y-auto hide-scrollbar">

                    <div class="mb-6">
                        <img class="w-full h-48 object-cover rounded-xl shadow-sm mb-6 border border-slate-100" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=800&q=80" />

                        <div class="flex justify-between items-start mb-2">
                            <h2 class="text-2xl font-extrabold font-headline text-[#002045] leading-tight">Ruang Teater - Gedung A</h2>
                            <span class="bg-blue-50 border border-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">A-102</span>
                        </div>

                        <div class="flex items-center gap-2 text-slate-500 text-sm mb-6">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            <span>Gedung Utama (Rektorat), Lantai 1</span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Informasi Kapasitas</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-slate-50 border border-slate-100 rounded-lg p-4 flex flex-col items-center text-center">
                                    <span class="material-symbols-outlined text-[#002045] mb-1">group</span>
                                    <span class="text-lg font-extrabold text-slate-800">50</span>
                                    <span class="text-[10px] text-slate-500 font-bold uppercase">Kursi</span>
                                </div>
                                <div class="bg-slate-50 border border-slate-100 rounded-lg p-4 flex flex-col items-center text-center">
                                    <span class="material-symbols-outlined text-[#002045] mb-1">square_foot</span>
                                    <span class="text-lg font-extrabold text-slate-800">120</span>
                                    <span class="text-[10px] text-slate-500 font-bold uppercase">Luas (m²)</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100 relative">
                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>

                            <h3 class="text-[10px] font-black text-blue-800 uppercase tracking-widest mb-4">Waktu Terpilih</h3>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-slate-600">Selasa, 24 Okt 2026</span>
                                <span class="text-sm font-bold text-[#002045] bg-white px-2 py-1 rounded border border-blue-100">10:00 - 11:00</span>
                            </div>
                            <p class="text-[10px] text-slate-500 italic mt-3 leading-relaxed">Pastikan jadwal Anda tidak melewati batas waktu peminjaman reguler (07:00 - 17:00 WIB).</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 mt-4">
                    <a class="w-full bg-primary-gradient text-white py-4 rounded-xl font-bold text-sm shadow-lg hover:opacity-95 active:scale-[0.98] transition-all flex items-center justify-center gap-2" href="/user/ajukan-detail">
                        Lanjut Isi Formulir <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </a>
                    <p class="text-center text-[10px] text-slate-400 mt-4 uppercase font-bold tracking-widest">Langkah 1 dari 2</p>
                </div>
            </aside>
        </div>
    </main>

    <div class="fixed bottom-8 left-[calc(16rem+(100vw-16rem-400px)/2)] transform -translate-x-1/2 bg-white/90 backdrop-blur-md px-6 py-3 rounded-full border border-slate-200 shadow-xl flex items-center gap-4 z-50">
        <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse"></span>
            <span class="text-xs font-bold text-[#002045] uppercase tracking-tight">Pilih Jadwal</span>
        </div>
        <div class="h-4 w-px bg-slate-300"></div>
        <span class="text-xs font-medium text-slate-600">Klik slot berwarna abu-abu pada kalender untuk menetapkan jam peminjaman.</span>
    </div>

</body>

</html>