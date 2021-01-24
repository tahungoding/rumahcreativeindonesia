<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = "testimoni";
    protected $fillable = ['responden', 'asal', 'isi', 'gambar'];
}
