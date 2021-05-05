<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriMitra extends Model
{
    use SoftDeletes;
    protected $table = "kategori_mitra";

    protected $fillable = ['nama'];

    public function mitra()
    {
        return $this->hasMany('App\KategoriUmkm', 'id_kategori_mitra', 'id');
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($kategoriMitra) {
            $kategoriMitra->mitra->each(function($mitra) {
                $mitra->delete();
            });
        });
    }
}
