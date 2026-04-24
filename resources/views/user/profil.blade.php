@extends('layouts.user')

@section('title', 'Profil')

@section('content')

    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Pengaturan Akun</h2>
        <p class="text-slate-500 text-sm mt-1">Kelola informasi pribadi dan pengaturan keamanan akun Anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        {{-- Kiri: Info & Edit Profil --}}
        <div class="lg:col-span-8 bg-white rounded-2xl p-8 shadow-sm border border-slate-200">

            {{-- Avatar --}}
            <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start pb-8 mb-8 border-b border-slate-100">
                <div class="relative group shrink-0">
                    <div class="h-24 w-24 rounded-2xl overflow-hidden ring-4 ring-slate-50 shadow-inner">
                        <img alt="Profile"
                             class="w-full h-full object-cover"
                             src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=002045&color=fff&size=128">
                    </div>
                    <label for="avatarInput"
                           class="absolute -bottom-3 -right-3 bg-white text-[#002045] p-2.5 rounded-full shadow-lg border border-slate-200 hover:scale-105 transition-all cursor-pointer">
                        <span class="material-symbols-outlined text-sm">photo_camera</span>
                    </label>
                    <input id="avatarInput" type="file" accept="image/*" class="hidden">
                </div>
                <div class="text-center sm:text-left">
                    <h3 class="text-xl font-bold text-[#002045] font-headline" id="displayName">Ahmad Fauzi</h3>
                    <span class="px-3 py-1 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold tracking-widest uppercase inline-block mt-2" id="displayRole">
                        Mahasiswa
                    </span>
                    <p class="text-xs text-slate-400 mt-2">Klik ikon kamera untuk ubah foto</p>
                </div>
            </div>

            {{-- Form Edit Inline --}}
            <form id="profileForm" action="#" method="POST" class="space-y-5">
                @csrf

                {{-- Nama Lengkap --}}
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">badge</span>
                        <input id="inputName"
                               name="name"
                               type="text"
                               value="Ahmad Fauzi"
                               class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-lg text-sm font-semibold text-slate-800 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all"
                               placeholder="Masukkan nama lengkap Anda">
                    </div>
                </div>

                {{-- Alamat Email --}}
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Alamat Email</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">mail</span>
                        <input id="inputEmail"
                               name="email"
                               type="email"
                               value="ahmad.fauzi@masoem.ac.id"
                               class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-lg text-sm font-semibold text-slate-800 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all"
                               placeholder="nama@email.com">
                    </div>
                </div>

                {{-- NIM / NIDN --}}
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">NIM / NIDN</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">pin</span>
                        <input name="id_number"
                               type="text"
                               value="2010411032"
                               readonly
                               class="w-full pl-11 pr-10 py-3 bg-slate-100 border border-slate-200 rounded-lg text-sm font-semibold text-slate-500 outline-none cursor-not-allowed">
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">lock</span>
                    </div>
                    <p class="text-[10px] text-slate-400 mt-1.5 italic">NIM/NIDN tidak dapat diubah. Hubungi admin jika ada kesalahan.</p>
                </div>

                {{-- Peran / Jabatan --}}
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widests mb-2">Peran / Jabatan</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">work</span>
                        <select id="inputRole"
                                name="role"
                                class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-lg text-sm font-semibold text-slate-800 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all appearance-none">
                            <option value="mahasiswa" selected>Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="staf">Staf / Pegawai</option>
                            <option value="organisasi">Organisasi Mahasiswa</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm pointer-events-none">expand_more</span>
                    </div>
                </div>

                {{-- Garis pemisah --}}
                <div class="pt-2 border-t border-slate-100">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Ubah Kata Sandi <span class="normal-case font-normal text-slate-400">(opsional)</span></p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widests mb-2">Kata Sandi Baru</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock</span>
                                <input id="inputPassword"
                                       name="password"
                                       type="password"
                                       class="w-full pl-11 pr-10 py-3 bg-slate-50 border border-slate-200 rounded-lg text-sm font-semibold text-slate-800 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all"
                                       placeholder="Minimal 8 karakter">
                                <button type="button" onclick="togglePassword('inputPassword', 'iconPass1')"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-[#002045]">
                                    <span id="iconPass1" class="material-symbols-outlined text-sm">visibility</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widests mb-2">Konfirmasi Kata Sandi</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock_reset</span>
                                <input id="inputPasswordConfirm"
                                       name="password_confirmation"
                                       type="password"
                                       class="w-full pl-11 pr-10 py-3 bg-slate-50 border border-slate-200 rounded-lg text-sm font-semibold text-slate-800 focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] focus:bg-white outline-none transition-all"
                                       placeholder="Ulangi kata sandi baru">
                                <button type="button" onclick="togglePassword('inputPasswordConfirm', 'iconPass2')"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-[#002045]">
                                    <span id="iconPass2" class="material-symbols-outlined text-sm">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="reset"
                            class="px-6 py-2.5 border border-slate-200 text-slate-600 rounded-lg text-sm font-bold hover:bg-slate-50 transition-colors">
                        Reset
                    </button>
                    <button type="button"
                            onclick="saveProfile()"
                            class="px-8 py-2.5 bg-[#002045] text-white rounded-lg text-sm font-bold hover:bg-[#00152e] hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">save</span>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        {{-- Kanan: Info Akun --}}
        <div class="lg:col-span-4 space-y-5">

            {{-- Ringkasan Akun --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 space-y-4">
                <h4 class="text-sm font-bold text-[#002045] font-headline flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">manage_accounts</span>
                    Ringkasan Akun
                </h4>
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-500 font-medium">Status</span>
                        <span class="px-2 py-0.5 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-full font-bold">Aktif</span>
                    </div>
                    <div class="flex justify-between items-center text-xs border-t border-slate-100 pt-3">
                        <span class="text-slate-500 font-medium">NIM / NIDN</span>
                        <span class="font-bold text-slate-700">2010411032</span>
                    </div>
                    <div class="flex justify-between items-center text-xs border-t border-slate-100 pt-3">
                        <span class="text-slate-500 font-medium">Bergabung</span>
                        <span class="font-bold text-slate-700">Jan 2024</span>
                    </div>
                    <div class="flex justify-between items-center text-xs border-t border-slate-100 pt-3">
                        <span class="text-slate-500 font-medium">Total Peminjaman</span>
                        <span class="font-bold text-slate-700">12x</span>
                    </div>
                </div>
            </div>

            {{-- Keamanan --}}
            <div class="bg-primary-gradient text-white rounded-2xl p-6 shadow-lg relative overflow-hidden">
                <div class="relative z-10 space-y-3">
                    <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center border border-white/20">
                        <span class="material-symbols-outlined text-white text-xl">shield_locked</span>
                    </div>
                    <h4 class="text-base font-bold font-headline">Tips Keamanan</h4>
                    <p class="text-xs text-blue-100 leading-relaxed">
                        Gunakan minimal 8 karakter dengan kombinasi huruf besar, kecil, dan angka untuk kata sandi yang kuat.
                    </p>
                </div>
                <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    }

    function saveProfile() {
        const name = document.getElementById('inputName').value.trim();
        const role = document.getElementById('inputRole');
        const roleLabel = role.options[role.selectedIndex].text;

        // Update display
        document.getElementById('displayName').textContent = name || 'Ahmad Fauzi';
        document.getElementById('displayRole').textContent = roleLabel;

        // Update avatar initials src
        const avatarImg = document.querySelector('img[alt="Profile"]');
        if (name) {
            avatarImg.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=002045&color=fff&size=128`;
        }

        // Show success toast
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-6 right-6 z-50 bg-emerald-600 text-white px-5 py-3 rounded-xl shadow-lg flex items-center gap-2 text-sm font-bold transition-all';
        toast.innerHTML = '<span class="material-symbols-outlined text-base">check_circle</span> Profil berhasil disimpan!';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }
</script>
@endpush
