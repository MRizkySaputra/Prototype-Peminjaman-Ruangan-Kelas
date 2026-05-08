@extends('layouts.admin')

@section('title', 'Permohonan Masuk')

@section('content')

    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-3xl font-headline font-extrabold text-[#002045] mb-2">Permohonan Masuk</h2>
        <p class="text-slate-500 text-sm">Daftar permohonan peminjaman ruangan yang memerlukan tindakan.</p>
    </div>

    {{-- Filter Tab --}}
    <div class="flex items-center gap-2 mb-8 p-1 bg-slate-200/50 rounded-lg w-fit">
        <button class="px-6 py-2 rounded-md text-sm font-bold bg-white text-[#002045] shadow-sm">Semua</button>
        <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Pending</button>
        <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Disetujui</button>
        <button class="px-6 py-2 rounded-md text-sm font-medium text-slate-500 hover:text-[#002045] hover:bg-white/50 transition-colors">Ditolak</button>
    </div>

    {{-- Tabel Permohonan --}}
    <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Peminjam & Role</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Ruangan</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Tanggal & Waktu</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Jenis Kegiatan</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Keperluan</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">

                    {{-- Baris 1 --}}
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center text-xs font-bold shrink-0">AN</div>
                                <div>
                                    <span class="text-sm font-bold text-[#002045]">Aditya Nugraha</span>
                                    <span class="block w-max mt-1 px-2 py-0.5 bg-slate-100 text-slate-600 text-[9px] font-bold rounded border border-slate-200 uppercase tracking-wider">Mahasiswa</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-600">Lab. Komputer 03</td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-semibold text-[#002045]">24 Okt 2026</p>
                            <p class="text-xs text-slate-400">09:00 - 12:00 WIB</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 bg-blue-50 text-blue-700 text-[10px] font-bold rounded-full border border-blue-100">Praktikum</span>
                        </td>
                        <td class="px-6 py-5 text-sm text-slate-600">Praktikum Algoritma Lanjut</td>
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold rounded-full uppercase tracking-wider">Pending</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <a href="/admin/detail-permohonan"
                                   class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded transition-all"
                                   title="Lihat Detail">
                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                </a>
                                <button class="p-2 bg-green-50 text-green-600 hover:bg-green-600 hover:text-white rounded transition-all" title="Setujui">
                                    <span class="material-symbols-outlined text-lg">check</span>
                                </button>
                                <button onclick="openRejectModal()" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded transition-all" title="Tolak">
                                    <span class="material-symbols-outlined text-lg">close</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Baris 2 --}}
                    <tr class="bg-slate-50/30 hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-800 flex items-center justify-center text-xs font-bold shrink-0">SR</div>
                                <div>
                                    <span class="text-sm font-bold text-[#002045]">Siti Rahayu</span>
                                    <span class="block w-max mt-1 px-2 py-0.5 bg-purple-50 text-purple-700 text-[9px] font-bold rounded border border-purple-100 uppercase tracking-wider">Dosen</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-600">Ruang Teater A</td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-semibold text-[#002045]">25 Okt 2026</p>
                            <p class="text-xs text-slate-400">13:00 - 15:30 WIB</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 bg-purple-50 text-purple-700 text-[10px] font-bold rounded-full border border-purple-100">Seminar</span>
                        </td>
                        <td class="px-6 py-5 text-sm text-slate-600">Seminar Nasional Robotika</td>
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold rounded-full uppercase tracking-wider">Pending</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <a href="/admin/detail-permohonan"
                                   class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded transition-all"
                                   title="Lihat Detail">
                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                </a>
                                <button class="p-2 bg-green-50 text-green-600 hover:bg-green-600 hover:text-white rounded transition-all" title="Setujui">
                                    <span class="material-symbols-outlined text-lg">check</span>
                                </button>
                                <button onclick="openRejectModal()" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded transition-all" title="Tolak">
                                    <span class="material-symbols-outlined text-lg">close</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Baris 3 --}}
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-orange-100 text-orange-800 flex items-center justify-center text-xs font-bold shrink-0">BEM</div>
                                <div>
                                    <span class="text-sm font-bold text-[#002045]">BEM Fakultas Teknik</span>
                                    <span class="block w-max mt-1 px-2 py-0.5 bg-orange-50 text-orange-700 text-[9px] font-bold rounded border border-orange-100 uppercase tracking-wider">Organisasi</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-600">R. Rapat Senat</td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-semibold text-[#002045]">26 Okt 2026</p>
                            <p class="text-xs text-slate-400">10:00 - 11:30 WIB</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 text-[10px] font-bold rounded-full border border-amber-100">Rapat</span>
                        </td>
                        <td class="px-6 py-5 text-sm text-slate-600">Rapat Koordinasi BEM</td>
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold rounded-full uppercase tracking-wider">Pending</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <a href="/admin/detail-permohonan"
                                   class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded transition-all"
                                   title="Lihat Detail">
                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                </a>
                                <button class="p-2 bg-green-50 text-green-600 hover:bg-green-600 hover:text-white rounded transition-all" title="Setujui">
                                    <span class="material-symbols-outlined text-lg">check</span>
                                </button>
                                <button onclick="openRejectModal()" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded transition-all" title="Tolak">
                                    <span class="material-symbols-outlined text-lg">close</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Baris 4 --}}
                    <tr class="bg-slate-50/30 hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center text-xs font-bold shrink-0">DL</div>
                                <div>
                                    <span class="text-sm font-bold text-[#002045]">Diana Lestari</span>
                                    <span class="block w-max mt-1 px-2 py-0.5 bg-emerald-50 text-emerald-700 text-[9px] font-bold rounded border border-emerald-100 uppercase tracking-wider">Staf Akademik</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-600">Aula Utama</td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-semibold text-[#002045]">28 Okt 2026</p>
                            <p class="text-xs text-slate-400">08:00 - 17:00 WIB</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-[10px] font-bold rounded-full border border-emerald-100">Acara Resmi</span>
                        </td>
                        <td class="px-6 py-5 text-sm text-slate-600">Wisuda Gelombang II</td>
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold rounded-full uppercase tracking-wider">Pending</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <a href="/admin/detail-permohonan"
                                   class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded transition-all"
                                   title="Lihat Detail">
                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                </a>
                                <button class="p-2 bg-green-50 text-green-600 hover:bg-green-600 hover:text-white rounded transition-all" title="Setujui">
                                    <span class="material-symbols-outlined text-lg">check</span>
                                </button>
                                <button onclick="openRejectModal()" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded transition-all" title="Tolak">
                                    <span class="material-symbols-outlined text-lg">close</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 bg-slate-50 flex justify-between items-center border-t border-slate-200">
            <p class="text-xs text-slate-500 font-medium">Menampilkan 4 dari 18 permohonan tertunda</p>
            <div class="flex gap-2">
                <button class="p-1 hover:bg-slate-200 rounded transition-colors text-slate-400 disabled:opacity-30" disabled>
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button class="p-1 hover:bg-slate-200 rounded transition-colors text-slate-600">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Modal Alasan Penolakan --}}
    <div id="rejectModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-6 md:p-8 w-full max-w-lg shadow-2xl m-4 transform transition-all">
            <div class="flex items-center justify-between mb-6 border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-50 text-red-600 rounded-full flex items-center justify-center">
                        <span class="material-symbols-outlined">cancel</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-[#002045] font-headline">Tolak Permohonan</h3>
                        <p class="text-[11px] text-slate-500">Formulir konfirmasi penolakan</p>
                    </div>
                </div>
                <button onclick="closeRejectModal()" class="p-2 rounded-full hover:bg-slate-100 text-slate-400 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-2">
                        Alasan Penolakan <span class="text-red-500">*</span>
                    </label>
                    <textarea rows="4" 
                              class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none resize-none transition-all placeholder:text-slate-400" 
                              placeholder="Contoh: Jadwal bentrok dengan kegiatan universitas, atau ruangan sedang dalam perbaikan..."></textarea>
                    <p class="text-[10px] text-slate-400 mt-2 flex items-start gap-1">
                        <span class="material-symbols-outlined text-[12px]">info</span>
                        Alasan ini akan dikirimkan ke notifikasi atau email peminjam.
                    </p>
                </div>

                <div class="flex gap-3 justify-end pt-2">
                    <button type="button" onclick="closeRejectModal()" class="px-6 py-2.5 rounded-lg border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-colors">
                        Kembali
                    </button>
                    <button type="submit" class="px-8 py-2.5 rounded-lg bg-red-600 text-white font-bold text-sm shadow-md hover:bg-red-700 transition-colors">
                        Kirim Penolakan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Fungsi untuk membuka modal penolakan
    function openRejectModal() {
        const modal = document.getElementById('rejectModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // Fungsi untuk menutup modal penolakan
    function closeRejectModal() {
        const modal = document.getElementById('rejectModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Menutup modal jika klik di luar kotak putih (area backdrop)
    document.getElementById('rejectModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeRejectModal();
        }
    });
</script>
@endpush