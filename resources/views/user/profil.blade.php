<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profil Pengguna - SiPinjam Ruang</title>

    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js'])
</head>
<body class="user-body antialiased bg-[#f7fafc]">

    <aside class="fixed left-0 top-0 h-full z-40 flex flex-col w-64 border-r border-slate-200 bg-white shadow-sm hidden md:flex">
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
            <a class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-[#002045] hover:bg-slate-100 rounded-lg transition-colors duration-200" href="/user/ajukan">
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
            <!-- <a class="flex items-center gap-3 px-4 py-3 text-[#002045] font-bold border-r-4 border-[#002045] bg-blue-50/50 rounded-lg transition-all duration-200" href="#">
                <span class="material-symbols-outlined">person</span>
                <span class="font-headline text-sm font-medium">Profil</span>
            </a> -->
        </nav>

        <div class="p-6 mt-auto border-t border-slate-100">
            <a href="/login" class="flex items-center gap-3 text-slate-500 hover:text-red-600 transition-colors duration-200 font-medium text-sm px-2">
                <span class="material-symbols-outlined">logout</span>
                Logout
            </a>
        </div>
    </aside>

    <header class="flex justify-between items-center w-full px-8 py-4 sticky top-0 z-30 md:ml-64 bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200 md:max-w-[calc(100%-16rem)]">
        <div class="flex items-center gap-4 flex-1">
            <button class="md:hidden text-[#002045] p-1">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <h2 class="text-xl font-extrabold text-[#002045] font-headline hidden md:block">Profil Pengguna</h2>
        </div>
        <div class="flex items-center gap-6">
            <a href="/user/notifikasi" class="relative text-slate-600 hover:text-[#002045] transition-colors">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-0 right-0 w-2 h-2 bg-red-600 rounded-full"></span>
            </a>
        </div>
    </header>

    <main class="md:ml-64 min-h-screen pb-24 md:pb-12 bg-[#f7fafc]">
        <div class="p-8 max-w-[1600px] mx-auto space-y-8">
            
            <header class="flex flex-col gap-2 mb-2">
                <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Pengaturan Akun</h2>
                <p class="text-slate-500 text-sm">Kelola informasi pribadi dan pengaturan keamanan akun Anda secara terpusat.</p>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <section class="lg:col-span-8 bg-white rounded-2xl p-8 shadow-sm border border-slate-200">
                    <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">
                        
                        <div class="relative group shrink-0">
                            <div class="h-32 w-32 rounded-2xl overflow-hidden ring-4 ring-slate-50 shadow-inner">
                                <img alt="Profile Large" class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff&size=128"/>
                            </div>
                            <button class="absolute -bottom-3 -right-3 bg-white text-[#002045] p-2.5 rounded-full shadow-lg border border-slate-200 hover:bg-slate-50 hover:scale-105 transition-all">
                                <span class="material-symbols-outlined text-sm">photo_camera</span>
                            </button>
                        </div>
                        
                        <div class="flex-1 text-center md:text-left w-full space-y-6">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                                <div>
                                    <h3 class="text-2xl font-bold text-[#002045] font-headline">Ahmad Fauzi</h3>
                                    <span class="px-3 py-1 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold tracking-widest uppercase inline-block mt-2">Mahasiswa Aktif</span>
                                </div>
                                <button class="flex items-center justify-center gap-2 px-5 py-2 border-2 border-[#002045] text-[#002045] rounded-lg text-sm font-bold hover:bg-[#002045] hover:text-white transition-all">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit Profil
                                </button>
                            </div>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                                <div class="space-y-1.5">
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">NIM / NIP</p>
                                    <p class="text-slate-800 font-semibold bg-slate-50 p-2.5 rounded-lg border border-slate-100">2010411032</p>
                                </div>
                                <div class="space-y-1.5">
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Fakultas / Jurusan</p>
                                    <p class="text-slate-800 font-semibold bg-slate-50 p-2.5 rounded-lg border border-slate-100">Teknik Informatika</p>
                                </div>
                                <div class="space-y-1.5 sm:col-span-2 group">
                                    <div class="flex items-center justify-between">
                                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Alamat Email</p>
                                        <button class="text-blue-600 hover:text-blue-800 hover:underline text-[10px] font-bold">Ubah Email</button>
                                    </div>
                                    <div class="flex items-center gap-3 text-slate-800 font-semibold bg-slate-50 p-2.5 rounded-lg border border-slate-100">
                                        <span class="material-symbols-outlined text-slate-400 text-lg">mail</span>
                                        ahmad.fauzi@masoem.ac.id
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="lg:col-span-4 h-full">
                    <div class="bg-primary-gradient text-white rounded-2xl p-8 shadow-lg relative overflow-hidden h-full flex flex-col">
                        <div class="relative z-10 space-y-4 flex-1">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center backdrop-blur-sm mb-6 border border-white/20">
                                <span class="material-symbols-outlined text-white text-2xl">shield_locked</span>
                            </div>
                            <h4 class="text-xl font-bold font-headline">Keamanan Akun</h4>
                            <p class="text-sm text-blue-100 leading-relaxed font-medium">
                                Pastikan kata sandi Anda terdiri dari minimal 8 karakter dengan kombinasi huruf besar, kecil, dan angka untuk keamanan maksimal portal akademik Anda.
                            </p>
                            
                            <div class="pt-6 mt-auto">
                                <button class="w-full py-3 px-4 bg-white text-[#002045] rounded-xl font-bold text-sm hover:bg-slate-100 transition-colors shadow-sm flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-sm">password</span> Ubah Kata Sandi
                                </button>
                                <button class="w-full mt-3 py-3 px-4 bg-transparent border border-white/30 text-white rounded-xl font-bold text-sm hover:bg-white/10 transition-colors flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-sm">support_agent</span> Hubungi Helpdesk
                                </button>
                            </div>
                        </div>

                        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                        <div class="absolute top-4 right-4 opacity-10">
                            <span class="material-symbols-outlined text-8xl">admin_panel_settings</span>
                        </div>
                    </div>
                </section>

            </div>
            
            <footer class="pt-8 text-center text-[10px] font-bold uppercase tracking-widest text-slate-400">
                © 2026 SiPinjam Ruang • Sistem Manajemen Ruang Akademik
            </footer>

        </div>
    </main>

    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-md shadow-[0_-4px_12px_rgba(0,0,0,0.05)] flex justify-around items-center py-3 z-50 border-t border-slate-200">
        <a class="flex flex-col items-center gap-1 text-slate-400 hover:text-[#002045] transition-colors" href="{{ url('/user/dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-[9px] font-bold">HOME</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-slate-400 hover:text-[#002045] transition-colors" href="{{ url('/user/ajukan') }}">
            <span class="material-symbols-outlined">add_circle</span>
            <span class="text-[9px] font-bold">PINJAM</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-slate-400 hover:text-[#002045] transition-colors" href="{{ url('/user/riwayat') }}">
            <span class="material-symbols-outlined">history</span>
            <span class="text-[9px] font-bold">RIWAYAT</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-[#002045]" href="#">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">person</span>
            <span class="text-[9px] font-bold">PROFIL</span>
        </a>
    </nav>

</body>
</html>