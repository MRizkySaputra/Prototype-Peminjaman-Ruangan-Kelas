<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'SIMPRU') - SIMPRU</title>

    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
</head>

<body class="admin-body antialiased">

    {{-- SIDEBAR --}}
    <aside class="fixed left-0 top-0 h-full z-40 flex flex-col w-64 bg-white border-r border-slate-200 shadow-sm">
        <div class="px-6 py-8 flex flex-col h-full">

            {{-- Logo --}}
            <div class="mb-10 flex items-center gap-3">
                <div class="w-10 h-10 bg-primary-gradient rounded-lg flex items-center justify-center text-white shadow-md">
                    <span class="material-symbols-outlined">account_balance</span>
                </div>
                <div>
                    <h1 class="text-xl font-black text-[#002045] font-headline leading-tight">SIMPRU</h1>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mt-0.5">Portal Admin</p>
                </div>
            </div>

            {{-- Navigasi --}}
            <nav class="flex-1 space-y-1">
                <a href="/admin/dashboard"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                            {{ request()->is('admin/dashboard')
                                ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                                : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">analytics</span>
                    <span class="font-headline text-sm font-medium">Dashboard</span>
                </a>

                <a href="/admin/jadwal"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                            {{ request()->is('admin/jadwal')
                                ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                                : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <span class="font-headline text-sm font-medium">Jadwal Ruangan</span>
                </a>

                <a href="/admin/permohonan"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                            {{ request()->is('admin/permohonan') || request()->is('admin/detail-permohonan')
                                ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                                : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">inbox</span>
                    <span class="font-headline text-sm font-medium">Permohonan Masuk</span>
                </a>

                <a href="/admin/ruangan"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                            {{ request()->is('admin/ruangan')
                                ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                                : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">meeting_room</span>
                    <span class="font-headline text-sm font-medium">Manajemen Ruangan</span>
                </a>

                <a href="/admin/users"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                            {{ request()->is('admin/users') || request()->is('admin/roles')
                                ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                                : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <span class="font-headline text-sm font-medium">Manajemen pengguna</span>
                </a>

                <a href="/admin/laporan"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
                            {{ request()->is('admin/laporan')
                                ? 'text-[#002045] font-bold border-l-4 border-[#002045] bg-blue-50/50 pl-3'
                                : 'text-slate-500 hover:text-[#002045] hover:bg-slate-50' }}">
                    <span class="material-symbols-outlined">assessment</span>
                    <span class="font-headline text-sm font-medium">Laporan</span>
                </a>
            </nav>

            {{-- Logout --}}
            <div class="p-6 mt-auto border-t border-slate-100">
                <a href="/"
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
            </div>
            <div class="flex items-center gap-4">
                <a href="/admin/notifikasi" class="relative text-slate-600 hover:text-[#002045] transition-colors p-2 hover:bg-slate-100 rounded-full">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-600 rounded-full border-2 border-white"></span>
                </a>
                <div class="h-8 w-px bg-slate-200 mx-1"></div>
                <div class="flex items-center gap-3">
                    <p class="text-sm font-semibold text-[#002045] font-headline hidden sm:block">Administrator</p>
                    <img alt="User Avatar"
                         class="w-8 h-8 rounded-full border border-slate-200 shadow-sm"
                         src="https://ui-avatars.com/api/?name=Administrator&background=002045&color=fff" />
                </div>
            </div>
        </header>

        {{-- ISI HALAMAN --}}
        <div class="p-8 max-w-[1600px] mx-auto">
            @yield('content')
        </div>

    </main>

    {{-- Script tambahan per halaman --}}
    @stack('scripts')

</body>

</html>
