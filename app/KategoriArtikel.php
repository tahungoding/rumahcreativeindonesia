<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriArtikel extends Model
{
    use SoftDeletes;
    protected $table = "kategori_artikel";
    protected $fillable = ['nama', 'status'];

    public function articles()
    {
        return $this->hasMany(Artikel::class, 'id_kategori_artikel', 'id');
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($kategoriArtikel) {
            $kategoriArtikel->articles->each(function($articles) {
                $articles->delete();
            });
        });
    } 
}
