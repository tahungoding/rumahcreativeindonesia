<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $table = "kategori_artikel";
    protected $fillable = ['nama', 'status'];

    public function articles()
    {
        return $this->hasMany(Artikel::class, 'id_kategori_artikel', 'id');
    }
}
