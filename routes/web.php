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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
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

Route::get('/admin/laporan', function () {
    return view('admin.laporan');
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
    return view('user.ajukan-detail');
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
