<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home.index'));
});

// User
Breadcrumbs::for('user.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Pengguna', route('user.index'));
});

Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('user.index');
    $trail->push('Tambah Pengguna', route('user.create'));
});

Breadcrumbs::for('user.edit', function ($trail, $user) {
    $trail->parent('user.index', $user);
    $trail->push('Ubah Pengguna', route('user.edit', $user));
});

// User Level
Breadcrumbs::for('user_level.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Level Pengguna', route('user_level.index'));
});

Breadcrumbs::for('user_level.create', function ($trail) {
    $trail->parent('user_level.index');
    $trail->push('Tambah Level Pengguna', route('user_level.create'));
});

Breadcrumbs::for('user_level.edit', function ($trail, $user_level) {
    $trail->parent('user_level.index', $user_level);
    $trail->push('Ubah Level Pengguna', route('user_level.edit', $user_level));
});

// Slider
Breadcrumbs::for('slider.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Slider', route('slider.index'));
});

Breadcrumbs::for('slider.create', function ($trail) {
    $trail->parent('slider.index');
    $trail->push('Tambah Slider', route('slider.create'));
});

Breadcrumbs::for('slider.edit', function ($trail, $slider) {
    $trail->parent('slider.index', $slider);
    $trail->push('Ubah Slider', route('slider.edit', $slider));
});

// Profile
Breadcrumbs::for('profile.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Profile', route('profile.index', 1));
});

// Struktur Tim
Breadcrumbs::for('struktur_tim.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Struktur Tim', route('struktur_tim.index'));
});

Breadcrumbs::for('struktur_tim.create', function ($trail) {
    $trail->parent('struktur_tim.index');
    $trail->push('Tambah Struktur Tim', route('struktur_tim.create'));
});

Breadcrumbs::for('struktur_tim.edit', function ($trail, $struktur_tim) {
    $trail->parent('struktur_tim.index', $struktur_tim);
    $trail->push('Ubah Struktur Tim', route('struktur_tim.edit', $struktur_tim));
});

// Program
Breadcrumbs::for('program.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Program', route('program.index'));
});

Breadcrumbs::for('program.create', function ($trail) {
    $trail->parent('program.index');
    $trail->push('Tambah Program', route('program.create'));
});

Breadcrumbs::for('program.edit', function ($trail, $program) {
    $trail->parent('program.index', $program);
    $trail->push('Ubah Program', route('program.edit', $program));
});

// Agenda
Breadcrumbs::for('agenda.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Agenda', route('agenda.index'));
});

Breadcrumbs::for('agenda.create', function ($trail) {
    $trail->parent('agenda.index');
    $trail->push('Tambah Agenda', route('agenda.create'));
});

Breadcrumbs::for('agenda.edit', function ($trail, $agenda) {
    $trail->parent('agenda.index', $agenda);
    $trail->push('Ubah Agenda', route('agenda.edit', $agenda));
});

// Testimoni
Breadcrumbs::for('testimoni.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Testimoni', route('testimoni.index'));
});

Breadcrumbs::for('testimoni.create', function ($trail) {
    $trail->parent('testimoni.index');
    $trail->push('Tambah Testimoni', route('testimoni.create'));
});

Breadcrumbs::for('testimoni.edit', function ($trail, $testimoni) {
    $trail->parent('testimoni.index', $testimoni);
    $trail->push('Ubah Testimoni', route('testimoni.edit', $testimoni));
});

// UMKM
Breadcrumbs::for('umkm.index', function ($trail) {
    $trail->parent('home');
    $trail->push('UMKM', route('umkm.index'));
});

Breadcrumbs::for('umkm.create', function ($trail) {
    $trail->parent('umkm.index');
    $trail->push('Tambah UMKM', route('umkm.create'));
});

Breadcrumbs::for('umkm.edit', function ($trail, $umkm) {
    $trail->parent('umkm.index', $umkm);
    $trail->push('Ubah UMKM', route('umkm.edit', $umkm));
});

// Kategori UMKM
Breadcrumbs::for('kategori_umkm.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Kategori UMKM', route('kategori_umkm.index'));
});

Breadcrumbs::for('kategori_umkm.create', function ($trail) {
    $trail->parent('kategori_umkm.index');
    $trail->push('Tambah Kategori UMKM', route('kategori_umkm.create'));
});

Breadcrumbs::for('kategori_umkm.edit', function ($trail, $kategori_umkm) {
    $trail->parent('kategori_umkm.index', $kategori_umkm);
    $trail->push('Ubah Kategori UMKM', route('kategori_umkm.edit', $kategori_umkm));
});

// Prolog UMKM
Breadcrumbs::for('prolog_umkm.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Prolog UMKM', route('prolog_umkm.index'));
});

Breadcrumbs::for('prolog_umkm.create', function ($trail) {
    $trail->parent('prolog_umkm.index');
    $trail->push('Tambah Prolog UMKM', route('prolog_umkm.create'));
});

Breadcrumbs::for('prolog_umkm.edit', function ($trail, $prolog_umkm) {
    $trail->parent('prolog_umkm.index', $prolog_umkm);
    $trail->push('Ubah Prolog UMKM', route('prolog_umkm.edit', $prolog_umkm));
});

// Artikel
Breadcrumbs::for('artikel.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Artikel', route('artikel.index'));
});

Breadcrumbs::for('artikel.create', function ($trail) {
    $trail->parent('artikel.index');
    $trail->push('Tambah Artikel', route('artikel.create'));
});

Breadcrumbs::for('artikel.edit', function ($trail, $artikel) {
    $trail->parent('artikel.index', $artikel);
    $trail->push('Ubah Artikel', route('artikel.edit', $artikel));
});

// Kategori Artikel
Breadcrumbs::for('kategori_artikel.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Kategori Artikel', route('kategori_artikel.index'));
});

Breadcrumbs::for('kategori_artikel.create', function ($trail) {
    $trail->parent('kategori_artikel.index');
    $trail->push('Tambah Kategori Artikel', route('kategori_artikel.create'));
});

Breadcrumbs::for('kategori_artikel.edit', function ($trail, $kategori_artikel) {
    $trail->parent('artikel.index', $kategori_artikel);
    $trail->push('Ubah Kategori Artikel', route('kategori_artikel.edit', $kategori_artikel));
});

// Mitra
Breadcrumbs::for('mitra.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Mitra', route('mitra.index'));
});

Breadcrumbs::for('mitra.create', function ($trail) {
    $trail->parent('mitra.index');
    $trail->push('Tambah Mitra', route('mitra.create'));
});

Breadcrumbs::for('mitra.edit', function ($trail, $mitra) {
    $trail->parent('mitra.index', $mitra);
    $trail->push('Ubah Mitra', route('mitra.edit', $mitra));
});

// Kategori Mitra
Breadcrumbs::for('kategori_mitra.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Kategori Mitra', route('kategori_mitra.index'));
});

Breadcrumbs::for('kategori_mitra.create', function ($trail) {
    $trail->parent('kategori_mitra.index');
    $trail->push('Tambah Kategori Mitra', route('kategori_mitra.create'));
});

Breadcrumbs::for('kategori_mitra.edit', function ($trail, $kategori_mitra) {
    $trail->parent('mitra.index', $kategori_mitra);
    $trail->push('Ubah Kategori Mitra', route('kategori_mitra.edit', $kategori_mitra));
});

// Prolog Mitra
Breadcrumbs::for('prolog_mitra.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Prolog Mitra', route('prolog_mitra.index'));
});

Breadcrumbs::for('prolog_mitra.create', function ($trail) {
    $trail->parent('prolog_mitra.index');
    $trail->push('Tambah Prolog Mitra', route('prolog_mitra.create'));
});

Breadcrumbs::for('prolog_mitra.edit', function ($trail, $prolog_mitra) {
    $trail->parent('prolog_mitra.index', $prolog_mitra);
    $trail->push('Ubah Prolog Mitra', route('prolog_mitra.edit', $prolog_mitra));
});

// KPengaturan
Breadcrumbs::for('setting.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Pengaturan', route('setting.index'));
});

// Donasi
Breadcrumbs::for('donasi.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Donasi', route('donasi.index'));
});

Breadcrumbs::for('donasi.create', function ($trail) {
    $trail->parent('donasi.index');
    $trail->push('Tambah Donasi', route('donasi.create'));
});

Breadcrumbs::for('donasi.edit', function ($trail, $donasi) {
    $trail->parent('donasi.index', $donasi);
    $trail->push('Ubah Donasi', route('donasi.edit', $donasi));
});

// Kategori Donasi Akun
Breadcrumbs::for('kategori_donasi_akun.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Kategori Donasi Akun', route('kategori_donasi_akun.index'));
});

Breadcrumbs::for('kategori_donasi_akun.create', function ($trail) {
    $trail->parent('kategori_donasi_akun.index');
    $trail->push('Tambah Kategori Donasi Akun', route('kategori_donasi_akun.create'));
});

Breadcrumbs::for('kategori_donasi_akun.edit', function ($trail, $kategori_donasi_akun) {
    $trail->parent('kategori_donasi_akun.index', $kategori_donasi_akun);
    $trail->push('Ubah Kategori Donasi Akun', route('kategori_donasi_akun.edit', $kategori_donasi_akun));
});

// Donasi Akun
Breadcrumbs::for('donasi_akun.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Donasi Akun', route('donasi_akun.index'));
});

Breadcrumbs::for('donasi_akun.create', function ($trail) {
    $trail->parent('donasi_akun.index');
    $trail->push('Tambah Donasi Akun', route('donasi_akun.create'));
});

Breadcrumbs::for('donasi_akun.edit', function ($trail, $donasi_akun) {
    $trail->parent('donasi_akun.index', $donasi_akun);
    $trail->push('Ubah Donasi Akun', route('donasi_akun.edit', $donasi_akun));
});

// Donatur
Breadcrumbs::for('donatur.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Donatur', route('donatur.index'));
});

Breadcrumbs::for('donatur.create', function ($trail) {
    $trail->parent('donatur.index');
    $trail->push('Tambah Donatur', route('donatur.create'));
});

Breadcrumbs::for('donatur.edit', function ($trail, $donatur) {
    $trail->parent('donatur.index', $donatur);
    $trail->push('Ubah Donatur', route('donatur.edit', $donatur));
});