<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'SIMPRU') - SiPinjam Ruang</title>

    @vite(['resources/css/app.css', 'resources/css/user.css', 'resources/js/app.js'])
</head>

<body class="user-body antialiased">

    {{-- SIDEBAR --}}
    <aside class="fixed left-0 top-0 h-full z-40 flex flex-col w-64 bg-white border-r border-slate-200 shadow-sm">
        <div class="px-6 py-8 flex flex-col h-full">

            {{-- Logo --}}
            <div class="mb-10 flex items-center gap-3">
                <div class="h-10 w-10 bg-primary-gradient rounded-lg flex items-center justify-center text-white shadow-md">
                    <span class="material-symbols-outlined">school</span>
                </div>
                <div>
                    <h1 class="text-xl font-black text-[#002045] font-headline leading-tight">SIMPRU</h1>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mt-0.5">Portal Mahasiswa</p>
                </div>
            </div>

            {{-- Navigasi --}}
            <nav class="flex-1 space-y-1">
                <a href="/user/dashboard"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                          {{ request()->is('user/dashboard')
                              ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                              : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="font-headline text-sm font-medium">Dashboard</span>
                </a>

                <a href="/user/ajukan"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                          {{ request()->is('user/ajukan') || request()->is('user/ajukan-detail') || request()->is('user/ajukan-konfirmasi')
                              ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                              : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span class="font-headline text-sm font-medium">Ajukan Peminjaman</span>
                </a>

                <a href="/user/riwayat"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                          {{ request()->is('user/riwayat') || request()->is('user/riwayat-detail')
                              ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                              : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">history</span>
                    <span class="font-headline text-sm font-medium">Riwayat Peminjaman</span>
                </a>

                <a href="/user/notifikasi"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                          {{ request()->is('user/notifikasi')
                              ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                              : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="font-headline text-sm font-medium">Notifikasi</span>
                </a>
            </nav>

            {{-- Profil User --}}
            <div class="p-6 mt-auto border-t border-slate-100">
                <a href="/login"
                   class="flex items-center gap-3 text-slate-500 hover:text-red-600 transition-colors duration-200 font-medium text-sm px-2">
                    <span class="material-symbols-outlined">logout</span>
                    Logout
                </a>
            </div>

        </div>
    </aside>

    {{-- KONTEN UTAMA --}}
    <main class="ml-64 min-h-screen bg-[#f7fafc]">

        {{-- HEADER / TOPBAR --}}
        <header class="flex justify-between items-center w-full px-8 py-4 sticky top-0 z-30 bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200">
            <div class="flex items-center gap-4 flex-1">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                    <input class="w-full pl-10 pr-4 py-2.5 bg-slate-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 focus:bg-white outline-none transition-all"
                           placeholder="Cari ruangan atau jadwal..." type="text" />
                </div>
            </div>
            <div class="flex items-center gap-4">
                <a href="/user/notifikasi"
                   class="relative p-2 text-slate-600 hover:text-[#002045] hover:bg-slate-100 rounded-full transition-all">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </a>
                <div class="h-8 w-px bg-slate-200 mx-1"></div>
                <a href="/user/profil">
                    <div class="flex items-center gap-3">
                        <p class="text-sm font-semibold text-[#002045] font-headline hidden sm:block">Ahmad Fauzi</p>
                        <img alt="User Avatar"
                             class="w-8 h-8 rounded-full border border-slate-200 shadow-sm"
                             src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff" />
                    </div>
                </a>
            </div>
        </header>

        {{-- ISI HALAMAN --}}
        <div class="@yield('container_class', 'p-8 max-w-[1600px] mx-auto')">
            @yield('content')
        </div>

    </main>

    {{-- Script tambahan per halaman --}}
    @stack('scripts')

</body>

</html>
