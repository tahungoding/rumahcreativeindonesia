<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
=======
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

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 195ae7637de45702ecb201e01c319852eac42088
