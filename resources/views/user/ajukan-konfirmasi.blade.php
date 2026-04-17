<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Konfirmasi Peminjaman - SiPinjam Ruang</title>

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
            <a class="flex items-center gap-3 px-4 py-3 text-[#002045] font-bold border-r-4 border-[#002045] bg-blue-50/50 rounded-lg transition-all duration-200" href="/user/ajukan">
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
                <a class="hover:text-[#002045] font-medium transition-colors" href="{{ url('/user/ajukan/detail') }}">Kembali ke Pengisian Detail</a>
            </nav>

            <div class="mb-12 max-w-3xl mx-auto">
                <div class="flex items-center justify-between relative">
                    <div class="absolute top-1/2 left-0 w-full h-1 bg-slate-200 -translate-y-1/2 z-0"></div>
                    <div class="absolute top-1/2 left-0 w-full h-1 bg-[#002045] -translate-y-1/2 z-0 transition-all duration-500"></div>

                    <div class="relative z-10 flex flex-col items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-md">
                            <span class="material-symbols-outlined text-[20px]">check</span>
                        </div>
                        <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Pilih Ruangan</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-md">
                            <span class="material-symbols-outlined text-[20px]">check</span>
                        </div>
                        <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Isi Detail</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-[#002045] text-white flex items-center justify-center font-bold shadow-lg shadow-[#002045]/20 ring-4 ring-white">
                            3
                        </div>
                        <span class="text-xs font-bold text-[#002045] uppercase tracking-wider">Konfirmasi</span>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h2 class="font-headline text-3xl font-extrabold text-[#002045] mb-2">Konfirmasi Peminjaman</h2>
                <p class="text-slate-500 max-w-lg leading-relaxed text-sm">
                    Tinjau kembali detail pemohonan Anda sebelum mengirimkannya ke pihak administrasi. Pastikan seluruh informasi sudah benar.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <div class="lg:col-span-8 space-y-6">

                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
                        <div class="flex justify-between items-start mb-8">
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-blue-700 bg-blue-50 px-2.5 py-1 rounded border border-blue-100">Summary Detail</span>
                                <h3 class="font-headline text-2xl font-bold mt-4 text-[#002045]">Ruang Teater</h3>
                                <p class="text-sm text-slate-500 mt-1">Gedung Utama (Rektorat) Lt. 1</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Booking ID</p>
                                <p class="font-mono text-sm text-[#002045] font-bold">#REQ-DRAFT</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 py-6 border-t border-b border-slate-100">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Tanggal Pelaksanaan</p>
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-slate-400 text-lg">calendar_today</span>
                                    <p class="text-sm font-semibold text-slate-800">Selasa, 24 Oktober 2026</p>
                                </div>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Waktu Sesi</p>
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-slate-400 text-lg">schedule</span>
                                    <p class="text-sm font-semibold text-slate-800">10:00 - 11:00 WIB</p>
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Keperluan Acara</p>
                                <div class="flex items-start gap-2">
                                    <span class="material-symbols-outlined text-slate-400 text-lg mt-0.5">info</span>
                                    <p class="text-sm leading-relaxed text-slate-700">Praktikum Algoritma Lanjut. Kegiatan praktikum mata kuliah rutin untuk program studi Informatika semester 3 dan 5. Estimasi peserta 40 orang.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-slate-600">person</span>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Penanggung Jawab</p>
                                <p class="text-sm font-bold text-[#002045]">Ahmad Fauzi (2010411032)</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-50 p-6 rounded-xl flex gap-4 items-start border border-blue-100">
                        <span class="material-symbols-outlined text-blue-700 mt-0.5">verified_user</span>
                        <div>
                            <p class="text-sm font-bold text-blue-900 mb-1">Catatan Penting</p>
                            <p class="text-xs text-blue-800/80 leading-relaxed">
                                Permohonan akan diproses oleh admin akademik. Kamu akan mendapat notifikasi email setelah disetujui atau ditolak. Pastikan surat permohonan yang dilampirkan sudah ditandatangani oleh pihak terkait.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 sticky top-24">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 space-y-6">

                        <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden group">
                            <img alt="Ruang Teater" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=600&q=80" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#002045]/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4">
                                <div class="flex items-center gap-2 text-white">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span class="text-[10px] font-bold uppercase tracking-widest">Rektorat Lt. 1</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-lg">
                            <div class="w-8 h-8 rounded bg-red-50 flex items-center justify-center text-red-500 shrink-0">
                                <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                            </div>
                            <div class="overflow-hidden flex-1">
                                <p class="text-xs font-bold text-[#002045] truncate">Surat Peminjaman.pdf</p>
                                <p class="text-[10px] text-slate-500 font-medium">386 KB</p>
                            </div>
                            <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                        </div>

                        <div class="space-y-3 pt-2 border-t border-slate-100">
                            <form action="/user/dashboard" method="GET">
                                <button type="submit" class="w-full bg-primary-gradient text-white font-headline font-bold py-3.5 rounded-xl flex items-center justify-center gap-2 transition-all hover:shadow-lg active:scale-[0.98]">
                                    Kirim Permohonan
                                    <span class="material-symbols-outlined text-lg">send</span>
                                </button>
                            </form>

                            <a href="/user/ajukan-detail" class="w-full flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-headline font-bold py-3.5 rounded-xl hover:bg-slate-50 transition-colors active:scale-[0.98]">
                                Kembali Edit
                            </a>
                        </div>

                        <p class="text-[10px] text-center text-slate-400 font-medium italic">
                            Dengan menekan tombol Kirim, Anda menyetujui syarat & ketentuan penggunaan ruangan universitas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>