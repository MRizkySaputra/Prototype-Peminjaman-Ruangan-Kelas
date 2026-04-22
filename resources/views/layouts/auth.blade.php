<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'SIMPRU') - SiPinjam Ruang</title>

    @vite(['resources/css/app.css', 'resources/css/auth.css', 'resources/js/app.js'])
</head>

<body class="login-body min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden">

    {{-- Background dekoratif --}}
    <div class="absolute top-[-10%] left-[-5%] w-[60vw] h-[60vw] sm:w-[40vw] sm:h-[40vw] bg-[#002045]/5 rounded-full blur-[100px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[50vw] h-[50vw] sm:w-[30vw] sm:h-[30vw] bg-[#1a365d]/10 rounded-full blur-[100px] pointer-events-none -z-10"></div>

    <main class="w-full max-w-lg z-10">

        {{-- Kartu --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            {{-- Header Kartu --}}
            <div class="pt-8 sm:pt-10 pb-6 px-6 sm:px-10 flex flex-col items-center text-center">
                <div class="mb-6 w-14 h-14 sm:w-16 sm:h-16 bg-[#e5e9eb] rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-[#002045] text-3xl sm:text-4xl scale-125">
                        @yield('icon', 'account_balance')
                    </span>
                </div>
                <h1 class="font-headline text-xl sm:text-2xl font-extrabold text-[#002045] tracking-tight">
                    @yield('card_title', 'SIMPRU')
                </h1>
                <p class="text-variant text-xs sm:text-sm mt-2">
                    @yield('card_subtitle', 'Sistem Informasi Manajemen Peminjaman Ruangan')
                </p>
            </div>

            {{-- Konten Form --}}
            <div class="px-6 sm:px-10 pb-8 sm:pb-10">
                @yield('content')
            </div>

        </div>

        {{-- Footer --}}
        <footer class="mt-6 sm:mt-8 text-center text-[#43474e]/60 text-[10px] sm:text-[11px] uppercase tracking-widest">
            © 2026 Ma'soem University • All Rights Reserved
        </footer>

    </main>

    @stack('scripts')

</body>

</html>
