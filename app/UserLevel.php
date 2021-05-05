<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLevel extends Model
{
    use SoftDeletes;
    protected $table = "user_level";

    protected $fillable = ['nama', 'status'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_level', 'id');
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($userLevel) {
            $userLevel->users->each(function($users) {
                $users->delete();
            });
        });
    }
}
