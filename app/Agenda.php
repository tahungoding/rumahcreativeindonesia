<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Agenda extends Model
{
    use Sluggable;

    protected $table = "agenda";
    
    protected $fillable = ['nama_agenda', 'slug', 'tanggal_awal', 'tanggal_akhir', 'tempat', 'deskripsi', 'penyelenggara', 'gambar', 'status'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_agenda'
            ]
        ];
    }
}
