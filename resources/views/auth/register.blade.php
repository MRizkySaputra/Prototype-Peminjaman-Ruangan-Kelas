@extends('layouts.auth')

@section('title', 'Daftar Akun')
@section('icon', 'person_add')
@section('card_title', 'SIMPRU')
@section('card_subtitle', 'Sistem Informasi Manajemen Peminjaman Ruangan')

@section('content')

<form action="/register-process" method="POST" class="space-y-4">
@csrf

{{-- STEP 1 --}}
<div id="step1" class="space-y-4">

    {{-- Nama Lengkap --}}
    <div class="space-y-2">
        <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Nama Lengkap</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-outline-color text-xl">badge</span>
            </div>
            <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                   name="name" type="text" placeholder="Masukkan nama lengkap Anda" required>
        </div>
    </div>

    {{-- Email --}}
    <div class="space-y-2">
        <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Alamat Email</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-outline-color text-xl">mail</span>
            </div>
            <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                   name="email" type="email" placeholder="contoh@email.com" required>
        </div>
    </div>

    {{-- NIM / NIDN --}}
    <div class="space-y-2">
        <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">NIM / NIDN</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-outline-color text-xl">pin</span>
            </div>
            <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                   name="id_number" type="text" placeholder="Masukkan NIM atau NIDN Anda" required>
        </div>
    </div>

    {{-- Role --}}
    <div class="space-y-2">
        <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Peran / Jabatan</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-outline-color text-xl">work</span>
            </div>
            <select class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none appearance-none"
                    name="role" required>
                <option value="" disabled selected>Pilih peran Anda</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
                <option value="staf">Staf / Pegawai</option>
                <option value="organisasi">Organisasi Mahasiswa</option>
            </select>
        </div>
    </div>

    <button type="button" onclick="nextStep()"
        class="w-full bg-primary-gradient text-white font-headline font-bold py-3.5 rounded-lg shadow-md flex items-center justify-center gap-2">
        Selanjutnya
        <span class="material-symbols-outlined text-lg">arrow_forward</span>
    </button>

</div>


{{-- STEP 2 --}}
<div id="step2" class="space-y-4 hidden">

    {{-- Password --}}
    <div class="space-y-2">
        <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Kata Sandi</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-outline-color text-xl">lock</span>
            </div>
            <input class="block w-full pl-12 pr-12 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                   id="password" name="password" type="password" placeholder="Minimal 8 karakter" required>
            <button type="button" onclick="togglePassword()"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#002045]">
                <span id="toggleIcon" class="material-symbols-outlined">visibility</span>
            </button>
        </div>
    </div>

    {{-- Konfirmasi --}}
    <div class="space-y-2">
        <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Konfirmasi Kata Sandi</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-outline-color text-xl">lock_reset</span>
            </div>
            <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                   name="password_confirmation" type="password" placeholder="Ulangi kata sandi" required>
        </div>
    </div>

    <div class="flex gap-3">

        <button type="button" onclick="prevStep()"
            class="w-1/2 bg-gray-300 text-gray-800 font-bold py-3 rounded-lg">
            Kembali
        </button>

        <a href="/register-success"
            class="w-1/2 bg-primary-gradient text-white font-headline font-bold py-3 rounded-lg flex items-center justify-center gap-2">
            Buat Akun
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
        </a>

    </div>

</div>


{{-- Login --}}
<div class="flex justify-center pt-2">
    <span class="text-sm text-gray-600">Sudah punya akun?</span>
    <a href="/login" class="text-sm font-medium text-[#002045] hover:underline ml-1">
        Masuk di sini
    </a>
</div>

</form>

@endsection

@push('scripts')
<script>

function nextStep(){
    document.getElementById('step1').classList.add('hidden');
    document.getElementById('step2').classList.remove('hidden');
}

function prevStep(){
    document.getElementById('step2').classList.add('hidden');
    document.getElementById('step1').classList.remove('hidden');
}

function togglePassword(){
    const input = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');

    if(input.type === 'password'){
        input.type = 'text';
        icon.textContent = 'visibility_off';
    }else{
        input.type = 'password';
        icon.textContent = 'visibility';
    }
}

</script>
@endpush
