<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@landing_page')->name('landing_page');
Route::get('/profiles', 'GuestController@profiles')->name('profiles');
Route::resource('programs', 'Guest\ProgramController');
Route::resource('agendas', 'Guest\AgendaController');
Route::resource('umkms', 'Guest\UmkmController');
Route::resource('articles', 'Guest\ArtikelController');
Route::resource('mitras', 'Guest\MitraController');

Route::group(['middleware' => 'auth'], function () {
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
    Route::resource('user', 'UserController');
    Route::resource('user_level', 'UserLevelController');
});

Auth::routes();
