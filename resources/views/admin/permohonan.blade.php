@extends('layouts.admin')

@section('title', 'Permohonan Masuk')

@section('content')

    @php
        // Simulasi Data Permohonan dari Database
        $permohonans = [
            [
                'init' => 'AN', 'role' => 'Mahasiswa', 'nama' => 'Aditya Nugraha', 'avatar_bg' => 'bg-blue-100 text-blue-800', 'role_bg' => 'bg-slate-100 text-slate-600',
                'ruangan' => 'Lab. Komputer 03', 'tanggal' => '24 Okt 2026', 'waktu' => '09:00 - 12:00 WIB',
                'jenis' => 'Fakultas', 'jenis_bg' => 'bg-indigo-50 text-indigo-600 border-indigo-100', 'kegiatan' => 'Praktikum Algoritma Lanjut'
            ],
            [
                'init' => 'SR', 'role' => 'Dosen', 'nama' => 'Siti Rahayu', 'avatar_bg' => 'bg-purple-100 text-purple-800', 'role_bg' => 'bg-purple-50 text-purple-700 border-purple-100',
                'ruangan' => 'Ruang Teater A', 'tanggal' => '25 Okt 2026', 'waktu' => '13:00 - 15:30 WIB',
                'jenis' => 'Fakultas', 'jenis_bg' => 'bg-indigo-50 text-indigo-600 border-indigo-100', 'kegiatan' => 'Seminar Nasional Robotika'
            ],
            [
                'init' => 'BEM', 'role' => 'Organisasi', 'nama' => 'BEM Fakultas Teknik', 'avatar_bg' => 'bg-orange-100 text-orange-800', 'role_bg' => 'bg-orange-50 text-orange-700 border-orange-100',
                'ruangan' => 'R. Rapat Senat', 'tanggal' => '26 Okt 2026', 'waktu' => '10:00 - 11:30 WIB',
                'jenis' => 'Ormawa', 'jenis_bg' => 'bg-rose-50 text-rose-600 border-rose-100', 'kegiatan' => 'Rapat Koordinasi BEM'
            ],
            [
                'init' => 'DL', 'role' => 'Staf Akademik', 'nama' => 'Diana Lestari', 'avatar_bg' => 'bg-emerald-100 text-emerald-800', 'role_bg' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                'ruangan' => 'Aula Utama', 'tanggal' => '28 Okt 2026', 'waktu' => '08:00 - 17:00 WIB',
                'jenis' => 'Fakultas', 'jenis_bg' => 'bg-indigo-50 text-indigo-600 border-indigo-100', 'kegiatan' => 'Wisuda Gelombang II'
            ]
        ];
    @endphp

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

                    @forelse ($permohonans as $item)
                    <tr class="hover:bg-slate-50/50 transition-colors {{ $loop->even ? 'bg-slate-50/30' : '' }}">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full {{ $item['avatar_bg'] }} flex items-center justify-center text-xs font-bold shrink-0">{{ $item['init'] }}</div>
                                <div>
                                    <span class="text-sm font-bold text-[#002045]">{{ $item['nama'] }}</span>
                                    <span class="block w-max mt-1 px-2 py-0.5 {{ $item['role_bg'] }} text-[9px] font-bold rounded border uppercase tracking-wider">{{ $item['role'] }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-sm font-medium text-slate-600">{{ $item['ruangan'] }}</td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-semibold text-[#002045]">{{ $item['tanggal'] }}</p>
                            <p class="text-xs text-slate-400">{{ $item['waktu'] }}</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="px-2 py-0.5 {{ $item['jenis_bg'] }} text-[9px] font-bold rounded uppercase tracking-wider border mb-1.5 inline-block">{{ $item['jenis'] }}</span>
                            <p class="text-sm text-slate-600 font-medium line-clamp-1">{{ $item['kegiatan'] }}</p>
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
                                <a href="/admin/detail-permohonan" class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded transition-all" title="Lihat Detail">
                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                </a>
                                
                                {{-- Form Setujui Langsung --}}
                                <form action="/admin/detail-permohonan" method="POST" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="p-2 bg-green-50 text-green-600 hover:bg-green-600 hover:text-white rounded transition-all flex items-center" title="Setujui">
                                        <span class="material-symbols-outlined text-lg">check</span>
                                    </button>
                                </form>

                                <button type="button" onclick="openRejectModal()" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded transition-all" title="Tolak">
                                    <span class="material-symbols-outlined text-lg">close</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-slate-500 text-sm">Belum ada permohonan masuk.</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 bg-slate-50 flex justify-between items-center border-t border-slate-200">
            <p class="text-xs text-slate-500 font-medium">Menampilkan {{ count($permohonans) }} permohonan tertunda</p>
            <div class="flex gap-2">
                <button class="p-1 hover:bg-slate-200 rounded transition-colors text-slate-400 disabled:opacity-30" disabled>
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button class="p-1 hover:bg-slate-200 rounded transition-colors text-slate-600 disabled:opacity-30" disabled>
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
    {{-- Modal Tolak Permohonan --}}
    <div id="rejectModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" aria-hidden="true" onclick="closeRejectModal()"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-200">
                    <form action="/admin/detail-permohonan" method="POST">
                        @csrf
                        <div class="bg-white px-6 pb-6 pt-8 sm:p-8">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-12 sm:w-12">
                                    <span class="material-symbols-outlined text-red-600 text-2xl">warning</span>
                                </div>
                                <div class="mt-4 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-xl font-bold leading-6 text-[#002045] font-headline" id="modal-title">Tolak Permohonan</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-slate-500 mb-4">Berikan alasan mengapa permohonan peminjaman ruangan ini ditolak. Alasan ini akan dikirimkan kepada peminjam.</p>
                                        <div>
                                            <label for="alasan_penolakan" class="block text-xs font-bold text-[#002045] uppercase tracking-wider mb-2">Alasan Penolakan <span class="text-red-500">*</span></label>
                                            <textarea id="alasan_penolakan" name="alasan_penolakan" rows="4" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none text-sm resize-none" placeholder="Contoh: Ruangan akan digunakan untuk pemeliharaan rutin..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-slate-50 px-6 py-4 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 border-t border-slate-100">
                            <button type="button" onclick="closeRejectModal()" class="w-full sm:w-auto px-6 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 font-bold hover:bg-slate-50 transition-colors text-sm">Batal</button>
                            <button type="submit" class="w-full sm:w-auto px-8 py-2.5 rounded-lg bg-red-600 text-white font-bold shadow-md hover:bg-red-700 transition-colors text-sm flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-sm">send</span> Kirim Penolakan
                            </button>
                        </div>
                    </form>
                </div>
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

            <form action="/admin/detail-permohonan" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-2">
                        Alasan Penolakan <span class="text-red-500">*</span>
                    </label>
                    <textarea rows="4" 
                            name="alasan_penolakan"
                            required
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
