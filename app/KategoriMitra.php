<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriMitra extends Model
{
    protected $table = "kategori_mitra";

    protected $fillable = ['nama'];

    public function mitra()
    {
        return $this->hasMany('App\KategoriUmkm', 'id_kategori_mitra', 'id');
    }
}
