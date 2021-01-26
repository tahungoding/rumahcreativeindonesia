<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = "user_level";

    protected $fillable = ['nama', 'status'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_level', 'id');
    }
}
