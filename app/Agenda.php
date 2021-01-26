<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = "agenda";
    protected $fillable = ['nama_agenda', 'tanggal_awal', 'tanggal_akhir', 'tempat', 'deskripsi', 'penyelenggara', 'gambar', 'status'];
}
