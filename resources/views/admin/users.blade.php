@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Manajemen Pengguna</h2>
            <p class="text-slate-500 text-sm mt-1">Kelola semua akun pengguna sistem SIMPRU.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="/admin/roles"
               class="flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-[#002045] rounded-lg font-bold text-sm hover:bg-slate-50 shadow-sm transition-colors">
                <span class="material-symbols-outlined text-sm">shield</span>
                Kelola Role
            </a>
            <button onclick="openModal('addUserModal')"
                    class="bg-primary-gradient text-white px-5 py-2.5 rounded-lg font-bold text-sm flex items-center gap-2 hover:opacity-95 shadow-md">
                <span class="material-symbols-outlined text-sm">person_add</span>
                Tambah Pengguna
            </button>
        </div>
    </div>

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-5">
                <div class="p-2.5 bg-blue-50 text-[#002045] rounded-lg group-hover:bg-[#002045] group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">group</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total</span>
            </div>
            <p class="text-4xl font-black text-[#002045] font-headline">124</p>
            <p class="text-xs text-slate-500 font-medium mt-2">Total Pengguna Terdaftar</p>
        </div>
        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-5">
                <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-lg group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">school</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Mahasiswa</span>
            </div>
            <p class="text-4xl font-black text-emerald-600 font-headline">98</p>
            <p class="text-xs text-slate-500 font-medium mt-2">Akun Mahasiswa Aktif</p>
        </div>
        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-5">
                <div class="p-2.5 bg-purple-50 text-purple-600 rounded-lg group-hover:bg-purple-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">person_pin</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Dosen</span>
            </div>
            <p class="text-4xl font-black text-purple-600 font-headline">18</p>
            <p class="text-xs text-slate-500 font-medium mt-2">Akun Dosen & Staf</p>
        </div>
        <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-start justify-between mb-5">
                <div class="p-2.5 bg-red-50 text-red-500 rounded-lg group-hover:bg-red-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">block</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nonaktif</span>
            </div>
            <p class="text-4xl font-black text-red-500 font-headline">08</p>
            <p class="text-xs text-slate-500 font-medium mt-2">Akun Dinonaktifkan</p>
        </div>
    </div>

    {{-- Filter & Pencarian --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 mb-6 flex flex-wrap items-center gap-4">
        <div class="relative flex-1 min-w-[200px]">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
            <input type="text" placeholder="Cari nama, email, atau NIM..."
                   class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
        </div>
        <select class="bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none min-w-[140px]">
            <option value="">Semua Role</option>
            <option value="mahasiswa">Mahasiswa</option>
            <option value="dosen">Dosen</option>
            <option value="staf">Staf Akademik</option>
            <option value="organisasi">Organisasi</option>
            <option value="admin">Admin</option>
        </select>
        <select class="bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none min-w-[130px]">
            <option value="">Semua Status</option>
            <option value="active">Aktif</option>
            <option value="inactive">Nonaktif</option>
        </select>
    </div>

    {{-- Tabel Pengguna --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Pengguna</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widests">NIM / NIDN</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widests">Role</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widests">Bergabung</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widests text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widests text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">

                    @php
                    $users = [
                        ['init'=>'AF','color'=>'blue','name'=>'Ahmad Fauzi','email'=>'ahmad.fauzi@masoem.ac.id','nim'=>'2010411032','role'=>'Mahasiswa','role_color'=>'emerald','joined'=>'Jan 2024','active'=>true],
                        ['init'=>'SR','color'=>'purple','name'=>'Siti Rahayu','email'=>'siti.rahayu@masoem.ac.id','nim'=>'NIDN-19880112','role'=>'Dosen','role_color'=>'purple','joined'=>'Mar 2021','active'=>true],
                        ['init'=>'AN','color'=>'orange','name'=>'Aditya Nugraha','email'=>'aditya.n@masoem.ac.id','nim'=>'2210411045','role'=>'Mahasiswa','role_color'=>'emerald','joined'=>'Aug 2022','active'=>true],
                        ['init'=>'DL','color'=>'teal','name'=>'Diana Lestari','email'=>'diana.l@masoem.ac.id','nim'=>'NIP-197501152005','role'=>'Staf Akademik','role_color'=>'blue','joined'=>'Jun 2018','active'=>true],
                        ['init'=>'BP','color'=>'red','name'=>'Bambang Pamungkas','email'=>'bambang.p@masoem.ac.id','nim'=>'2011411012','role'=>'Mahasiswa','role_color'=>'emerald','joined'=>'Feb 2023','active'=>false],
                        ['init'=>'RM','color'=>'indigo','name'=>'Rina Marlina','email'=>'rina.m@masoem.ac.id','nim'=>'NIDN-19920305','role'=>'Dosen','role_color'=>'purple','joined'=>'Sep 2022','active'=>true],
                    ];
                    $colorMap = ['blue'=>'bg-blue-100 text-blue-800','purple'=>'bg-purple-100 text-purple-800','orange'=>'bg-orange-100 text-orange-800','teal'=>'bg-teal-100 text-teal-800','red'=>'bg-red-100 text-red-800','indigo'=>'bg-indigo-100 text-indigo-800'];
                    $roleColorMap = ['emerald'=>'bg-emerald-50 text-emerald-700 border-emerald-200','purple'=>'bg-purple-50 text-purple-700 border-purple-200','blue'=>'bg-blue-50 text-blue-700 border-blue-200'];
                    @endphp

                    @foreach ($users as $user)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full {{ $colorMap[$user['color']] }} flex items-center justify-center text-xs font-bold shrink-0">
                                    {{ $user['init'] }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">{{ $user['name'] }}</p>
                                    <p class="text-xs text-slate-400">{{ $user['email'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-slate-600">{{ $user['nim'] }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-[10px] font-bold rounded-full border {{ $roleColorMap[$user['role_color']] }} uppercase tracking-wider">
                                {{ $user['role'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $user['joined'] }}</td>
                        <td class="px-6 py-4 text-center">
                            @if ($user['active'])
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold rounded-full uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-red-50 text-red-600 border border-red-200 text-[10px] font-bold rounded-full uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Nonaktif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1.5">
                                <button onclick="openModal('editUserModal')"
                                        class="p-1.5 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded-lg transition-all" title="Edit">
                                    <span class="material-symbols-outlined text-sm">edit</span>
                                </button>
                                <button onclick="openModal('changeRoleModal')"
                                        class="p-1.5 bg-purple-50 text-purple-600 hover:bg-purple-600 hover:text-white rounded-lg transition-all" title="Ubah Role">
                                    <span class="material-symbols-outlined text-sm">manage_accounts</span>
                                </button>
                                @if ($user['active'])
                                    <button onclick="openModal('deactivateModal')"
                                            class="p-1.5 bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white rounded-lg transition-all" title="Nonaktifkan">
                                        <span class="material-symbols-outlined text-sm">block</span>
                                    </button>
                                @else
                                    <button class="p-1.5 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded-lg transition-all" title="Aktifkan">
                                        <span class="material-symbols-outlined text-sm">check_circle</span>
                                    </button>
                                @endif
                                <button onclick="openModal('deleteUserModal')"
                                        class="p-1.5 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all" title="Hapus">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs font-medium text-slate-500">Menampilkan 1-6 dari 124 pengguna</p>
            <div class="flex items-center gap-1">
                <button class="p-2 rounded-lg text-slate-400 border border-slate-200 bg-white disabled:opacity-50" disabled>
                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                </button>
                <button class="w-8 h-8 rounded-lg bg-[#002045] text-white text-xs font-bold shadow-sm">1</button>
                <button class="w-8 h-8 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 text-xs font-bold">2</button>
                <button class="w-8 h-8 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 text-xs font-bold">3</button>
                <span class="px-2 text-slate-400">...</span>
                <button class="w-8 h-8 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 text-xs font-bold">21</button>
                <button class="p-2 rounded-lg text-slate-600 border border-slate-200 bg-white hover:bg-slate-100">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

{{-- Modal Tambah Pengguna --}}
<div id="addUserModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg mx-4 overflow-hidden flex flex-col max-h-[90vh]">
        <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-lg font-bold text-[#002045] font-headline">Tambah Pengguna Baru</h3>
            <button onclick="closeModal('addUserModal')" class="p-2 rounded-full hover:bg-slate-100 text-slate-400">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4 bg-slate-50/50">
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama lengkap" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
            </div>
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Alamat Email</label>
                <input type="email" placeholder="nama@masoem.ac.id" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
            </div>
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">NIM / NIDN</label>
                <input type="text" placeholder="Masukkan NIM atau NIDN" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
            </div>
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Role</label>
                <select class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                    <option value="">Pilih role pengguna</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                    <option value="staf">Staf Akademik</option>
                    <option value="organisasi">Organisasi</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Kata Sandi Awal</label>
                <input type="password" placeholder="Minimal 8 karakter" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
            </div>
        </div>
        <div class="px-6 py-4 bg-white border-t border-slate-200 flex justify-end gap-3">
            <button onclick="closeModal('addUserModal')" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50">Batal</button>
            <button class="px-8 py-2.5 rounded-lg bg-primary-gradient text-white font-bold text-sm shadow-md hover:opacity-95">Simpan</button>
        </div>
    </div>
</div>

{{-- Modal Edit Pengguna --}}
<div id="editUserModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg mx-4 overflow-hidden flex flex-col max-h-[90vh]">
        <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-lg font-bold text-[#002045] font-headline">Edit Pengguna</h3>
            <button onclick="closeModal('editUserModal')" class="p-2 rounded-full hover:bg-slate-100 text-slate-400">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4 bg-slate-50/50">
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Nama Lengkap</label>
                <input type="text" value="Ahmad Fauzi" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
            </div>
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Alamat Email</label>
                <input type="email" value="ahmad.fauzi@masoem.ac.id" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
            </div>
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">NIM / NIDN</label>
                <input type="text" value="2010411032" class="w-full bg-slate-100 border border-slate-200 rounded-lg p-3.5 text-sm outline-none cursor-not-allowed" readonly>
            </div>
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Reset Kata Sandi (opsional)</label>
                <input type="password" placeholder="Kosongkan jika tidak diubah" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
            </div>
        </div>
        <div class="px-6 py-4 bg-white border-t border-slate-200 flex justify-end gap-3">
            <button onclick="closeModal('editUserModal')" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50">Batal</button>
            <button class="px-8 py-2.5 rounded-lg bg-[#002045] text-white font-bold text-sm shadow-md hover:opacity-95">Simpan Perubahan</button>
        </div>
    </div>
</div>

{{-- Modal Ubah Role --}}
<div id="changeRoleModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm mx-4 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-lg font-bold text-[#002045] font-headline">Ubah Role Pengguna</h3>
            <button onclick="closeModal('changeRoleModal')" class="p-2 rounded-full hover:bg-slate-100 text-slate-400">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="p-6 space-y-3 bg-slate-50/50">
            <div class="flex items-center gap-3 mb-4 p-3 bg-white border border-slate-200 rounded-lg">
                <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center text-xs font-bold">AF</div>
                <div>
                    <p class="text-sm font-bold text-slate-800">Ahmad Fauzi</p>
                    <p class="text-xs text-slate-400">Role saat ini: <span class="font-bold text-emerald-600">Mahasiswa</span></p>
                </div>
            </div>
            <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Pilih Role Baru</label>
            @php
            $roles = [
                ['value'=>'mahasiswa','label'=>'Mahasiswa','desc'=>'Dapat mengajukan peminjaman ruangan','icon'=>'school','color'=>'emerald'],
                ['value'=>'dosen','label'=>'Dosen','desc'=>'Akses prioritas peminjaman ruangan','icon'=>'person_pin','color'=>'purple'],
                ['value'=>'staf','label'=>'Staf Akademik','desc'=>'Akses peminjaman untuk kegiatan kampus','icon'=>'badge','color'=>'blue'],
                ['value'=>'organisasi','label'=>'Organisasi','desc'=>'Akses untuk kegiatan kemahasiswaan','icon'=>'groups','color'=>'orange'],
                ['value'=>'admin','label'=>'Admin','desc'=>'Akses penuh manajemen sistem','icon'=>'admin_panel_settings','color'=>'red'],
            ];
            @endphp
            <div class="space-y-2">
                @foreach ($roles as $role)
                <label class="flex items-center gap-3 p-3 bg-white border border-slate-200 rounded-lg cursor-pointer hover:border-[#002045]/30 hover:bg-blue-50/30 transition-all has-[:checked]:border-[#002045] has-[:checked]:bg-blue-50">
                    <input type="radio" name="role_change" value="{{ $role['value'] }}" {{ $role['value'] === 'mahasiswa' ? 'checked' : '' }} class="accent-[#002045]">
                    <div class="flex-1">
                        <p class="text-sm font-bold text-slate-800">{{ $role['label'] }}</p>
                        <p class="text-[10px] text-slate-500">{{ $role['desc'] }}</p>
                    </div>
                </label>
                @endforeach
            </div>
        </div>
        <div class="px-6 py-4 bg-white border-t border-slate-200 flex justify-end gap-3">
            <button onclick="closeModal('changeRoleModal')" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50">Batal</button>
            <button class="px-8 py-2.5 rounded-lg bg-purple-600 text-white font-bold text-sm shadow-md hover:opacity-95">Simpan Role</button>
        </div>
    </div>
</div>

{{-- Modal Nonaktifkan --}}
<div id="deactivateModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl p-8 w-full max-w-sm text-center shadow-2xl mx-4">
        <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-5 border-4 border-amber-100">
            <span class="material-symbols-outlined text-3xl">block</span>
        </div>
        <h3 class="text-xl font-bold text-[#002045] font-headline mb-2">Nonaktifkan Pengguna?</h3>
        <p class="text-sm text-slate-500 mb-8 leading-relaxed">Pengguna tidak akan bisa login hingga diaktifkan kembali.</p>
        <div class="flex flex-col gap-3">
            <button class="w-full py-3 rounded-lg bg-amber-500 text-white font-bold text-sm hover:bg-amber-600">Ya, Nonaktifkan</button>
            <button onclick="closeModal('deactivateModal')" class="w-full py-3 rounded-lg text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50">Batal</button>
        </div>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="deleteUserModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl p-8 w-full max-w-sm text-center shadow-2xl mx-4">
        <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-5 border-4 border-red-100">
            <span class="material-symbols-outlined text-3xl">warning</span>
        </div>
        <h3 class="text-xl font-bold text-[#002045] font-headline mb-2">Hapus Pengguna?</h3>
        <p class="text-sm text-slate-500 mb-8 leading-relaxed">Semua data pengguna termasuk riwayat peminjaman akan terhapus permanen.</p>
        <div class="flex flex-col gap-3">
            <button class="w-full py-3 rounded-lg bg-red-600 text-white font-bold text-sm hover:bg-red-700">Ya, Hapus Permanen</button>
            <button onclick="closeModal('deleteUserModal')" class="w-full py-3 rounded-lg text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50">Batal</button>
        </div>
    </div>
</div>

<script>
    function openModal(id) { const m = document.getElementById(id); m.classList.remove('hidden'); m.classList.add('flex'); }
    function closeModal(id) { const m = document.getElementById(id); m.classList.add('hidden'); m.classList.remove('flex'); }
</script>
@endpush
