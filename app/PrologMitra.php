<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrologMitra extends Model
{
    protected $table = "prolog_mitra";
    protected $fillable = ['notice', 'judul', 'deskripsi', 'gambar'];
}
