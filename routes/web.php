<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login-process', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'admin' && $password === 'admin123') {
        return redirect('/admin/dashboard');

    } elseif ($username === 'user' && $password === 'user123') {
        return redirect('/user/dashboard');

    } else {
        return back()->with('error', 'Username atau kata sandi salah!');
    }
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/register-success', function () {
    return view('auth.register-success');
});

Route::get('/forget-password', function () {
    return view('auth.forget-password');
});

Route::get('/forget-password-success', function () {
    return view('auth.forget-password-success');
});

// ==========================================
// ADMIN ROUTES
// ==========================================

// Dashboard Admin dengan data statistik
Route::get('/admin/dashboard', function () {
    $stats = [
        'total_ruangan' => 48,
        'ruangan_tersedia' => 32,
        'total_permohonan' => 12,
        'permohonan_pending' => 5,
        'total_disetujui' => 86,
        'persentase_disetujui' => '+14%',
        'total_ditolak' => 7,
        'persentase_ditolak' => '-3%',
    ];

    return view('admin.dashboard', compact('stats'));
});

Route::get('/admin/jadwal', function () {
    return view('admin.jadwal');
});

Route::get('/admin/ruangan', function () {
    return view('admin.ruangan');
});

Route::get('/admin/permohonan', function () {
    return view('admin.permohonan');
});

Route::get('/admin/detail-permohonan', function () {
    return view('admin.detail-permohonan');
});
Route::post('/admin/detail-permohonan', function () {
    // Ini adalah simulasi ketika admin menekan tombol "Kirim Penolakan" atau "Setujui"
    // Sistem akan mengembalikan admin ke halaman daftar permohonan
    return redirect('/admin/permohonan');
});

// Laporan Admin dengan data grafik
Route::get('/admin/laporan', function () {
    $bars = [
        ['label' => 'Lab Komp', 'height' => 40, 'value' => 42, 'active' => false],
        ['label' => 'Auditorium', 'height' => 75, 'value' => 86, 'active' => false],
        ['label' => 'R. Seminar', 'height' => 100, 'value' => 124, 'active' => true],
        ['label' => 'R. Kelas', 'height' => 55, 'value' => 64, 'active' => false],
        ['label' => 'R. Rapat', 'height' => 30, 'value' => 28, 'active' => false],
    ];

    return view('admin.laporan', compact('bars'));
});

Route::get('/admin/notifikasi', function () {
    return view('admin.notifikasi');
});

Route::get('/admin/users', function () {
    return view('admin.users');
});

Route::get('/admin/roles', function () {
    return view('admin.roles'); 
});

Route::get('/admin/roles/create', function () {
    return redirect('/admin/roles'); 
});

Route::get('/admin/roles/edit', function () {
    return redirect('/admin/roles'); 
});

Route::post('/admin/roles/create', function () {
    return redirect('/admin/roles'); 
});

Route::post('/admin/roles/edit', function () {
    return redirect('/admin/roles'); 
});


// ==========================================
// USER ROUTES
// ==========================================
Route::get('/admin/settings', function () {
    return view('admin.settings');
});

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
});

Route::get('/user/ajukan', function () {
    return view('user.ajukan');
});

Route::get('/user/ajukan-detail', function () {
    // Simulasi data fasilitas dari database (nantinya ini ditarik berdasarkan ID Ruangan yang dipilih)
    $fasilitas = [
        ['icon' => 'speaker', 'border_color' => 'border-blue-100', 'text_color' => 'text-blue-600', 'nama' => 'Sound System Premium'],
        ['icon' => 'ac_unit', 'border_color' => 'border-emerald-100', 'text_color' => 'text-emerald-600', 'nama' => 'AC Sentral'],
        ['icon' => 'podium', 'border_color' => 'border-purple-100', 'text_color' => 'text-purple-600', 'nama' => 'Panggung Utama'],
    ];

    return view('user.ajukan-detail', compact('fasilitas'));
});

Route::get('/user/ajukan-konfirmasi', function () {
    return view('user.ajukan-konfirmasi');
});

Route::get('/user/riwayat', function () {
    return view('user.riwayat');
});

Route::get('/user/riwayat-detail', function () {
    return view('user.riwayat-detail');
});

Route::get('/user/notifikasi', function () {
    return view('user.notifikasi');
});

Route::get('/user/profil', function () {
    return view('user.profil');
});