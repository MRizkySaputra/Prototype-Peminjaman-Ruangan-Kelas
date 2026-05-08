@extends('layouts.user')

@section('title', 'Ajukan Peminjaman')

@section('container_class', 'p-8 max-w-[1600px] mx-auto')

@section('content')

    {{-- Header & View Switcher --}}
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8">
        <div>
            <h2 class="text-3xl font-headline font-extrabold text-[#002045] mb-2">Ajukan Peminjaman</h2>
            <p class="text-slate-500 text-sm">Pilih ruangan dan waktu yang tersedia, lalu lanjutkan pengajuan.</p>
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
            <p id="sub-label" class="text-[10px] text-slate-400 uppercase font-bold tracking-[0.2em] mt-0.5">Tampilan Harian</p>
        </div>

        <button onclick="navigateDate(1)" class="p-2 bg-slate-50 hover:bg-slate-100 rounded-lg text-[#002045] transition-colors border border-slate-200 active:scale-95">
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
    </div>

    {{-- Filter Bar & Legenda (Satu Jajar di bawah Navigasi) --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 mb-6 flex flex-col xl:flex-row xl:items-center justify-between gap-4 transition-all">
        
        {{-- Legenda Selalu Tampil --}}
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

        {{-- Filter Inputs (Disembunyikan saat di View Bulanan) --}}
        <div id="filter-inputs" class="flex flex-wrap items-center gap-3 w-full xl:w-auto">
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
            
            {{-- Pilih Kapasitas --}}
            <div class="w-30">
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widests mb-2">Min. Kapasitas</label>
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg py-2.5 px-4">
                    <span class="material-symbols-outlined text-sm text-slate-400 mr-2">group</span>
                    <input class="w-full bg-transparent border-none p-0 focus:ring-0 text-sm font-medium outline-none" placeholder="10" type="number">
                </div>
            </div>
        </div>
    </div>

    @php
        $rooms = [
            ['code' => 'A-101', 'gedung' => 'A', 'name' => 'Auditorium Utama', 'building' => 'Gedung A', 'capacity' => 250, 'img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=400&q=80', 'desc' => 'Dilengkapi sound system premium, AC sentral, dan panggung utama.'],
            ['code' => 'A-102', 'gedung' => 'A', 'name' => 'Ruang Teater', 'building' => 'Gedung A', 'capacity' => 50, 'img' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=400&q=80', 'desc' => 'Ruang teater dengan tempat duduk berundak dan proyektor 4K.'],
            ['code' => 'B-201', 'gedung' => 'B', 'name' => 'Lab Komputer 01', 'building' => 'Gedung B', 'capacity' => 40, 'img' => 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?auto=format&fit=crop&w=400&q=80', 'desc' => 'Lab komputer dengan 40 unit PC high-spec dan koneksi LAN Gigabit.'],
            ['code' => 'B-202', 'gedung' => 'B', 'name' => 'Lab Komputer 02', 'building' => 'Gedung B', 'capacity' => 40, 'img' => 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?auto=format&fit=crop&w=400&q=80', 'desc' => 'Lab komputer dengan 40 unit PC high-spec dan koneksi WiFi 6.'],
            ['code' => 'B-301', 'gedung' => 'B', 'name' => 'R. Seminar B', 'building' => 'Gedung B', 'capacity' => 80, 'img' => 'https://images.unsplash.com/photo-1558008258-3256797b43f3?auto=format&fit=crop&w=400&q=80', 'desc' => 'Ruang seminar kapasitas 80 orang dengan podium dan layar ganda.'],
            ['code' => 'C-101', 'gedung' => 'C', 'name' => 'R. Rapat Senat', 'building' => 'Gedung C', 'capacity' => 30, 'img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=400&q=80', 'desc' => 'Ruang rapat formal dengan meja U-shape dan sistem video conference.'],
        ];

        $bookings = [
            'A-101' => [[8, 11, 'approved', 'Diana Lestari', 'Wisuda Gelombang II'], [13, 15, 'pending', 'BEM FT', 'Seminar Nasional']],
            'A-102' => [[9, 11, 'approved', 'Aditya Nugraha', 'Praktikum Algoritma'], [14, 16, 'pending', 'Siti Rahayu', 'Workshop Desain']],
            'B-201' => [[7, 9, 'approved', 'Rina Marlina', 'Praktikum Jaringan'], [10, 12, 'approved', 'Budi Santoso', 'Kelas Reguler']],
            'B-202' => [[13, 15, 'approved', 'Ahmad Fauzi', 'Pemrograman Web']],
            'B-301' => [],
            'C-101' => [[9, 10, 'pending', 'Bambang P.', 'Rapat Koordinasi']],
        ];

        $hours = range(7, 20);

        $statusConfig = [
            'available' => ['bg' => 'bg-slate-100', 'hover' => 'hover:bg-blue-100', 'text' => '', 'border' => 'border-slate-200', 'dot' => 'bg-slate-300', 'label' => ''],
            'pending'   => ['bg' => 'bg-amber-50',  'hover' => 'hover:bg-amber-100', 'text' => 'text-amber-800', 'border' => 'border-amber-200', 'dot' => 'bg-amber-400', 'label' => 'Pending'],
            'approved'  => ['bg' => 'bg-emerald-50','hover' => 'hover:bg-emerald-100','text' => 'text-emerald-800','border' => 'border-emerald-200', 'dot' => 'bg-emerald-500', 'label' => 'Terisi'],
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
                        {{-- Akan Di-Generate Oleh JavaScript --}}
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
                                    <div class="flex items-center justify-center gap-1 mt-1">
                                        <span class="material-symbols-outlined text-[12px] text-slate-400">group</span>
                                        <span class="text-[10px] text-slate-400 font-medium">{{ $room['capacity'] }} orang</span>
                                    </div>
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
                                                <button
                                                    onclick="selectSlot(this, '{{ $room['code'] }}', {{ $hour }}, '{{ $room['name'] }}', '{{ $room['building'] }}', {{ $room['capacity'] }}, '{{ $room['img'] }}', '{{ $room['desc'] }}')"
                                                    class="slot-btn w-full h-full min-h-[46px] rounded-lg bg-slate-50 hover:bg-blue-100 border border-dashed border-slate-200 hover:border-blue-300 transition-all flex items-center justify-center cursor-pointer"
                                                    data-room="{{ $room['code'] }}" data-hour="{{ $hour }}" data-status="available">
                                                    <span class="material-symbols-outlined text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity">add_circle</span>
                                                </button>
                                            @else
                                                <button
                                                    onclick="showBookingInfo('{{ $room['code'] }}', {{ $hour }}, '{{ $room['name'] }}', '{{ $room['building'] }}', {{ $room['capacity'] }}, '{{ $room['img'] }}', '{{ $room['desc'] }}', '{{ $slotStatus }}', '{{ $slotData[3] }}', '{{ $slotData[4] }}')"
                                                    class="w-full h-14 rounded-lg {{ $cfg['bg'] }} border {{ $cfg['border'] }} px-2 py-1 relative overflow-hidden group/item cursor-pointer text-left hover:opacity-80 transition-all">
                                                    <div class="absolute left-0 top-0 bottom-0 w-1 rounded-l-lg {{ $cfg['dot'] }}"></div>
                                                    <div class="pl-2">
                                                        <div class="flex items-center gap-1 mb-0.5">
                                                            <span class="w-1.5 h-1.5 rounded-full {{ $cfg['dot'] }} shrink-0"></span>
                                                            <span class="text-[9px] font-bold uppercase tracking-wider {{ $cfg['text'] }}">{{ $cfg['label'] }}</span>
                                                        </div>
                                                        <p class="text-[10px] font-bold text-slate-700 truncate leading-tight">{{ $slotData[4] }}</p>
                                                        <p class="text-[9px] text-slate-500 truncate">{{ $slotData[3] }}</p>
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
            </div>
        </div>

    </div>

    {{-- Footer Info --}}
    <div class="px-6 py-4 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-between mb-6 shadow-sm">
        <p class="text-xs text-slate-500 font-medium">
            Menampilkan <span class="font-bold text-slate-700" id="roomCount">{{ count($rooms) }}</span> ruangan •
            <span id="footerDate">Sabtu, 24 Oktober 2026</span>
        </p>
        <p class="text-xs text-slate-400 font-medium italic">Klik slot kosong (+) untuk memilih jadwal peminjaman</p>
    </div>

    {{-- Pop up Detail & Aksi Pengajuan (Sisi User) --}}
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

                {{-- Aksi Tersedia (Mulai Mengajukan) --}}
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

                {{-- Aksi Terisi (Hanya Lihat Info) --}}
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
    // Tab Default saat dimuat
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
                roomCode: roomCode, gedung: room ? room.gedung : '', roomName: room ? room.name : roomCode,
                startHour: b[0], endHour: b[1], status: b[2].trim(), title: b[4],
                dateStr: toInputVal(eventDate), dayIndex: dayOffset,
                booker: b[3], capacity: room ? room.capacity : 0, img: room ? room.img : '', desc: room ? room.desc : ''
            });
            dayCounter++;
        });
    }

    function formatDateLabel(d) { return `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`; }
    function padDate(n) { return n.toString().padStart(2,'0'); }
    function toInputVal(d) { return `${d.getFullYear()}-${padDate(d.getMonth()+1)}-${padDate(d.getDate())}`; }

    // --- Main UI Updater ---
    function updateDateUI() {
        document.getElementById('filterTanggal').value = toInputVal(currentDate);
        document.getElementById('footerDate').textContent = formatDateLabel(currentDate);

        const label = document.getElementById('current-label');
        const subLabel = document.getElementById('sub-label');

        if (currentView === 'bulanan') {
            label.innerText = `${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
            subLabel.innerText = "Tampilan Bulanan";
        } else if (currentView === 'mingguan') {
            const startOfWeek = new Date(currentDate);
            let dayIndex = startOfWeek.getDay() || 7; 
            startOfWeek.setDate(startOfWeek.getDate() - dayIndex + 1); 
            
            const endOfWeek = new Date(startOfWeek);
            endOfWeek.setDate(startOfWeek.getDate() + 6); 

            label.innerText = `${startOfWeek.getDate()} - ${endOfWeek.getDate()} ${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
            subLabel.innerText = "Tampilan Mingguan";
        } else {
            label.innerText = formatDateLabel(currentDate);
            subLabel.innerText = "Tampilan Harian";
        }
    }

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

    function navigateDate(step) {
        if (currentView === 'bulanan') { currentDate.setMonth(currentDate.getMonth() + step); renderMonthlyCalendar(); } 
        else if (currentView === 'mingguan') { currentDate.setDate(currentDate.getDate() + (step * 7)); renderWeeklyCalendar(); } 
        else { currentDate.setDate(currentDate.getDate() + step); }
        updateDateUI();
    }

    document.getElementById('filterTanggal').addEventListener('change', function() {
        currentDate = new Date(this.value + 'T00:00:00');
        updateDateUI();
        if(currentView === 'bulanan') renderMonthlyCalendar();
        if(currentView === 'mingguan') renderWeeklyCalendar();
    });

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

        const filterInputs = document.getElementById('filter-inputs');
        if (view === 'bulanan') {
            filterInputs.classList.add('hidden'); filterInputs.classList.remove('flex');
        } else {
            filterInputs.classList.remove('hidden'); filterInputs.classList.add('flex');
        }

        updateDateUI();
        if(view === 'bulanan') renderMonthlyCalendar();
        if(view === 'mingguan') renderWeeklyCalendar();
        applyFilter(); 
    }

    // --- Render Mingguan ---
    function renderWeeklyCalendar() {
        const container = document.getElementById('view-mingguan-inner');
        const startOfWeek = new Date(currentDate);
        let currentDayIndex = startOfWeek.getDay() || 7; 
        startOfWeek.setDate(startOfWeek.getDate() - currentDayIndex + 1);

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

        for(let h=7; h<=20; h++) {
            html += `<div class="flex border-b border-slate-100 last:border-b-0 h-14 w-full">
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

        document.querySelectorAll('#view-harian .room-col').forEach(col => {
            const code = col.dataset.code; const gedung = col.dataset.gedung;
            let show = true;
            if (gedungFilter && gedung !== gedungFilter) show = false;
            if (ruanganFilter && code !== ruanganFilter) show = false;
            col.style.display = show ? '' : 'none';
        });

        document.querySelectorAll('.weekly-event-item, .monthly-event-item').forEach(el => {
            const code = el.dataset.code; const gedung = el.dataset.gedung;
            let show = true;
            if (gedungFilter && gedung !== gedungFilter) show = false;
            if (ruanganFilter && code !== ruanganFilter) show = false;
            el.style.display = show ? '' : 'none';
        });

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

    // === POPUP LOGIC ===
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
        document.getElementById('popupImg').src = img || 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=400&q=80';
        document.getElementById('popupRoomName').textContent = roomName;
        document.getElementById('popupBuilding').textContent = 'Gedung ' + building;
        document.getElementById('popupCapacity').textContent = capacity + ' orang';
        document.getElementById('popupTime').textContent = `${String(hour).padStart(2,'0')}:00 – ${String(hour+1).padStart(2,'0')}:00`;
        document.getElementById('popupDesc').textContent = desc || 'Fasilitas standar tersedia.';
    }

    function selectSlot(el, roomCode, hour, roomName, building, capacity, img, desc) {
        if (selectedSlotEl) {
            selectedSlotEl.classList.remove('bg-blue-100', 'border-blue-300');
            selectedSlotEl.classList.add('bg-slate-50', 'border-slate-200');
        }
        el.classList.remove('bg-slate-50', 'border-slate-200');
        el.classList.add('bg-blue-100', 'border-blue-300');
        selectedSlotEl = el;

        fillPopupBase(roomCode, hour, roomName, building, capacity, img, desc);

        document.getElementById('popupStatusBadge').textContent = 'Tersedia';
        document.getElementById('popupStatusBadge').className = 'absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500 text-white';

        document.getElementById('popupActionAvailable').classList.remove('hidden');
        document.getElementById('popupActionBooked').classList.add('hidden');
        openPopup();
    }

    function showBookingInfo(roomCode, hour, roomName, building, capacity, img, desc, status, booker, purpose) {
        fillPopupBase(roomCode, hour, roomName, building, capacity, img, desc);

        if (status === 'pending') {
            document.getElementById('popupStatusBadge').textContent = 'Pending';
            document.getElementById('popupStatusBadge').className = 'absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-400 text-white';
        } else {
            document.getElementById('popupStatusBadge').textContent = 'Terisi';
            document.getElementById('popupStatusBadge').className = 'absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500 text-white';
        }

        document.getElementById('popupBooker').textContent = booker || 'Anonim';
        document.getElementById('popupPurpose').textContent = purpose || '-';

        document.getElementById('popupActionAvailable').classList.add('hidden');
        document.getElementById('popupActionBooked').classList.remove('hidden');
        openPopup();
    }

    // Init
    switchView('bulanan');
</script>
@endpush