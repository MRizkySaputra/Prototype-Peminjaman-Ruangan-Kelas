@extends('layouts.admin')

@section('title', 'Jadwal Ruangan')

@section('content')

    {{-- Header & View Switcher --}}
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8">
        <div>
            <h2 class="text-3xl font-headline font-extrabold text-[#002045] mb-2">Jadwal Ruangan</h2>
            <p class="text-slate-500 text-sm">Daftar jadwal peminjaman ruangan yang sedang berlangsung.</p>
        </div>

        {{-- Tabs Switcher (Dibalik: Bulan -> Minggu -> Hari) --}}
        <div class="flex items-center bg-slate-100 p-1 rounded-lg w-full sm:w-auto shadow-inner">
            <button id="btn-bulanan" onclick="switchView('bulanan')" class="flex-1 sm:flex-none px-6 py-2 rounded-md text-sm font-bold transition-all bg-[#002045] text-white shadow-sm">
                Bulanan
            </button>
            <button id="btn-mingguan" onclick="switchView('mingguan')" class="flex-1 sm:flex-none px-6 py-2 rounded-md text-sm font-bold text-slate-500 hover:text-[#002045] transition-all">
                Mingguan
            </button>
            <button id="btn-harian" onclick="switchView('harian')" class="flex-1 sm:flex-none px-6 py-2 rounded-md text-sm font-bold text-slate-500 hover:text-[#002045] transition-all">
                Harian
            </button>
        </div>
    </div>

    {{-- Navigasi Tanggal Dinamis (< >) --}}
    <div class="flex items-center justify-between bg-white p-4 rounded-xl shadow-sm border border-slate-200 mb-6">
        <button onclick="navigateDate(-1)" class="p-2 bg-slate-50 hover:bg-slate-100 rounded-lg text-[#002045] transition-colors border border-slate-200 active:scale-95">
            <span class="material-symbols-outlined">chevron_left</span>
        </button>
        
        <div class="text-center">
            <h3 id="current-label" class="text-lg font-extrabold text-[#002045] transition-all">Sabtu, 24 Oktober 2026</h3>
        </div>

        <button onclick="navigateDate(1)" class="p-2 bg-slate-50 hover:bg-slate-100 rounded-lg text-[#002045] transition-colors border border-slate-200 active:scale-95">
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
    </div>

    {{-- Filter Bar & Legenda --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 mb-6 flex flex-col xl:flex-row xl:items-center justify-between gap-4 transition-all">
        
        {{-- Legenda Selalu Tampil --}}
        <div class="flex flex-wrap items-center gap-4 px-2 shrink-0">
            <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-full bg-slate-300"></div><span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Kosong</span></div>
            <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-full bg-amber-400"></div><span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Pending</span></div>
            <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-full bg-emerald-500"></div><span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Disetujui</span></div>
            <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-full bg-red-400"></div><span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Ditolak</span></div>
        </div>

        {{-- Filter Inputs (Disembunyikan saat di View Bulanan) --}}
        <div id="filter-inputs" class="flex flex-wrap items-center gap-3 w-full xl:w-auto">
            <select id="filterGedung" onchange="applyFilter()" class="flex-1 min-w-[120px] bg-slate-50 border border-slate-200 rounded-lg py-2 px-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                <option value="">Semua Gedung</option>
                <option value="A">Gedung A</option>
                <option value="B">Gedung B</option>
                <option value="C">Gedung C</option>
            </select>
            <select id="filterRuangan" onchange="applyFilter()" class="flex-1 min-w-[140px] bg-slate-50 border border-slate-200 rounded-lg py-2 px-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                <option value="">Semua Ruangan</option>
                <option value="A-101" data-gedung="A">Auditorium Utama</option>
                <option value="A-102" data-gedung="A">Ruang Teater</option>
                <option value="B-201" data-gedung="B">Lab Komputer 01</option>
                <option value="B-202" data-gedung="B">Lab Komputer 02</option>
                <option value="B-301" data-gedung="B">R. Seminar B</option>
                <option value="C-101" data-gedung="C">R. Rapat Senat</option>
            </select>
            <input id="filterTanggal" class="flex-1 min-w-[130px] bg-slate-50 border border-slate-200 rounded-lg py-2 px-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none" type="date" value="2026-10-24">
            <select class="flex-1 min-w-[120px] bg-slate-50 border border-slate-200 rounded-lg py-2 px-3 text-sm font-medium focus:ring-2 focus:ring-[#002045]/20 outline-none">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="approved">Disetujui</option>
                <option value="rejected">Ditolak</option>
            </select>
        </div>
    </div>

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
            'A-101' => [[8, 11, 'approved', 'Diana Lestari', 'Wisuda Gelombang II'], [13, 15, 'pending', 'BEM FT', 'Seminar Nasional']],
            'A-102' => [[9, 11, 'approved', 'Aditya Nugraha', 'Praktikum Algoritma'], [14, 16, 'pending', 'Siti Rahayu', 'Workshop Desain']],
            'B-201' => [[7, 9, 'approved', 'Rina Marlina', 'Praktikum Jaringan'], [10, 12, 'rejected', 'Budi Santoso', 'Ujian Susulan']],
            'B-202' => [[13, 15, 'approved', 'Ahmad Fauzi', 'Pemrograman Web']],
            'B-301' => [],
            'C-101' => [[9, 10, 'pending', 'Bambang P.', 'Rapat Koordinasi']],
        ];

        $hours = range(7, 20);

        $statusConfig = [
            'available' => ['bg' => 'bg-slate-100', 'hover' => 'hover:bg-slate-200', 'text' => '', 'border' => 'border-slate-200', 'dot' => 'bg-slate-300', 'label' => ''],
            'pending'   => ['bg' => 'bg-amber-50',  'hover' => 'hover:bg-amber-100', 'text' => 'text-amber-800', 'border' => 'border-amber-200', 'dot' => 'bg-amber-400', 'label' => 'Pending'],
            'approved'  => ['bg' => 'bg-emerald-50','hover' => 'hover:bg-emerald-100','text' => 'text-emerald-800','border' => 'border-emerald-200', 'dot' => 'bg-emerald-500', 'label' => 'Disetujui'],
            'rejected'  => ['bg' => 'bg-red-50',    'hover' => 'hover:bg-red-100',   'text' => 'text-red-800',   'border' => 'border-red-200', 'dot' => 'bg-red-400', 'label' => 'Ditolak'],
        ];
    @endphp

    <div class="relative">
        {{-- VIEW BULANAN --}}
        <div id="view-bulanan" class="transition-all duration-300">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-6">
                <div class="grid grid-cols-7 border-b border-slate-200 bg-slate-50">
                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                    <div class="p-3 text-center border-r border-slate-200 last:border-0">
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $day }}</span>
                    </div>
                    @endforeach
                </div>
                <div id="calendar-grid" class="grid grid-cols-7">
                    {{-- Grid di-generate via JavaScript --}}
                </div>
            </div>
        </div>

        {{-- VIEW MINGGUAN --}}
        <div id="view-mingguan" class="hidden transition-all duration-300">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-6">
                <div class="overflow-x-hidden">
                    <div id="view-mingguan-inner" class="w-full relative bg-white">
                        {{-- Akan Di-Generate Oleh JavaScript agar Strukturnya Persis View Harian tanpa overflow X --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- VIEW HARIAN --}}
        <div id="view-harian" class="hidden transition-all duration-300">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-6">
                <div class="overflow-x-auto" id="calendarScroll">
                    <div id="calendarInner" class="min-w-max">

                        {{-- Header Ruangan --}}
                        <div class="flex border-b border-slate-200 bg-slate-50 sticky top-0 z-20 shadow-sm">
                            <div class="w-20 shrink-0 px-3 py-4 border-r border-slate-200 bg-slate-50 flex items-center justify-center">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widests">Jam</span>
                            </div>
                            @foreach ($rooms as $room)
                                <div class="room-col flex-1 min-w-[160px] px-3 py-3 border-r border-slate-200 last:border-r-0 bg-slate-50 text-center"
                                     data-code="{{ $room['code'] }}" data-gedung="{{ $room['gedung'] }}">
                                    <p class="text-xs font-extrabold text-[#002045] truncate">{{ $room['name'] }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium mt-0.5">{{ $room['building'] }} • {{ $room['code'] }}</p>
                                </div>
                            @endforeach
                        </div>

                        {{-- Baris Per Jam --}}
                        <div class="max-h-[600px] overflow-y-auto bg-slate-50">
                            @foreach ($hours as $hour)
                                <div class="flex border-b border-slate-100 last:border-b-0 hover:bg-slate-50/30 transition-colors h-auto min-h-[56px]">

                                    <div class="w-20 shrink-0 px-3 border-r border-slate-200 flex items-center justify-end bg-white">
                                        <span class="text-[11px] font-bold text-slate-400">
                                            {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00
                                        </span>
                                    </div>

                                    @foreach ($rooms as $room)
                                        @php
                                            $slotStatus = 'available'; $slotData = null;
                                            foreach ($bookings[$room['code']] ?? [] as $booking) {
                                                if ($hour >= $booking[0] && $hour < $booking[1]) {
                                                    $slotStatus = trim($booking[2]); 
                                                    $slotData = $booking;
                                                    break;
                                                }
                                            }
                                            $cfg = $statusConfig[$slotStatus] ?? $statusConfig['available'];
                                        @endphp

                                        <div class="room-col flex-1 min-w-[160px] border-r border-slate-100 last:border-r-0 p-1 group relative bg-white"
                                             data-code="{{ $room['code'] }}" data-gedung="{{ $room['gedung'] }}">

                                            @if ($slotStatus === 'available')
                                                <button onclick="openNewBookingModal('{{ $room['code'] }}', {{ $hour }}, '{{ $room['name'] }}')"
                                                        class="w-full h-full min-h-[46px] rounded-lg {{ $cfg['bg'] }} {{ $cfg['hover'] }} border border-transparent hover:border-slate-200 border-dashed transition-all flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer z-10 relative">
                                                    <span class="material-symbols-outlined text-slate-400 text-sm">add</span>
                                                </button>
                                                <div class="absolute inset-1 rounded-lg {{ $cfg['bg'] }} border border-dashed {{ $cfg['border'] }} group-hover:opacity-0 transition-all pointer-events-none"></div>
                                            @else
                                                <div class="w-full h-14 rounded-lg {{ $cfg['bg'] }} border {{ $cfg['border'] }} px-2 py-1 relative overflow-hidden group/item">
                                                    <div class="absolute left-0 top-0 bottom-0 w-1 rounded-l-lg {{ $cfg['dot'] }}"></div>
                                                    <div class="pl-2">
                                                        <div class="flex items-center gap-1 mb-0.5">
                                                            <span class="w-1.5 h-1.5 rounded-full {{ $cfg['dot'] }} shrink-0"></span>
                                                            <span class="text-[9px] font-bold uppercase tracking-wider {{ $cfg['text'] }}">{{ $cfg['label'] }}</span>
                                                        </div>
                                                        @if ($slotData)
                                                            <p class="text-[10px] font-bold text-slate-700 truncate leading-tight">{{ $slotData[4] }}</p>
                                                            <p class="text-[9px] text-slate-500 truncate">{{ $slotData[3] }}</p>
                                                        @endif
                                                    </div>

                                                    <div class="absolute inset-0 bg-white/95 rounded-lg border {{ $cfg['border'] }} opacity-0 group-hover/item:opacity-100 transition-all flex items-center justify-center gap-1.5 z-10">
                                                        <a href="/admin/detail-permohonan" class="p-1.5 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded transition-all" title="Lihat Detail">
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
            </div>
        </div>

    </div>

    {{-- Footer Info --}}
    <div class="px-6 py-4 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-between mb-6 shadow-sm">
        <p class="text-xs text-slate-500 font-medium">
            Menampilkan <span class="font-bold text-slate-700" id="roomCount">{{ count($rooms) }}</span> ruangan •
            <span id="footerDate">Sabtu, 24 Oktober 2026</span>
        </p>
        <p class="text-xs text-slate-400 font-medium italic">Hover slot untuk aksi cepat</p>
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
                    <label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Ruangan</label>
                    <select id="bookingRoom" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">
                        @foreach ($rooms as $r)<option value="{{ $r['code'] }}">{{ $r['name'] }} ({{ $r['building'] }})</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Nama Peminjam</label><input type="text" placeholder="Nama lengkap" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"></div>
                <div class="grid grid-cols-2 gap-4">
                    <div><label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Tanggal</label><input id="bookingDate" type="date" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"></div>
                    <div><label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Waktu Mulai</label><select id="bookingHour" class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none">@foreach(range(7, 19) as $h)<option value="{{ $h }}">{{ str_pad($h, 2, '0', STR_PAD_LEFT) }}:00</option>@endforeach</select></div>
                </div>
                <div><label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Durasi</label><select class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"><option>1 Jam</option><option>2 Jam</option><option>3 Jam</option><option>4 Jam</option></select></div>
                <div><label class="block text-[11px] font-bold uppercase tracking-widests text-slate-500 mb-2">Keperluan</label><textarea rows="2" placeholder="Deskripsi kegiatan..." class="w-full bg-white border border-slate-200 rounded-lg p-3.5 text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none resize-none"></textarea></div>
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
    // Inisialisasi: Bulanan jadi default
    let currentView = 'bulanan'; 
    let currentDate = new Date('2026-10-24T00:00:00');

    const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    // Mengambil data PHP ke JS untuk diolah secara dinamis
    const roomsData = @json($rooms);
    const bookingsData = @json($bookings);
    const statusConfig = @json($statusConfig);

    // Membangun daftar event dinamis untuk Mingguan & Bulanan
    const allEvents = [];
    let dayCounter = 0; 
    for (const [roomCode, bList] of Object.entries(bookingsData)) {
        let room = roomsData.find(r => r.code === roomCode);
        bList.forEach(b => {
            let dayOffset = dayCounter % 6; 
            let eventDate = new Date(2026, 9, 19 + dayOffset); 
            
            allEvents.push({
                roomCode: roomCode,
                gedung: room ? room.gedung : '',
                roomName: room ? room.name : roomCode,
                startHour: b[0], endHour: b[1],
                status: b[2].trim(), title: b[4],
                dateStr: toInputVal(eventDate),
                dayIndex: dayOffset
            });
            dayCounter++;
        });
    }

    // --- Format Helpers ---
    function formatDateLabel(d) { return `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`; }
    function padDate(n) { return n.toString().padStart(2,'0'); }
    function toInputVal(d) { return `${d.getFullYear()}-${padDate(d.getMonth()+1)}-${padDate(d.getDate())}`; }

    // --- Main UI Updater ---
    function updateDateUI() {
        document.getElementById('filterTanggal').value = toInputVal(currentDate);
        document.getElementById('footerDate').textContent = formatDateLabel(currentDate);

        const label = document.getElementById('current-label');

        if (currentView === 'bulanan') {
            label.innerText = `${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
        } else if (currentView === 'mingguan') {
            const startOfWeek = new Date(currentDate);
            let dayIndex = startOfWeek.getDay() || 7; 
            startOfWeek.setDate(startOfWeek.getDate() - dayIndex + 1); 
            
            const endOfWeek = new Date(startOfWeek);
            endOfWeek.setDate(startOfWeek.getDate() + 6); 

            label.innerText = `${startOfWeek.getDate()} - ${endOfWeek.getDate()} ${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
        } else {
            label.innerText = formatDateLabel(currentDate);
        }
    }

    // --- Jump Functions (Klik Hari -> Langsung Harian) ---
    function jumpToDate(y, m, d) {
        currentDate = new Date(y, m, d, 0, 0, 0);
        switchView('harian');
        window.scrollTo({ top: 150, behavior: 'smooth' }); 
    }

    function jumpToWeeklyDay(dayIndex) { 
        let d = new Date(currentDate);
        let currentDay = d.getDay() || 7; 
        d.setDate(d.getDate() - currentDay + 1 + dayIndex); 
        jumpToDate(d.getFullYear(), d.getMonth(), d.getDate());
    }

    // --- Navigation Logic (< >) ---
    function navigateDate(step) {
        if (currentView === 'bulanan') {
            currentDate.setMonth(currentDate.getMonth() + step);
            renderMonthlyCalendar();
        } else if (currentView === 'mingguan') {
            currentDate.setDate(currentDate.getDate() + (step * 7));
            renderWeeklyCalendar();
        } else {
            currentDate.setDate(currentDate.getDate() + step);
        }
        updateDateUI();
    }

    document.getElementById('filterTanggal').addEventListener('change', function() {
        currentDate = new Date(this.value + 'T00:00:00');
        updateDateUI();
        if(currentView === 'bulanan') renderMonthlyCalendar();
        if(currentView === 'mingguan') renderWeeklyCalendar();
    });

    // --- Tab Switcher Logic ---
    function switchView(view) {
        currentView = view;
        ['bulanan', 'mingguan', 'harian'].forEach(v => {
            const btn = document.getElementById(`btn-${v}`);
            const pane = document.getElementById(`view-${v}`);
            if (v === view) {
                btn.className = 'flex-1 sm:flex-none px-6 py-2 rounded-md text-sm font-bold transition-all bg-[#002045] text-white shadow-sm';
                pane.classList.remove('hidden');
            } else {
                btn.className = 'flex-1 sm:flex-none px-6 py-2 rounded-md text-sm font-bold text-slate-500 hover:text-[#002045] transition-all';
                pane.classList.add('hidden');
            }
        });

        // Hide filter input dropdowns di view bulanan
        const filterInputs = document.getElementById('filter-inputs');
        if (view === 'bulanan') {
            filterInputs.classList.add('hidden');
            filterInputs.classList.remove('flex');
        } else {
            filterInputs.classList.remove('hidden');
            filterInputs.classList.add('flex');
        }

        updateDateUI();
        if(view === 'bulanan') renderMonthlyCalendar();
        if(view === 'mingguan') renderWeeklyCalendar();
        applyFilter(); 
    }

    // --- Render Mingguan  ---
    function renderWeeklyCalendar() {
        const container = document.getElementById('view-mingguan-inner');
        const startOfWeek = new Date(currentDate);
        let currentDayIndex = startOfWeek.getDay() || 7; 
        startOfWeek.setDate(startOfWeek.getDate() - currentDayIndex + 1);

        // Header Mingguan
        let html = `<div class="w-full">
            <div class="flex border-b border-slate-200 bg-slate-50 sticky top-0 z-20 shadow-sm w-full">
                <div class="w-[60px] md:w-20 shrink-0 px-1 py-4 border-r border-slate-200 bg-slate-50 flex items-center justify-center">
                    <span class="text-[9px] md:text-[10px] font-bold text-slate-400 uppercase tracking-widests">Jam</span>
                </div>`;
        
        for(let i=0; i<7; i++) {
            let d = new Date(startOfWeek); d.setDate(d.getDate() + i);
            html += `
                <div class="flex-1 w-0 px-1 lg:px-3 py-3 border-r border-slate-200 last:border-r-0 bg-slate-50 text-center cursor-pointer hover:bg-slate-200 transition-colors" onclick="jumpToWeeklyDay(${i})">
                    <p class="text-[9px] md:text-xs font-extrabold text-[#002045] hover:underline truncate">${days[d.getDay() === 0 ? 0 : d.getDay()]}</p>
                    <p class="text-[8px] md:text-[10px] text-slate-400 font-medium mt-0.5">${d.getDate()} ${months[d.getMonth()].substring(0,3)}</p>
                </div>`;
        }
        
        html += `</div><div class="max-h-[600px] overflow-y-auto relative bg-slate-50 w-full">`;

        // Baris Jam
        for(let h=7; h<=20; h++) {
            html += `<div class="flex border-b border-slate-100 last:border-b-0 hover:bg-slate-50/30 transition-colors h-auto min-h-[56px] w-full">
                        <div class="w-[60px] md:w-20 shrink-0 px-1 border-r border-slate-200 flex items-center justify-center bg-white">
                            <span class="text-[9px] md:text-[11px] font-bold text-slate-400">${padDate(h)}:00</span>
                        </div>`;
            
            for(let d=0; d<7; d++) {
                let colDate = new Date(startOfWeek); colDate.setDate(colDate.getDate() + d);
                let colDateStr = toInputVal(colDate);
                let dayEvents = allEvents.filter(e => e.dateStr === colDateStr && h >= e.startHour && h < e.endHour);

                html += `<div class="flex-1 w-0 border-r border-slate-100 last:border-r-0 p-1 bg-white relative group cursor-pointer hover:bg-slate-50 transition-colors" onclick="jumpToWeeklyDay(${d})">`;

                if(dayEvents.length > 0) {
                    html += `<div class="flex flex-col gap-1 w-full h-full">`;
                    dayEvents.forEach(e => {
                        let cfg = statusConfig[e.status] || statusConfig['pending'];
                        html += `
                            <div class="weekly-event-item w-full min-h-[46px] h-full rounded-lg ${cfg.bg} border ${cfg.border} px-1.5 md:px-2 py-1 relative overflow-hidden group/item cursor-pointer hover:opacity-80"
                                 data-code="${e.roomCode}" data-gedung="${e.gedung}" 
                                 onclick="showBookingInfo('${e.roomCode}', ${h}, '${e.roomName}', '${e.gedung}', ${e.capacity}, '${e.img}', '${e.desc}', '${e.status}', '${e.booker}', '${e.title}'); event.stopPropagation();">
                                <div class="absolute left-0 top-0 bottom-0 w-1 rounded-l-lg ${cfg.dot}"></div>
                                <div class="pl-1.5 md:pl-2">
                                    <div class="flex items-center gap-1 mb-0.5">
                                        <span class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full ${cfg.dot} shrink-0"></span>
                                        <span class="text-[7px] md:text-[9px] font-bold uppercase tracking-wider ${cfg.text} truncate">${cfg.label}</span>
                                    </div>
                                    <p class="text-[8px] md:text-[10px] font-bold text-slate-700 truncate leading-tight">${e.title}</p>
                                    <p class="text-[7px] md:text-[9px] text-slate-500 truncate">${e.roomName}</p>
                                </div>
                            </div>
                        `;
                    });
                    html += `</div>`;
                }
                html += `</div>`;
            }
            html += `</div>`;
        }
        
        html += `</div></div>`;
        container.innerHTML = html;
        applyFilter(); 
    }

    // --- Render Bulanan ---
    function renderMonthlyCalendar() {
        const grid = document.getElementById('calendar-grid'); grid.innerHTML = '';
        let startOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        let startDay = startOfMonth.getDay() || 7; 
        let daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
        
        let dateCounter = 1;
        for (let i = 1; i <= 35; i++) {
            let isCurrentMonth = (i >= startDay && dateCounter <= daysInMonth);
            let actualDate = isCurrentMonth ? dateCounter++ : '';
            let dateStr = isCurrentMonth ? toInputVal(new Date(currentDate.getFullYear(), currentDate.getMonth(), actualDate)) : '';
            let isToday = (dateStr === toInputVal(new Date(2026, 9, 24))); 

            let div = document.createElement('div');
            div.className = `min-h-[120px] p-2 border-b border-r border-slate-100 transition-all ${isCurrentMonth ? 'hover:bg-slate-50 cursor-pointer bg-white' : 'bg-slate-50/50'} ${i % 7 === 0 ? 'border-r-0' : ''}`;
            if (isCurrentMonth) div.setAttribute('onclick', `jumpToDate(${currentDate.getFullYear()}, ${currentDate.getMonth()}, ${actualDate})`);

            let html = '';
            if (actualDate) {
                html += `<span class="w-6 h-6 flex items-center justify-center rounded-full text-xs font-bold ${isToday ? 'bg-[#002045] text-white shadow-md' : 'text-slate-500'} mb-2">${actualDate}</span>`;
                let dayEvents = allEvents.filter(e => e.dateStr === dateStr);
                dayEvents.forEach(e => {
                    let cfg = statusConfig[e.status] || statusConfig['pending'];
                    html += `<div class="monthly-event-item px-2 py-1 ${cfg.bg} ${cfg.text} text-[9px] font-bold rounded mb-1 truncate cursor-pointer hover:opacity-80 transition-opacity" 
                                  title="${e.title}" data-code="${e.roomCode}" data-gedung="${e.gedung}">
                                ${padDate(e.startHour)}:00 - ${e.title}
                             </div>`;
                });
            }
            div.innerHTML = html; grid.appendChild(div);
        }
    }

    // --- Filter Logic ---
    function applyFilter() {
        const gedungFilter = document.getElementById('filterGedung').value;
        const ruanganFilter = document.getElementById('filterRuangan').value;

        // Filter Harian 
        document.querySelectorAll('#view-harian .room-col').forEach(col => {
            const code = col.dataset.code; const gedung = col.dataset.gedung;
            let show = true;
            if (gedungFilter && gedung !== gedungFilter) show = false;
            if (ruanganFilter && code !== ruanganFilter) show = false;
            col.style.display = show ? '' : 'none';
        });

        // Filter Mingguan & Bulanan
        document.querySelectorAll('.weekly-event-item, .monthly-event-item').forEach(el => {
            const code = el.dataset.code; const gedung = el.dataset.gedung;
            let show = true;
            if (gedungFilter && gedung !== gedungFilter) show = false;
            if (ruanganFilter && code !== ruanganFilter) show = false;
            el.style.display = show ? '' : 'none';
        });

        // Update Counter (Hanya dihitung yang terlihat di Harian)
        const visibleCols = document.querySelectorAll('#view-harian #calendarInner .room-col[data-code]:not([style*="display: none"])');
        document.getElementById('roomCount').textContent = Math.round(visibleCols.length / ({{ count($hours) }} + 1));
    }

    document.getElementById('filterGedung').addEventListener('change', function() {
        const val = this.value; const ruanganSel = document.getElementById('filterRuangan'); ruanganSel.value = '';
        Array.from(ruanganSel.options).forEach(opt => {
            if (!opt.value) return;
            opt.style.display = (!val || opt.dataset.gedung === val) ? '' : 'none';
        });
        applyFilter();
    });

    // --- Modal Handlers ---
    function openNewBookingModal(roomCode, hour, roomName) {
        const modal = document.getElementById('newBookingModal');
        modal.classList.remove('hidden'); modal.classList.add('flex');
        if (roomCode) document.getElementById('bookingRoom').value = roomCode;
        if (hour !== undefined) document.getElementById('bookingHour').value = hour;
    }
    function closeNewBookingModal() {
        const modal = document.getElementById('newBookingModal');
        modal.classList.add('hidden'); modal.classList.remove('flex');
    }
    document.getElementById('newBookingModal').addEventListener('click', function(e) { if (e.target === this) closeNewBookingModal(); });

    // Inisialisasi awal UI
    switchView('bulanan');
</script>
@endpush