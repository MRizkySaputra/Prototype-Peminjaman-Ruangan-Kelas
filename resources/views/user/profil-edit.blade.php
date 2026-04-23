@extends('layouts.user')

@section('title', 'Edit Profil')

@section('content')

    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Edit Profil</h2>
        <p class="text-slate-500 text-sm mt-1">Perbarui informasi pribadi dan sesuaikan pengaturan akun Anda.</p>
    </div>

    {{-- Form Container --}}
    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200 max-w-4xl">
        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8">
            
            {{-- Token Keamanan Bawaan Laravel (Wajib ada di setiap form) --}}
            @csrf

            {{-- Bagian 1: Ubah Foto Profil --}}
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 pb-8 border-b border-slate-100">
                <div class="h-24 w-24 rounded-2xl overflow-hidden ring-4 ring-slate-50 shadow-inner shrink-0">
                    <img alt="Profile"
                         class="w-full h-full object-cover"
                         src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff&size=128">
                </div>
                <div class="flex-1 w-full text-center sm:text-left">
                    <label class="block text-sm font-bold text-[#002045] mb-2">Foto Profil Baru</label>
                    <input type="file" 
                           class="block w-full text-sm text-slate-500 
                                  file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 
                                  file:text-sm file:font-bold file:bg-blue-50 file:text-[#002045] 
                                  hover:file:bg-blue-100 hover:file:cursor-pointer transition-all">
                    <p class="text-[10px] text-slate-400 mt-2 font-medium">Format yang didukung: JPG, PNG. Ukuran maksimal: 2MB.</p>
                </div>
            </div>

            {{-- Bagian 2: Data Informasi Pribadi --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                
                {{-- Nama Lengkap --}}
                <div class="sm:col-span-2">
                    <label class="block text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-2">Nama Lengkap</label>
                    <input type="text" 
                           value="Ahmad Fauzi" 
                           class="w-full bg-white p-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] outline-none transition-all text-slate-800 font-semibold"
                           placeholder="Masukkan nama lengkap Anda">
                </div>

                {{-- NIM / NIP (Sengaja dibuat readonly karena identitas ini biasanya tidak boleh diubah user) --}}
                <div>
                    <label class="block text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-2">NIM / NIP</label>
                    <div class="relative">
                        <input type="text" 
                               value="2010411032" 
                               readonly 
                               class="w-full bg-slate-50 p-3 rounded-lg border border-slate-200 outline-none text-slate-500 font-semibold cursor-not-allowed">
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">lock</span>
                    </div>
                </div>

                {{-- Jurusan --}}
                <div>
                    <label class="block text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-2">Jurusan</label>
                    <select class="w-full bg-white p-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] outline-none transition-all text-slate-800 font-semibold">
                        <option value="Teknik Informatika" selected>Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                        <option value="Akuntansi">Akuntansi</option>
                    </select>
                </div>

                {{-- Email --}}
                <div class="sm:col-span-2">
                    <label class="block text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-2">Alamat Email</label>
                    <input type="email" 
                           value="ahmad.fauzi@masoem.ac.id" 
                           class="w-full bg-white p-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] outline-none transition-all text-slate-800 font-semibold"
                           placeholder="nama@email.com">
                </div>

            </div>

            {{-- Bagian 3: Tombol Aksi --}}
            <div class="flex items-center justify-end gap-4 pt-8 border-t border-slate-100 mt-8">
                <a href="/user/profil" 
                   class="px-6 py-3 border border-slate-300 text-slate-600 rounded-lg text-sm font-bold hover:bg-slate-50 transition-all">
                    Batal
                </a>
                <button type="button" 
                        class="px-8 py-3 bg-[#002045] text-white rounded-lg text-sm font-bold hover:bg-[#00152e] hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">save</span>
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

@endsection