@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    {{-- Filter Bar --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">
        <div class="flex flex-wrap items-end gap-4">

            {{-- Pilih Gedung --}}
            <div class="flex-1 min-w-[140px]">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Gedung</label>
                <select id="filterGedung" onchange="applyFilter()"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                    <option value="">Semua Gedung</option>
                    <option value="A">Gedung A (Rektorat)</option>
                    <option value="B">Gedung B (Fakultas Teknik)</option>
                    <option value="C">Gedung C (Fakultas Ekonomi)</option>
                </select>
            </div>

            {{-- Pilih Ruangan --}}
            <div class="flex-1 min-w-[140px]">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Ruangan</label>
                <select id="filterRuangan" onchange="applyFilter()"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                    <option value="">Semua Ruangan</option>
                    <option value="A-101" data-gedung="A">Auditorium Utama</option>
                    <option value="A-102" data-gedung="A">Ruang Teater</option>
                    <option value="B-201" data-gedung="B">Lab Komputer 01</option>
                    <option value="B-202" data-gedung="B">Lab Komputer 02</option>
                    <option value="B-301" data-gedung="B">R. Seminar B</option>
                    <option value="C-101" data-gedung="C">R. Rapat Senat</option>
                </select>
            </div>

            {{-- Pilih Tanggal --}}
            <div class="flex-1 min-w-[140px]">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widests mb-2">Tanggal</label>
                <input id="filterTanggal"
                       class="w-full bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none"
                       type="date" value="2026-10-24">
            </div>

            {{-- Filter Status --}}
            <div class="flex-1 min-w-[140px]">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widests mb-2">Status</label>
                <select class="w-full bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                    <option value="">Semua Status</option>
                    <option value="available">Kosong</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Disetujui</option>
                    <option value="rejected">Ditolak</option>
                </select>
            </div>

            {{-- Navigasi Hari --}}
            <div class="flex items-center gap-2 ml-auto">
                <button onclick="changeDay(-1)" class="p-2.5 bg-slate-50 hover:bg-slate-100 border border-slate-200 rounded-lg transition-colors text-slate-600">
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </button>
                <div id="currentDayLabel" class="px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 rounded-lg text-sm font-bold min-w-[150px] text-center">
                    Sabtu, 24 Okt 2026
                </div>
                <button onclick="changeDay(1)" class="p-2.5 bg-slate-50 hover:bg-slate-100 border border-slate-200 rounded-lg transition-colors text-slate-600">
                    <span class="material-symbols-outlined text-xl">chevron_right</span>
                </button>
                <button onclick="goToday()" class="px-4 py-2.5 bg-slate-50 hover:bg-slate-100 border border-slate-200 rounded-lg text-sm font-bold text-slate-600 transition-colors">
                    Hari Ini
                </button>
                <button onclick="openNewBookingModal()" class="px-4 py-2.5 bg-primary-gradient text-white rounded-lg text-sm font-bold shadow-md hover:opacity-90 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">add</span> Booking Baru
                </button>
            </div>

        </div>
    </div>

    {{-- Legenda --}}
    <div class="flex items-center gap-6 mb-4 px-1">
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-slate-300"></div>
            <span class="text-xs font-semibold text-slate-500">Kosong</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
            <span class="text-xs font-semibold text-slate-500">Pending</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
            <span class="text-xs font-semibold text-slate-500">Disetujui</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-red-400"></div>
            <span class="text-xs font-semibold text-slate-500">Ditolak</span>
        </div>
    </div>

    {{-- Kalender Grid --}}
    @php
        $rooms = [
            ['code' => 'A-101', 'gedung' => 'A', 'name' => 'Auditorium Utama', 'building' => 'Gedung A', 'capacity' => 250],
            ['code' => 'A-102', 'gedung' => 'A', 'name' => 'Ruang Teater', 'building' => 'Gedung A', 'capacity' => 50],
            ['code' => 'B-201', 'gedung' => 'B', 'name' => 'Lab Komputer 01', 'building' => 'Gedung B', 'capacity' => 40],
            ['code' => 'B-202', 'gedung' => 'B', 'name' => 'Lab Komputer 02', 'building' => 'Gedung B', 'capacity' => 40],
            ['code' => 'B-301', 'gedung' => 'B', 'name' => 'R. Seminar B', 'building' => 'Gedung B', 'capacity' => 80],
            ['code' => 'C-101', 'gedung' => 'C', 'name' => 'R. Rapat Senat', 'building' => 'Gedung C', 'capacity' => 30],
        ];

        $bookings = [
            'A-101' => [
                [8, 11, 'approved', 'Diana Lestari', 'Wisuda Gelombang II'],
                [13, 15, 'pending', 'BEM FT', 'Seminar Nasional'],
            ],
            'A-102' => [
                [9, 11, 'approved', 'Aditya Nugraha', 'Praktikum Algoritma'],
                [14, 16, 'pending', 'Siti Rahayu', 'Workshop Desain'],
            ],
            'B-201' => [
                [7, 9, 'approved', 'Rina Marlina', 'Praktikum Jaringan'],
                [10, 12, 'rejected', 'Budi Santoso', 'Ujian Susulan'],
            ],
            'B-202' => [
                [13, 15, 'approved', 'Ahmad Fauzi', 'Pemrograman Web'],
            ],
            'B-301' => [],
            'C-101' => [
                [9, 10, 'pending', 'Bambang P.', 'Rapat Koordinasi'],
            ],
        ];

        $hours = range(7, 20);

        $statusConfig = [
            'available' => ['bg' => 'bg-slate-100', 'hover' => 'hover:bg-slate-200', 'text' => '', 'border' => 'border-slate-200', 'dot' => 'bg-slate-300', 'label' => ''],
            'pending'   => ['bg' => 'bg-amber-50',  'hover' => 'hover:bg-amber-100', 'text' => 'text-amber-800', 'border' => 'border-amber-200', 'dot' => 'bg-amber-400', 'label' => 'Pending'],
            'approved'  => ['bg' => 'bg-emerald-50','hover' => 'hover:bg-emerald-100','text' => 'text-emerald-800','border' => 'border-emerald-200', 'dot' => 'bg-emerald-500', 'label' => 'Disetujui'],
            'rejected'  => ['bg' => 'bg-red-50',    'hover' => 'hover:bg-red-100',   'text' => 'text-red-800',   'border' => 'border-red-200', 'dot' => 'bg-red-400', 'label' => 'Ditolak'],
        ];
    @endphp

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto" id="calendarScroll">
            <div id="calendarInner" class="min-w-max">

                {{-- Header Ruangan --}}
                <div class="flex border-b border-slate-200 bg-slate-50 sticky top-0 z-20">
                    <div class="w-20 shrink-0 px-3 py-4 border-r border-slate-200">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Jam</span>
                    </div>
                    @foreach ($rooms as $room)
                        <div class="room-col flex-1 min-w-[160px] px-3 py-3 border-r border-slate-200 last:border-r-0"
                             data-code="{{ $room['code'] }}" data-gedung="{{ $room['gedung'] }}">
                            <p class="text-xs font-extrabold text-[#002045] truncate">{{ $room['name'] }}</p>
                            <p class="text-[10px] text-slate-400 font-medium mt-0.5">{{ $room['building'] }} • {{ $room['code'] }}</p>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="material-symbols-outlined text-[12px] text-slate-400">group</span>
                                <span class="text-[10px] text-slate-400 font-medium">{{ $room['capacity'] }} orang</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Baris Per Jam --}}
                <div class="max-h-[600px] overflow-y-auto">
                    @foreach ($hours as $hour)
                        <div class="flex border-b border-slate-100 last:border-b-0 hover:bg-slate-50/30 transition-colors">

                            <div class="w-20 shrink-0 px-3 border-r border-slate-200 flex items-center justify-end h-14">
                                <span class="text-[11px] font-bold text-slate-400">
                                    {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00
                                </span>
                            </div>

                            @foreach ($rooms as $room)
                                @php
                                    $slotStatus = 'available';
                                    $slotData = null;
                                    foreach ($bookings[$room['code']] ?? [] as $booking) {
                                        if ($hour >= $booking[0] && $hour < $booking[1]) {
                                            $slotStatus = $booking[2];
                                            $slotData = $booking;
                                            break;
                                        }
                                    }
                                    $cfg = $statusConfig[$slotStatus];
                                @endphp

                                <div class="room-col flex-1 min-w-[160px] h-14 border-r border-slate-100 last:border-r-0 p-1 group relative"
                                     data-code="{{ $room['code'] }}" data-gedung="{{ $room['gedung'] }}">

                                    @if ($slotStatus === 'available')
                                        <button
                                            onclick="openNewBookingModal('{{ $room['code'] }}', {{ $hour }}, '{{ $room['name'] }}')"
                                            class="w-full h-full rounded-lg {{ $cfg['bg'] }} {{ $cfg['hover'] }} border border-dashed {{ $cfg['border'] }} transition-all flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer z-10 relative">
                                            <span class="material-symbols-outlined text-slate-400 text-sm">add</span>
                                        </button>
                                        <div class="absolute inset-1 rounded-lg {{ $cfg['bg'] }} border border-dashed {{ $cfg['border'] }} group-hover:opacity-0 transition-all pointer-events-none"></div>

                                    @else
                                        <div class="w-full h-full rounded-lg {{ $cfg['bg'] }} border {{ $cfg['border'] }} px-2 py-1 relative overflow-hidden">
                                            <div class="absolute left-0 top-0 bottom-0 w-1 rounded-l-lg {{ $cfg['dot'] }}"></div>
                                            <div class="pl-2">
                                                <div class="flex items-center gap-1 mb-0.5">
                                                    <span class="w-1.5 h-1.5 rounded-full {{ $cfg['dot'] }} shrink-0"></span>
                                                    <span class="text-[9px] font-bold uppercase tracking-wider {{ $cfg['text'] }}">{{ $cfg['label'] }}</span>
                                                </div>
                                                @if ($slotData)
                                                    <p class="text-[10px] font-bold text-slate-700 truncate leading-tight">{{ $slotData[3] }}</p>
                                                    <p class="text-[9px] text-slate-500 truncate">{{ $slotData[4] }}</p>
                                                @endif
                                            </div>

                                            {{-- Hover Aksi --}}
                                            <div class="absolute inset-0 bg-white/95 rounded-lg border {{ $cfg['border'] }} opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center gap-1.5 z-10">
                                                {{-- Lihat detail selalu ada --}}
                                                <a href="/admin/detail-permohonan"
                                                   class="p-1.5 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded transition-all"
                                                   title="Lihat Detail">
                                                    <span class="material-symbols-outlined text-sm">visibility</span>
                                                </a>
                                                @if ($slotStatus === 'pending')
                                                    <button class="p-1.5 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded transition-all" title="Setujui">
                                                        <span class="material-symbols-outlined text-sm">check</span>
                                                    </button>
                                                    <button class="p-1.5 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white rounded transition-all" title="Tolak">
                                                        <span class="material-symbols-outlined text-sm">close</span>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach

                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        {{-- Footer Info --}}
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
            <p class="text-xs text-slate-500 font-medium">
                Menampilkan <span class="font-bold text-slate-700" id="roomCount">{{ count($rooms) }}</span> ruangan •
                <span id="footerDate">Sabtu, 24 Oktober 2026</span>
            </p>
            <p class="text-xs text-slate-400 font-medium italic">
                Hover slot untuk aksi cepat
            </p>
        </div>
    </div>

    {{-- Modal Booking Baru --}}
    <div id="newBookingModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-[#002045]/40 backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg mx-4 overflow-hidden flex flex-col max-h-[90vh]">
            <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                <h3 class="text-lg font-bold text-[#002045] font-headline">Buat Booking Baru</h3>
                <button onclick="closeNewBookingModal()" class="p-2 rounded-full hover:bg-slate-100 text-slate-400">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 overflow-y-auto bg-slate-50/50 space-y-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-2">Ruangan</label>
                    <select id="bookingRoom" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        <option value="A-101">Auditorium Utama (Gedung A)</option>
                        <option value="A-102">Ruang Teater (Gedung A)</option>
                        <option value="B-201">Lab Komputer 01 (Gedung B)</option>
                        <option value="B-202">Lab Komputer 02 (Gedung B)</option>
                        <option value="B-301">R. Seminar B (Gedung B)</option>
                        <option value="C-101">R. Rapat Senat (Gedung C)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-2">Nama Peminjam</label>
                    <input type="text" placeholder="Nama lengkap" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Tanggal</label>
                        <input id="bookingDate" type="date" value="2026-10-24" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Waktu Mulai</label>
                        <select id="bookingHour" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                            @foreach(range(7, 19) as $h)
                                <option value="{{ $h }}">{{ str_pad($h, 2, '0', STR_PAD_LEFT) }}:00</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Durasi</label>
                    <select class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        <option>1 Jam</option>
                        <option>2 Jam</option>
                        <option>3 Jam</option>
                        <option>4 Jam</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Keperluan</label>
                    <textarea rows="2" placeholder="Deskripsi kegiatan..." class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none resize-none"></textarea>
                </div>
            </div>
            <div class="px-6 py-4 bg-white border-t border-slate-200 flex justify-end gap-3">
                <button onclick="closeNewBookingModal()" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50">Batal</button>
                <button class="px-8 py-2.5 rounded-lg bg-primary-gradient text-white font-bold text-sm shadow-md hover:opacity-95">Simpan Booking</button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // === TANGGAL ===
    let currentDate = new Date('2026-10-24');
    const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    function formatDateShort(d) {
        return `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth()].substring(0,3)} ${d.getFullYear()}`;
    }
    function formatDateLabel(d) {
        return `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
    }
    function padDate(n) { return n.toString().padStart(2,'0'); }
    function toInputVal(d) {
        return `${d.getFullYear()}-${padDate(d.getMonth()+1)}-${padDate(d.getDate())}`;
    }

    function updateDateUI() {
        document.getElementById('currentDayLabel').textContent = formatDateShort(currentDate);
        document.getElementById('footerDate').textContent = formatDateLabel(currentDate);
        document.getElementById('filterTanggal').value = toInputVal(currentDate);
        document.getElementById('bookingDate').value = toInputVal(currentDate);
    }

    function changeDay(offset) {
        currentDate.setDate(currentDate.getDate() + offset);
        updateDateUI();
    }

    function goToday() {
        currentDate = new Date();
        updateDateUI();
    }

    document.getElementById('filterTanggal').addEventListener('change', function() {
        currentDate = new Date(this.value + 'T00:00:00');
        updateDateUI();
    });

    // === FILTER RUANGAN ===
    function applyFilter() {
        const gedungFilter = document.getElementById('filterGedung').value;
        const ruanganFilter = document.getElementById('filterRuangan').value;

        document.querySelectorAll('.room-col').forEach(col => {
            const code = col.dataset.code;
            const gedung = col.dataset.gedung;
            let show = true;
            if (gedungFilter && gedung !== gedungFilter) show = false;
            if (ruanganFilter && code !== ruanganFilter) show = false;
            col.style.display = show ? '' : 'none';
        });

        const visible = document.querySelectorAll('#calendarInner .room-col[data-code]:not([style*="display: none"])').length / 2;
        document.getElementById('roomCount').textContent = Math.round(visible);
    }

    document.getElementById('filterGedung').addEventListener('change', function() {
        const val = this.value;
        const ruanganSel = document.getElementById('filterRuangan');
        ruanganSel.value = '';
        Array.from(ruanganSel.options).forEach(opt => {
            if (!opt.value) return;
            opt.style.display = (!val || opt.dataset.gedung === val) ? '' : 'none';
        });
        applyFilter();
    });

    // === MODAL BOOKING BARU ===
    function openNewBookingModal(roomCode, hour, roomName) {
        const modal = document.getElementById('newBookingModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        if (roomCode) {
            document.getElementById('bookingRoom').value = roomCode;
        }
        if (hour !== undefined) {
            document.getElementById('bookingHour').value = hour;
        }
    }

    function closeNewBookingModal() {
        const modal = document.getElementById('newBookingModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Close modal on backdrop click
    document.getElementById('newBookingModal').addEventListener('click', function(e) {
        if (e.target === this) closeNewBookingModal();
    });

    // Init
    updateDateUI();
</script>
@endpush
