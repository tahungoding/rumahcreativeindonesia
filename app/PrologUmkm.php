<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrologUmkm extends Model
{
    protected $table = "prolog_umkm";
    protected $fillable = ['notice', 'judul', 'deskripsi', 'gambar'];
}
