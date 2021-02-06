<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "slide";
    protected $fillable = ['judul', 'gambar', 'deskripsi', 'link', 'status'];
}
