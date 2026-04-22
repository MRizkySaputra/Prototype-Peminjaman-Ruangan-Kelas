@extends('layouts.admin')

@section('title', 'Manajemen Ruangan')

@section('content')

    {{-- Header Halaman --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Manajemen Ruangan</h2>
            <p class="text-slate-500 text-sm mt-1">Kelola semua ruangan yang tersedia di lingkungan kampus.</p>
        </div>
        <button onclick="openModal('addRoomModal')"
                class="bg-primary-gradient text-white px-5 py-2.5 rounded-lg font-semibold text-sm flex items-center gap-2 hover:opacity-95 transition-all shadow-md">
            <span class="material-symbols-outlined text-sm">add</span> Tambah Ruangan
        </button>
    </div>

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-blue-50 text-blue-900 rounded-lg">
                    <span class="material-symbols-outlined">meeting_room</span>
                </div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Kapasitas Total</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-extrabold text-slate-900 font-headline">48</h3>
                <p class="text-sm font-medium text-slate-500">Total Ruangan</p>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-200">
                <p class="text-[11px] text-slate-500 font-medium">Terdaftar di 5 Gedung Utama</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-green-50 text-green-600 rounded-lg">
                    <span class="material-symbols-outlined">check_circle</span>
                </div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Ketersediaan</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-extrabold text-green-600 font-headline">32</h3>
                <p class="text-sm font-medium text-slate-500">Ruangan Tersedia</p>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-200 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                <p class="text-[11px] text-green-600 font-bold uppercase tracking-tight">Sistem Siap Digunakan</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-amber-50 text-amber-600 rounded-lg">
                    <span class="material-symbols-outlined">event_busy</span>
                </div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Reservasi Aktif</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-extrabold text-amber-600 font-headline">16</h3>
                <p class="text-sm font-medium text-slate-500">Ruangan Dipakai</p>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-200 flex justify-between items-center">
                <p class="text-[11px] text-slate-500 font-medium">Booked hari ini</p>
                <a class="text-[11px] font-bold text-blue-900 hover:underline" href="/admin/dashboard">Lihat Jadwal</a>
            </div>
        </div>
    </div>

    {{-- Tabel Ruangan --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-slate-200">
        <div class="p-6 bg-white flex justify-between items-center border-b border-slate-200">
            <h4 class="font-headline font-bold text-[#002045] text-lg">Daftar Ruangan Terdaftar</h4>
            <button class="p-2 bg-slate-50 rounded-lg hover:bg-slate-100 transition-colors text-slate-600 border border-slate-200 flex items-center gap-2 text-sm font-semibold">
                <span class="material-symbols-outlined text-base">filter_list</span> Filter
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-slate-500 border-b border-slate-200">ID</th>
                        <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-slate-500 border-b border-slate-200">Informasi Ruangan</th>
                        <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-slate-500 border-b border-slate-200">Kapasitas</th>
                        <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-slate-500 border-b border-slate-200">Fasilitas Utama</th>
                        <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-slate-500 border-b border-slate-200">Status</th>
                        <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-slate-500 border-b border-slate-200 text-right">Kelola</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-5 text-sm font-medium text-slate-600">R-001</td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-blue-900 text-xl">meeting_room</span>
                                </div>
                                <div>
                                    <span class="text-sm font-bold text-slate-900">Auditorium Utama A.1</span>
                                    <p class="text-[11px] text-slate-500">Gedung Rektorat • Lantai 2</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg text-slate-600">groups</span>
                                <span class="text-sm font-semibold text-slate-900">250 Peserta</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-2 py-0.5 bg-slate-100 text-[10px] font-bold rounded-full text-slate-600">AC Central</span>
                                <span class="px-2 py-0.5 bg-slate-100 text-[10px] font-bold rounded-full text-slate-600">Proyektor 4K</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="text-[11px] font-extrabold text-green-600 uppercase tracking-tight">Aktif</span>
                            </div>
                        </td>
                        <td class="p-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('editRoomModal')"
                                        class="p-2 hover:bg-blue-50 text-slate-400 hover:text-blue-700 rounded-lg transition-colors border border-slate-200"
                                        title="Edit">
                                    <span class="material-symbols-outlined text-sm">edit</span>
                                </button>
                                <button onclick="openModal('deleteRoomModal')"
                                        class="p-2 hover:bg-red-50 text-slate-400 hover:text-red-600 rounded-lg transition-colors border border-slate-200"
                                        title="Hapus">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-5 text-sm font-medium text-slate-600">R-002</td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-blue-900 text-xl">computer</span>
                                </div>
                                <div>
                                    <span class="text-sm font-bold text-slate-900">Lab Komputer Dasar</span>
                                    <p class="text-[11px] text-slate-500">Gedung FT • Lantai 1</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg text-slate-600">groups</span>
                                <span class="text-sm font-semibold text-slate-900">40 Peserta</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-2 py-0.5 bg-slate-100 text-[10px] font-bold rounded-full text-slate-600">High-speed PC</span>
                                <span class="px-2 py-0.5 bg-slate-100 text-[10px] font-bold rounded-full text-slate-600">LAN Gigabit</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="text-[11px] font-extrabold text-green-600 uppercase tracking-tight">Aktif</span>
                            </div>
                        </td>
                        <td class="p-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('editRoomModal')"
                                        class="p-2 hover:bg-blue-50 text-slate-400 hover:text-blue-700 rounded-lg transition-colors border border-slate-200"
                                        title="Edit">
                                    <span class="material-symbols-outlined text-sm">edit</span>
                                </button>
                                <button onclick="openModal('deleteRoomModal')"
                                        class="p-2 hover:bg-red-50 text-slate-400 hover:text-red-600 rounded-lg transition-colors border border-slate-200"
                                        title="Hapus">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-6 bg-slate-50 border-t border-slate-200 flex justify-between items-center">
            <span class="text-xs text-slate-500 font-medium">
                Menampilkan <span class="font-bold text-slate-900">1-2</span> dari <span class="font-bold text-slate-900">48</span> entri
            </span>
            <div class="flex items-center gap-1">
                <button class="p-2 rounded-lg text-slate-600 hover:bg-slate-200 transition-colors disabled:opacity-50" disabled>
                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-900 text-white text-xs font-bold shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-200 text-slate-600 text-xs font-bold transition-colors">2</button>
                <span class="px-2 text-slate-600 font-bold">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-200 text-slate-600 text-xs font-bold transition-colors">16</button>
                <button class="p-2 rounded-lg text-slate-600 hover:bg-slate-200 transition-colors">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

@endsection

{{-- Modal Tambah Ruangan --}}
@push('scripts')
<div id="addRoomModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
    <div class="relative w-full max-w-2xl bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh] m-4">
        <div class="p-6 border-b border-slate-200 flex justify-between items-center">
            <h3 class="text-xl font-extrabold text-[#002045] font-headline">Tambah Ruangan Baru</h3>
            <button onclick="closeModal('addRoomModal')" class="p-2 hover:bg-slate-100 rounded-full text-slate-500">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="p-8 overflow-y-auto bg-slate-50/50">
            <form class="space-y-5">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-2">Nama Ruangan</label>
                    <input class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 focus:border-[#002045] outline-none"
                           placeholder="Contoh: Auditorium Serbaguna" type="text">
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-2">Gedung</label>
                        <select class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                            <option>Gedung A (Rektorat)</option>
                            <option>Gedung B (Fakultas Teknik)</option>
                            <option>Gedung C (Perpustakaan)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-2">Lantai</label>
                        <select class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                            <option>Lantai 1</option>
                            <option>Lantai 2</option>
                            <option>Lantai 3</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Kapasitas (Orang)</label>
                    <input class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                           placeholder="Contoh: 40" type="number" min="1">
                </div>
            </form>
        </div>
        <div class="p-6 bg-white border-t border-slate-200 flex justify-end gap-3">
            <button onclick="closeModal('addRoomModal')"
                    class="px-6 py-2.5 rounded-lg text-sm font-bold text-slate-600 border border-slate-200 hover:bg-slate-50">
                Batal
            </button>
            <button class="bg-primary-gradient text-white px-8 py-2.5 rounded-lg font-bold text-sm hover:opacity-95 shadow-md">
                Simpan Ruangan
            </button>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div id="editRoomModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
    <div class="relative w-full max-w-lg bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col m-4">
        <div class="px-8 py-6 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-xl font-bold text-[#002045] font-headline">Edit Ruangan</h3>
            <button onclick="closeModal('editRoomModal')" class="p-2 rounded-full hover:bg-slate-100 text-slate-400">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="px-8 py-8 space-y-5 bg-slate-50/50">
            <div>
                <label class="text-[11px] uppercase tracking-wider font-bold text-slate-500 block mb-2">Nama Ruangan</label>
                <input class="w-full bg-white border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                       type="text" value="Auditorium Utama A.1">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[11px] uppercase tracking-wider font-bold text-slate-500 block mb-2">Gedung</label>
                    <select class="w-full bg-white border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        <option selected>Gedung Rektorat</option>
                        <option>Gedung Teknik</option>
                    </select>
                </div>
                <div>
                    <label class="text-[11px] uppercase tracking-wider font-bold text-slate-500 block mb-2">Kapasitas</label>
                    <input class="w-full bg-white border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
                           type="number" value="250">
                </div>
            </div>
        </div>
        <div class="px-8 py-6 bg-white border-t border-slate-200 flex justify-end gap-3">
            <button onclick="closeModal('editRoomModal')"
                    class="px-6 py-2.5 rounded-lg border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50">
                Batal
            </button>
            <button class="px-8 py-2.5 rounded-lg bg-[#002045] text-white font-semibold text-sm shadow-md hover:opacity-95">
                Simpan Perubahan
            </button>
        </div>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="deleteRoomModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl p-8 w-full max-w-sm text-center shadow-2xl m-4">
        <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-5 border-4 border-red-100">
            <span class="material-symbols-outlined text-3xl">warning</span>
        </div>
        <h3 class="text-xl font-bold text-[#002045] font-headline mb-2">Hapus Ruangan?</h3>
        <p class="text-sm text-slate-500 mb-8 leading-relaxed">
            Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="flex flex-col gap-3">
            <button class="w-full py-3 rounded-lg bg-red-600 text-white font-bold text-sm hover:bg-red-700">
                Ya, Hapus Ruangan
            </button>
            <button onclick="closeModal('deleteRoomModal')"
                    class="w-full py-3 rounded-lg text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50">
                Batal
            </button>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@endpush
