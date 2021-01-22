<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StrukturTim extends Model
{
    protected $table = "struktur_tim";
    protected $fillable = ['nama', 'jabatan', 'status'];
}
