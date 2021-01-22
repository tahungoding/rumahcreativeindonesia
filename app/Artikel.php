<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = "artikel";
    protected $fillable = [
        'judul',
        'gambar',
        'konten',
        'id_kategori_artikel',
        'slug',
        'id_user',
        'tanggal_publish',
        'hits',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori_artikel', 'id');
    }

    public function writer()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
