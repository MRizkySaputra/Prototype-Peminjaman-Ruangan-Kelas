@extends('layouts.user')

@section('title', 'Ajukan Peminjaman')

@section('container_class', 'p-8 max-w-[1600px] mx-auto')

@section('content')

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-3xl font-extrabold text-[#002045] font-headline tracking-tight">Ajukan Peminjaman</h2>
        <p class="text-slate-500 text-sm mt-1">Pilih ruangan dan waktu yang tersedia, lalu lanjutkan pengajuan.</p>
    </div>

    {{-- Filter Bar --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">
        <div class="flex flex-wrap items-end gap-4">

            {{-- Pilih Gedung --}}
            <div class="flex-1 min-w-[160px]">
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
            <div class="flex-1 min-w-[160px]">
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
            <div class="flex-1 min-w-[160px]">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Tanggal</label>
                <input id="filterTanggal"
                       class="w-full bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none"
                       type="date" value="2026-10-24">
            </div>

            {{-- Min Kapasitas --}}
            <div class="w-44">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widests mb-2">Min. Kapasitas</label>
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4">
                    <span class="material-symbols-outlined text-sm text-slate-400 mr-2">group</span>
                    <input class="w-full bg-transparent border-none p-0 focus:ring-0 text-sm font-medium outline-none" placeholder="10" type="number">
                </div>
            </div>
        </div>
    </div>

    {{-- Legenda --}}
    <div class="flex items-center gap-6 mb-4 px-1">
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-slate-300"></div>
            <span class="text-xs font-semibold text-slate-500">Kosong — bisa dipilih</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
            <span class="text-xs font-semibold text-slate-500">Pending</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
            <span class="text-xs font-semibold text-slate-500">Terisi</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-blue-500"></div>
            <span class="text-xs font-semibold text-slate-500">Pilihan Anda</span>
        </div>
    </div>

    {{-- Kalender Grid --}}
    @php
        $rooms = [
            ['code' => 'A-101', 'gedung' => 'A', 'name' => 'Auditorium Utama', 'building' => 'Gedung A', 'capacity' => 250,
             'img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=400&q=80',
             'desc' => 'Dilengkapi sound system premium, AC sentral, dan panggung utama.'],
            ['code' => 'A-102', 'gedung' => 'A', 'name' => 'Ruang Teater', 'building' => 'Gedung A', 'capacity' => 50,
             'img' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80',
             'desc' => 'Ruang teater dengan tempat duduk berundak dan proyektor 4K.'],
            ['code' => 'B-201', 'gedung' => 'B', 'name' => 'Lab Komputer 01', 'building' => 'Gedung B', 'capacity' => 40,
             'img' => 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?auto=format&fit=crop&w=400&q=80',
             'desc' => 'Lab komputer dengan 40 unit PC high-spec dan koneksi LAN Gigabit.'],
            ['code' => 'B-202', 'gedung' => 'B', 'name' => 'Lab Komputer 02', 'building' => 'Gedung B', 'capacity' => 40,
             'img' => 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?auto=format&fit=crop&w=400&q=80',
             'desc' => 'Lab komputer dengan 40 unit PC high-spec dan koneksi WiFi 6.'],
            ['code' => 'B-301', 'gedung' => 'B', 'name' => 'R. Seminar B', 'building' => 'Gedung B', 'capacity' => 80,
             'img' => 'https://images.unsplash.com/photo-1558008258-3256797b43f3?auto=format&fit=crop&w=400&q=80',
             'desc' => 'Ruang seminar kapasitas 80 orang dengan podium dan layar ganda.'],
            ['code' => 'C-101', 'gedung' => 'C', 'name' => 'R. Rapat Senat', 'building' => 'Gedung C', 'capacity' => 30,
             'img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=400&q=80',
             'desc' => 'Ruang rapat formal dengan meja U-shape dan sistem video conference.'],
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
                [10, 12, 'approved', 'Budi Santoso', 'Kelas Reguler'],
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
    @endphp

    <div id="calendarWrapper" class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-6">
        <div class="overflow-x-auto" id="calendarScroll">
            <div id="calendarInner" class="min-w-max">

                {{-- Header Ruangan --}}
                <div id="roomHeaders" class="flex border-b border-slate-200 bg-slate-50 sticky top-0 z-10">
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
                <div class="max-h-[560px] overflow-y-auto" id="calendarBody">
                    @foreach ($hours as $hour)
                        <div class="flex border-b border-slate-100 last:border-b-0">

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
                                @endphp

                                <div class="room-col flex-1 min-w-[160px] h-14 border-r border-slate-100 last:border-r-0 p-1"
                                     data-code="{{ $room['code'] }}" data-gedung="{{ $room['gedung'] }}">

                                    @if ($slotStatus === 'available')
                                        <button
                                            onclick="selectSlot(this, '{{ $room['code'] }}', {{ $hour }}, '{{ $room['name'] }}', '{{ $room['building'] }}', {{ $room['capacity'] }}, '{{ $room['img'] }}', '{{ $room['desc'] }}')"
                                            class="slot-btn w-full h-full rounded-lg bg-slate-100 hover:bg-blue-100 border border-dashed border-slate-200 hover:border-blue-300 transition-all flex items-center justify-center group cursor-pointer"
                                            data-room="{{ $room['code'] }}" data-hour="{{ $hour }}" data-status="available">
                                            <span class="material-symbols-outlined text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity">add_circle</span>
                                        </button>

                                    @elseif ($slotStatus === 'pending')
                                        <button
                                            onclick="showBookingInfo(this, '{{ $room['code'] }}', {{ $hour }}, '{{ $room['name'] }}', '{{ $room['building'] }}', {{ $room['capacity'] }}, '{{ $room['img'] }}', '{{ $room['desc'] }}', 'pending', '{{ $slotData[3] }}', '{{ $slotData[4] }}')"
                                            class="w-full h-full rounded-lg bg-amber-50 border border-amber-200 px-2 py-1 cursor-pointer hover:bg-amber-100 transition-all relative overflow-hidden">
                                            <div class="absolute left-0 top-0 bottom-0 w-1 rounded-l-lg bg-amber-400"></div>
                                            <div class="pl-2">
                                                <div class="flex items-center gap-1 mb-0.5">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 shrink-0"></span>
                                                    <span class="text-[9px] font-bold uppercase tracking-wider text-amber-800">Pending</span>
                                                </div>
                                                <p class="text-[10px] font-bold text-slate-600 truncate leading-tight">{{ $slotData[3] }}</p>
                                            </div>
                                        </button>

                                    @else
                                        <button
                                            onclick="showBookingInfo(this, '{{ $room['code'] }}', {{ $hour }}, '{{ $room['name'] }}', '{{ $room['building'] }}', {{ $room['capacity'] }}, '{{ $room['img'] }}', '{{ $room['desc'] }}', 'approved', '{{ $slotData[3] }}', '{{ $slotData[4] }}')"
                                            class="w-full h-full rounded-lg bg-emerald-50 border border-emerald-200 px-2 py-1 cursor-pointer hover:bg-emerald-100 transition-all relative overflow-hidden">
                                            <div class="absolute left-0 top-0 bottom-0 w-1 rounded-l-lg bg-emerald-500"></div>
                                            <div class="pl-2">
                                                <div class="flex items-center gap-1 mb-0.5">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                                    <span class="text-[9px] font-bold uppercase tracking-wider text-emerald-800">Terisi</span>
                                                </div>
                                                <p class="text-[10px] font-bold text-slate-600 truncate leading-tight">{{ $slotData[3] }}</p>
                                            </div>
                                        </button>
                                    @endif

                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        {{-- Footer --}}
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
            <p class="text-xs text-slate-500 font-medium" id="calendarFooterInfo">
                Menampilkan <span class="font-bold text-slate-700" id="roomCount">6</span> ruangan •
                <span id="footerDate">Sabtu, 24 Oktober 2026</span>
            </p>
            <p class="text-xs text-slate-400 italic">Klik slot abu-abu untuk memilih waktu peminjaman</p>
        </div>
    </div>

    {{-- Pop up Slot Terpilih --}}
    <div id="slotPopup" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-[#002045]/40 backdrop-blur-sm" onclick="closePopup(event)">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 overflow-hidden" onclick="event.stopPropagation()">

            {{-- Gambar Ruangan --}}
            <div class="relative h-48">
                <img id="popupImg" src="" alt="Ruangan" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#002045]/80 via-transparent to-transparent"></div>
                <button onclick="closePopupBtn()" class="absolute top-3 right-3 w-8 h-8 bg-white/20 hover:bg-white/40 rounded-full flex items-center justify-center text-white transition-colors backdrop-blur-sm">
                    <span class="material-symbols-outlined text-sm">close</span>
                </button>
                <div id="popupStatusBadge" class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider"></div>
                <div class="absolute bottom-4 left-4">
                    <h3 id="popupRoomName" class="text-lg font-bold text-white font-headline"></h3>
                    <p id="popupBuilding" class="text-xs text-white/80 mt-0.5"></p>
                </div>
            </div>

            {{-- Info --}}
            <div class="p-6">
                <div class="grid grid-cols-2 gap-4 mb-5">
                    <div class="bg-slate-50 rounded-lg p-3 border border-slate-100">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kapasitas</p>
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-slate-500 text-sm">group</span>
                            <p id="popupCapacity" class="text-sm font-bold text-slate-800"></p>
                        </div>
                    </div>
                    <div class="bg-slate-50 rounded-lg p-3 border border-slate-100">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widests mb-1">Waktu</p>
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-slate-500 text-sm">schedule</span>
                            <p id="popupTime" class="text-sm font-bold text-slate-800"></p>
                        </div>
                    </div>
                </div>

                <p id="popupDesc" class="text-xs text-slate-500 leading-relaxed mb-5"></p>

                {{-- Status: available --}}
                <div id="popupActionAvailable" class="hidden">
                    <p class="text-xs text-emerald-700 bg-emerald-50 border border-emerald-100 rounded-lg px-3 py-2 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">check_circle</span>
                        Slot ini tersedia — klik tombol di bawah untuk memilih
                    </p>
                    <div class="flex gap-3">
                        <button onclick="closePopupBtn()" class="flex-1 py-2.5 border border-slate-200 rounded-lg text-sm font-bold text-slate-600 hover:bg-slate-50">
                            Batal
                        </button>
                        <a id="popupSelectBtn" href="/user/ajukan-detail"
                           class="flex-1 py-2.5 bg-primary-gradient text-white rounded-lg text-sm font-bold text-center hover:opacity-95 flex items-center justify-center gap-2">
                            Pilih Slot Ini
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>

                {{-- Status: booked --}}
                <div id="popupActionBooked" class="hidden">
                    <div id="popupBookedInfo" class="bg-slate-50 border border-slate-200 rounded-lg p-4 mb-4">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widests mb-1">Dipesan oleh</p>
                        <p id="popupBooker" class="text-sm font-bold text-[#002045]"></p>
                        <p id="popupPurpose" class="text-xs text-slate-500 mt-0.5"></p>
                    </div>
                    <button onclick="closePopupBtn()" class="w-full py-2.5 border border-slate-200 rounded-lg text-sm font-bold text-slate-600 hover:bg-slate-50">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // === DATA ===
    const roomData = {
        @foreach ($rooms as $room)
        '{{ $room['code'] }}': {
            code: '{{ $room['code'] }}',
            gedung: '{{ $room['gedung'] }}',
            name: '{{ $room['name'] }}',
            building: '{{ $room['building'] }}',
            capacity: {{ $room['capacity'] }},
            img: '{{ $room['img'] }}',
            desc: '{{ $room['desc'] }}',
        },
        @endforeach
    };

    // === TANGGAL ===
    let currentDate = new Date('2026-10-24');
    const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    function formatDateLabel(d) {
        return `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
    }
    function formatDateShort(d) {
        return `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth().toString().padStart(2,'0')].substring(0,3)} ${d.getFullYear()}`;
    }
    function padDate(n) { return n.toString().padStart(2,'0'); }
    function toInputVal(d) {
        return `${d.getFullYear()}-${padDate(d.getMonth()+1)}-${padDate(d.getDate())}`;
    }

    function updateDateUI() {
        document.getElementById('currentDayLabel').textContent = formatDateShort(currentDate);
        document.getElementById('footerDate').textContent = formatDateLabel(currentDate);
        document.getElementById('filterTanggal').value = toInputVal(currentDate);
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

        // Update room count
        const visible = document.querySelectorAll('#roomHeaders .room-col:not([style*="display: none"])').length;
        document.getElementById('roomCount').textContent = visible;
    }

    // Sync gedung filter → ruangan filter options
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

    // === POPUP ===
    let selectedSlotEl = null;

    function openPopup() {
        document.getElementById('slotPopup').classList.remove('hidden');
        document.getElementById('slotPopup').classList.add('flex');
    }

    function closePopupBtn() {
        document.getElementById('slotPopup').classList.add('hidden');
        document.getElementById('slotPopup').classList.remove('flex');
    }

    function closePopup(e) {
        if (e.target === document.getElementById('slotPopup')) closePopupBtn();
    }

    function fillPopupBase(roomCode, hour, roomName, building, capacity, img, desc) {
        document.getElementById('popupImg').src = img;
        document.getElementById('popupRoomName').textContent = roomName;
        document.getElementById('popupBuilding').textContent = building;
        document.getElementById('popupCapacity').textContent = capacity + ' orang';
        document.getElementById('popupTime').textContent =
            `${String(hour).padStart(2,'0')}:00 – ${String(hour+1).padStart(2,'0')}:00`;
        document.getElementById('popupDesc').textContent = desc;
    }

    function selectSlot(el, roomCode, hour, roomName, building, capacity, img, desc) {
        // Reset previous selection
        if (selectedSlotEl) {
            selectedSlotEl.classList.remove('bg-blue-600', 'border-blue-700', '!text-white');
            selectedSlotEl.classList.add('bg-slate-100', 'border-slate-200');
        }
        // Highlight selected
        el.classList.remove('bg-slate-100', 'border-slate-200', 'hover:bg-blue-100', 'hover:border-blue-300');
        el.classList.add('bg-blue-600', 'border-blue-700');
        selectedSlotEl = el;

        fillPopupBase(roomCode, hour, roomName, building, capacity, img, desc);

        document.getElementById('popupStatusBadge').textContent = 'Tersedia';
        document.getElementById('popupStatusBadge').className = 'absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500 text-white';

        document.getElementById('popupActionAvailable').classList.remove('hidden');
        document.getElementById('popupActionBooked').classList.add('hidden');

        openPopup();
    }

    function showBookingInfo(el, roomCode, hour, roomName, building, capacity, img, desc, status, booker, purpose) {
        fillPopupBase(roomCode, hour, roomName, building, capacity, img, desc);

        if (status === 'pending') {
            document.getElementById('popupStatusBadge').textContent = 'Pending';
            document.getElementById('popupStatusBadge').className = 'absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-400 text-white';
        } else {
            document.getElementById('popupStatusBadge').textContent = 'Terisi';
            document.getElementById('popupStatusBadge').className = 'absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500 text-white';
        }

        document.getElementById('popupBooker').textContent = booker;
        document.getElementById('popupPurpose').textContent = purpose;

        document.getElementById('popupActionAvailable').classList.add('hidden');
        document.getElementById('popupActionBooked').classList.remove('hidden');

        openPopup();
    }

    // Init
    updateDateUI();
</script>
@endpush
