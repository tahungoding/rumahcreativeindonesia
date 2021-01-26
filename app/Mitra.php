<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = "mitra";
    protected $fillable = [
        'id_kategori_mitra',
        'nama',
        'logo',
        'status',
    ];

    public function kategori_mitra()
    {
        return $this->belongsTo('App\KategoriMitra', 'id_kategori_mitra', 'id');
        // return $this->belongsTo('App\KategoriUmkm');
    }
}
