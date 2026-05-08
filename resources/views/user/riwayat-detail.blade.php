@extends('layouts.user')

@section('title', 'Detail Peminjaman')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

    {{-- Kiri: Informasi Peminjaman --}}
    <div class="lg:col-span-7">
        <div class="bg-white rounded-xl p-8 shadow-sm border border-slate-200">

            <div class="flex justify-between items-start mb-8">
                <div>
                    <h2 class="text-2xl font-extrabold text-[#002045] font-headline tracking-tight mb-1">
                        Informasi Peminjaman
                    </h2>
                    <p class="text-sm text-slate-500">Dibuat pada 20 Okt 2026 • ID #REQ-DRAFT</p>
                </div>

                {{-- Status Badge (Diubah via JS) --}}
                <span id="statusBadge" class="px-4 py-1.5 rounded-full font-bold text-xs tracking-wider uppercase hidden">
                    </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">

                {{-- Alasan Penolakan (Hanya muncul jika status ditolak via JS) --}}
                <div id="rejectionBox" class="md:col-span-2 hidden">
                    <div class="bg-red-50 border border-red-100 rounded-xl p-5 flex gap-4 items-start shadow-sm">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shrink-0 shadow-sm text-red-500">
                            <span class="material-symbols-outlined text-xl">block</span>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-red-500 font-bold mb-1">Alasan Penolakan Admin</p>
                            <p class="text-sm font-medium text-red-800 leading-relaxed">
                                Mohon maaf, jadwal yang Anda pilih bentrok dengan jadwal pemeliharaan (maintenance) ruangan. Silakan ajukan ulang untuk tanggal yang berbeda.
                            </p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Ruangan</p>
                    <p class="font-bold text-slate-900">Ruang Teater - Gedung A</p>
                    <p class="text-xs text-slate-500 mt-1">Gedung Utama (Rektorat) Lt. 1</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Tanggal & Waktu</p>
                    <p class="font-bold text-slate-900">Selasa, 24 Oktober 2026</p>
                    <p class="text-xs text-slate-500 mt-1">10:00 - 11:00 WIB</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Jenis Kegiatan</p>
                    <p class="font-bold text-slate-900">Sidang</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Nama Kegiatan</p>
                    <p class="font-bold text-[#002045] text-lg">Workshop Pemrograman</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Estimasi Peserta</p>
                    <p class="font-bold text-slate-900">40 Orang</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Penanggung Jawab</p>
                    <p class="font-bold text-slate-900">Ahmad Fauzi (2010411032)</p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Keperluan</p>
                    <p class="text-slate-700 leading-relaxed bg-slate-50 p-4 rounded-lg border border-slate-100">
                        Praktikum Algoritma Lanjut
                    </p>
                </div>

                <div class="md:col-span-2 border-t border-slate-100 pt-6 mt-[-1rem]">
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-2">Fasilitas Ruangan Tersedia</p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">AC Sentral</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">Proyektor 4K</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">Sound System</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">Panggung Utama</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Kanan: Surat Permohonan --}}
    <div class="lg:col-span-5">
        <div class="bg-white border border-slate-200 rounded-xl p-8 sticky top-24 shadow-sm">

            <div class="flex items-center gap-3 mb-6">
                <span class="material-symbols-outlined text-[#002045] text-3xl">description</span>
                <h3 class="text-lg font-bold text-[#002045] font-headline">Dokumen Lampiran</h3>
            </div>

            <div class="aspect-[3/4] bg-slate-50 rounded-lg overflow-hidden mb-6 border border-slate-200 flex flex-col items-center justify-center p-6 text-center">
                <div class="w-16 h-16 bg-white shadow-sm rounded-full flex items-center justify-center mb-4 text-red-600">
                    <span class="material-symbols-outlined text-4xl">picture_as_pdf</span>
                </div>

                <p class="font-bold text-[#002045] mb-1">Surat Peminjaman.pdf</p>
                <p class="text-xs text-slate-500">386 KB</p>
            </div>

            <div class="space-y-3">
                <button class="w-full py-3 px-4 rounded-lg border-2 border-[#002045] text-[#002045] font-bold flex items-center justify-center gap-2 hover:bg-[#002045]/5 transition-colors">
                    <span class="material-symbols-outlined text-xl">download</span>
                    Unduh Dokumen
                </button>

                {{-- Tombol Cetak Bukti (Diatur via JS) --}}
                <button id="printBtn" class="w-full py-3 px-4 rounded-lg font-bold flex items-center justify-center gap-2 transition-all">
                    </button>
            </div>

        </div>
    </div>

</div>

{{-- Info Box Bottom (Diatur via JS) --}}
<div id="infoBox" class="mt-8 p-6 rounded-2xl border hidden">
    </div>

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil parameter '?status=' dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status') || 'disetujui'; // Defaultnya disetujui jika tidak ada param

        // Elemen-elemen yang akan diubah dinamis
        const statusBadge = document.getElementById('statusBadge');
        const rejectionBox = document.getElementById('rejectionBox');
        const printBtn = document.getElementById('printBtn');
        const infoBox = document.getElementById('infoBox');

        // Munculkan elemen badge dan info box
        statusBadge.classList.remove('hidden');
        infoBox.classList.remove('hidden');

        if (status === 'ditolak') {
            // Tampilan Ditolak
            statusBadge.textContent = 'Ditolak';
            statusBadge.className = 'px-4 py-1.5 rounded-full bg-red-100 text-red-700 font-bold text-xs tracking-wider uppercase inline-block';
            
            rejectionBox.classList.remove('hidden'); // Munculkan alasan penolakan

            printBtn.className = 'w-full py-3 px-4 rounded-lg bg-slate-200 text-slate-400 font-bold flex items-center justify-center gap-2 cursor-not-allowed';
            printBtn.disabled = true;
            printBtn.innerHTML = '<span class="material-symbols-outlined text-xl">print</span> Cetak Bukti (Tidak Tersedia)';

            infoBox.className = 'mt-8 p-6 bg-red-50 rounded-2xl border border-red-100 flex gap-4';
            infoBox.innerHTML = `
                <span class="material-symbols-outlined text-red-600 mt-0.5">info</span>
                <p class="text-sm font-medium leading-relaxed text-red-800">
                    Permohonan Anda tidak dapat disetujui. Silakan periksa alasan penolakan di atas. 
                    Anda dapat mengajukan permohonan baru melalui halaman <a href="/user/ajukan" class="font-bold underline hover:text-red-900">Jadwal & Pengajuan</a>.
                </p>`;
        } 
        else if (status === 'diproses') {
            // Tampilan Diproses
            statusBadge.textContent = 'Diproses';
            statusBadge.className = 'px-4 py-1.5 rounded-full bg-amber-100 text-amber-700 font-bold text-xs tracking-wider uppercase inline-block';
            
            rejectionBox.classList.add('hidden');

            printBtn.className = 'w-full py-3 px-4 rounded-lg bg-slate-200 text-slate-400 font-bold flex items-center justify-center gap-2 cursor-not-allowed';
            printBtn.disabled = true;
            printBtn.innerHTML = '<span class="material-symbols-outlined text-xl">print</span> Cetak Bukti (Menunggu)';

            infoBox.className = 'mt-8 p-6 bg-amber-50 rounded-2xl border border-amber-100 flex gap-4';
            infoBox.innerHTML = `
                <span class="material-symbols-outlined text-amber-600 mt-0.5">pending_actions</span>
                <p class="text-sm font-medium leading-relaxed text-amber-800">
                    Permohonan Anda sedang dalam antrean untuk ditinjau oleh Admin. Silakan periksa halaman ini secara berkala.
                </p>`;
        } 
        else {
            // Tampilan Disetujui (Default)
            statusBadge.textContent = 'Disetujui';
            statusBadge.className = 'px-4 py-1.5 rounded-full bg-emerald-100 text-emerald-700 font-bold text-xs tracking-wider uppercase inline-block';
            
            rejectionBox.classList.add('hidden');

            printBtn.className = 'w-full py-3 px-4 rounded-lg bg-primary-gradient text-white font-bold flex items-center justify-center gap-2 hover:opacity-90 transition-opacity';
            printBtn.disabled = false;
            printBtn.innerHTML = '<span class="material-symbols-outlined text-xl">print</span> Cetak Bukti';

            infoBox.className = 'mt-8 p-6 bg-blue-50 rounded-2xl border border-blue-100 flex gap-4';
            infoBox.innerHTML = `
                <span class="material-symbols-outlined text-blue-700 mt-0.5">lightbulb</span>
                <p class="text-xs leading-relaxed text-blue-800/80">
                    Harap tunjukkan bukti persetujuan ini kepada petugas keamanan saat tiba
                    di lokasi untuk mendapatkan akses masuk ruangan.
                </p>`;
        }
    });
</script>
@endpush