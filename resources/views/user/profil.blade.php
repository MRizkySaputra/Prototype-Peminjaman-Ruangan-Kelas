@extends('layouts.user')

@section('title', 'Profil')

@section('content')

    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Pengaturan Akun</h2>
        <p class="text-slate-500 text-sm mt-1">Kelola informasi pribadi dan pengaturan keamanan akun Anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        {{-- Kiri: Info Profil --}}
        <div class="lg:col-span-8 bg-white rounded-2xl p-8 shadow-sm border border-slate-200">
            <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">

                {{-- Avatar --}}
                <div class="relative group shrink-0">
                    <div class="h-32 w-32 rounded-2xl overflow-hidden ring-4 ring-slate-50 shadow-inner">
                        <img alt="Profile"
                             class="w-full h-full object-cover"
                             src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff&size=128">
                    </div>
                    <button class="absolute -bottom-3 -right-3 bg-white text-[#002045] p-2.5 rounded-full shadow-lg border border-slate-200 hover:scale-105 transition-all">
                        <span class="material-symbols-outlined text-sm">photo_camera</span>
                    </button>
                </div>

                {{-- Info --}}
                <div class="flex-1 w-full space-y-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-[#002045] font-headline">Ahmad Fauzi</h3>
                            <span class="px-3 py-1 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold tracking-widest uppercase inline-block mt-2">
                                Mahasiswa Aktif
                            </span>
                        </div>
                        <button class="flex items-center justify-center gap-2 px-5 py-2 border-2 border-[#002045] text-[#002045] rounded-lg text-sm font-bold hover:bg-[#002045] hover:text-white transition-all">
                            <span class="material-symbols-outlined text-sm">edit</span> Edit Profil
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-2">NIM / NIP</p>
                            <p class="text-slate-800 font-semibold bg-slate-50 p-2.5 rounded-lg border border-slate-100">2010411032</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-2">Jurusan</p>
                            <p class="text-slate-800 font-semibold bg-slate-50 p-2.5 rounded-lg border border-slate-100">Teknik Informatika</p>
                        </div>
                        <div class="sm:col-span-2">
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-2">Email</p>
                            <div class="flex items-center gap-3 text-slate-800 font-semibold bg-slate-50 p-2.5 rounded-lg border border-slate-100">
                                <span class="material-symbols-outlined text-slate-400 text-lg">mail</span>
                                ahmad.fauzi@masoem.ac.id
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kanan: Keamanan --}}
        <div class="lg:col-span-4">
            <div class="bg-primary-gradient text-white rounded-2xl p-8 shadow-lg relative overflow-hidden">
                <div class="relative z-10 space-y-4">
                    <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center border border-white/20 mb-6">
                        <span class="material-symbols-outlined text-white text-2xl">shield_locked</span>
                    </div>
                    <h4 class="text-xl font-bold font-headline">Keamanan Akun</h4>
                    <p class="text-sm text-blue-100 leading-relaxed">
                        Pastikan kata sandi Anda terdiri dari minimal 8 karakter dengan kombinasi huruf besar, kecil, dan angka.
                    </p>
                    <div class="pt-4 space-y-3">
                        <button class="w-full py-3 px-4 bg-white text-[#002045] rounded-xl font-bold text-sm hover:bg-slate-100 transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-sm">password</span> Ubah Kata Sandi
                        </button>
                        <button class="w-full py-3 px-4 bg-transparent border border-white/30 text-white rounded-xl font-bold text-sm hover:bg-white/10 transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-sm">support_agent</span> Hubungi Helpdesk
                        </button>
                    </div>
                </div>
                <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            </div>
        </div>

    </div>

@endsection
