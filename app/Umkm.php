<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = "umkm";
    protected $fillable = [
        'id_kategori_umkm',
        'nama',
        'alamat',
        'telepon',
        'instagram',
        'pemilik',
        'shopee',
        'tokopedia',
        'bukalapak',
        'gambar',
        'status'
    ];

    public function kategori_umkm()
    {
        return $this->belongsTo('App\KategoriUmkm', 'id_kategori_umkm', 'id');
        // return $this->belongsTo('App\KategoriUmkm');
    }
}

