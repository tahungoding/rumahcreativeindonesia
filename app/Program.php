<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = "program";
    protected $fillable = ['nama_program', 'icon', 'gambar', 'tanda', 'deskripsi', 'status'];
}
