<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    protected $table = "kategori_umkm";

    protected $fillable = ['nama'];

    public function umkm()
    {
        // return $this->hasOne('App\Umkm');
        return $this->hasMany('App\Umkm', 'id_kategori_umkm', 'id');
    }
}
