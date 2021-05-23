<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@landing_page')->name('landing_page');
Route::get('/profiles', 'GuestController@profiles')->name('profiles');
Route::resource('programs', 'Guest\ProgramController');
Route::resource('agendas', 'Guest\AgendaController');
Route::resource('umkms', 'Guest\UmkmController');
Route::get('list-umkms', 'Guest\ListUmkmController@index');
Route::get('list-umkms-data', 'Guest\ListUmkmController@data');
Route::resource('articles', 'Guest\ArtikelController');
Route::resource('mitras', 'Guest\MitraController');
Route::resource('campaign', 'Guest\CampaignController');
Route::post('campaign/{slug}', 'Guest\CampaignController@show');
Route::get('daftar-umkms', 'Guest\UmkmController@daftar');
Route::post('daftar-umkms', 'Guest\UmkmController@store_daftar')->name('daftar-umkm-post');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/setting', 'GuestController@setting')->name('setting.index');
    Route::patch('/setting', 'GuestController@setting_update')->name('setting.update');
    Route::put('/setting', 'GuestController@setting_password')->name('setting.password');
    Route::post('/pelaku_umkm/import_excel', 'PelakuUmkmController@import_excel')->name('pelaku_umkm.import_excel');
    Route::post('/pelaku_umkm/kabupaten_kota', 'PelakuUmkmController@kabupaten_kota')->name('pelaku_umkm.kabupaten_kota');
    Route::post('/pelaku_umkm/kecamatan', 'PelakuUmkmController@kecamatan')->name('pelaku_umkm.kecamatan');
    Route::post('/pelaku_umkm/desa_kelurahan', 'PelakuUmkmController@desa_kelurahan')->name('pelaku_umkm.desa_kelurahan');
    Route::resource('agenda', 'AgendaController');
    Route::resource('artikel', 'ArtikelController');
    Route::resource('home', 'HomeController');
    Route::resource('kategori_artikel', 'KategoriArtikelController');
    Route::resource('kategori_mitra', 'KategoriMitraController');
    Route::resource('kategori_umkm', 'KategoriUmkmController');
    Route::resource('mitra', 'MitraController');
    Route::resource('profile', 'ProfileController');
    Route::resource('program', 'ProgramController');
    Route::resource('struktur_tim', 'StrukturTimController');
    Route::resource('testimoni', 'TestimoniController');
    Route::resource('umkm', 'UmkmController');
    Route::resource('pelaku_umkm', 'PelakuUmkmController');
    Route::resource('user', 'UserController');
    Route::resource('user_level', 'UserLevelController');
    Route::resource('slider', 'SliderController');
    Route::resource('prolog_umkm', 'PrologUmkmController');
    Route::resource('prolog_mitra', 'PrologMitraController');
    Route::resource('donasi', 'DonasiController');
    Route::resource('donasi_akun', 'DonasiAkunController');
    Route::resource('donatur', 'DonaturController');
    Route::resource('kategori_donasi_akun', 'KategoriDonasiAkunController');
});

Auth::routes();
