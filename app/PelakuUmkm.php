<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelakuUmkm extends Model
{
    protected $table = "pelaku_umkm";
    protected $fillable = [
        'nik',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'provinsi',
        'kabupaten_kota',
        'kecamatan',
        'desa_kelurahan',
        'alamat',
        'bidang_usaha',
        'no_hp'
    ];

    public function provinsi()
    {
        return $this->belongsTo('App\Models\Province', 'provinsi', 'id');
    }
    public function kabupaten_kota()
    {
        return $this->belongsTo('App\Models\Regency', 'kabupaten_kota', 'id');
    }
    public function kecamatan()
    {
        return $this->belongsTo('App\Models\District', 'kecamatan', 'id');
    }
    public function desa_kelurahan()
    {
        return $this->belongsTo('App\Models\Village', 'desa_kelurahan', 'id');
    }
}
