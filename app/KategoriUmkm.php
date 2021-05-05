<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriUmkm extends Model
{
    use SoftDeletes;
    protected $table = "kategori_umkm";

    protected $fillable = ['nama'];

    public function umkm()
    {
        return $this->hasMany('App\Umkm', 'id_kategori_umkm', 'id');
    }
    public static function boot() {
        parent::boot();
        static::deleting(function($kategoriUmkm) {
            $kategoriUmkm->umkm->each(function($umkm) {
                $umkm->delete();
            });
        });
    }
}
