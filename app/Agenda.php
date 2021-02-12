<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Agenda extends Model implements Viewable
{
    use Sluggable, InteractsWithViews;

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
