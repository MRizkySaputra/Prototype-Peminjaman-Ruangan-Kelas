@extends('layouts.auth')

@section('title', 'Register')
@section('icon', 'person_add')
@section('card_title', 'SIMPRU')
@section('card_subtitle', 'Sistem Informasi Manajemen Peminjaman Ruangan')

@section('content')

    <form action="/register-process" method="POST" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 gap-4">

            {{-- Nama --}}
            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Full Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-outline-color text-xl">badge</span>
                    </div>
                    <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                           name="name" type="text" placeholder="Enter your full name" required>
                </div>
            </div>

            {{-- Email --}}
            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-outline-color text-xl">mail</span>
                    </div>
                    <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                           name="email" type="email" placeholder="example@email.com" required>
                </div>
            </div>

            {{-- ID Number --}}
            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Student / Lecturer ID</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-outline-color text-xl">badge</span>
                    </div>
                    <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                           name="id_number" type="text" placeholder="Enter your ID number" required>
                </div>
            </div>

            {{-- Password --}}
            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-outline-color text-xl">lock</span>
                    </div>
                    <input class="block w-full pl-12 pr-12 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                           id="password" name="password" type="password" placeholder="••••••••" required>
                    <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#002045]">
                        <span id="toggleIcon" class="material-symbols-outlined">visibility</span>
                    </button>
                </div>
            </div>

        </div>

        {{-- Tombol Register --}}
        <div class="pt-2">
            <a href="/register-success" class="w-full bg-primary-gradient text-white font-headline font-bold py-3.5 rounded-lg shadow-md hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2"
                    type="submit">
                Create Account
                <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </a>
        </div>

        {{-- Link Login --}}
        <div class="flex justify-center pt-2">
            <span class="text-sm text-gray-600">Already have an account?</span>
            <a href="/login" class="text-sm font-medium text-[#002045] hover:underline underline-offset-4 ml-1">
                Sign In
            </a>
        </div>

    </form>

@endsection

@push('scripts')
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    }
</script>
@endpush
