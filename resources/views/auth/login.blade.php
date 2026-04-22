@extends('layouts.auth')

@section('title', 'Sign In')
@section('icon', 'account_balance')
@section('card_title', 'SIMPRU')
@section('card_subtitle', 'Sistem Informasi Manajemen Peminjaman Ruangan')

@section('content')

    {{-- Pesan Error --}}
    @if(session('error'))
        <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 text-sm font-bold rounded-lg text-center">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login-process" method="POST" class="space-y-5">
        @csrf

        {{-- Username --}}
        <div class="space-y-2">
            <label class="text-xs font-bold uppercase tracking-wider text-variant px-1">Username</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-outline-color text-xl">person</span>
                </div>
                <input class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                       name="username" type="text" placeholder="Enter your username" required>
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

        {{-- Link Register --}}
        <div class="text-sm text-gray-600">
            Don't have an account?
            <a href="/register" class="font-medium text-[#002045] hover:underline ml-1">Create account</a>
        </div>

        {{-- Tombol Login --}}
        <button class="w-full bg-primary-gradient text-white font-headline font-bold py-3.5 rounded-lg shadow-md hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2"
                type="submit">
            Sign In
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
        </button>

        {{-- Forgot Password --}}
        <div class="flex justify-end">
            <a href="/forget-password" class="text-sm font-medium text-[#002045] hover:underline">
                Forgot Password?
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
