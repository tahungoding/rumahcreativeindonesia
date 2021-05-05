<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto',
        'name',
        'email',
        'username',
        'password',
        'id_level',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Artikel::class, 'id_user', 'id');
    }

    public function userLevel()
    {
        return $this->belongsTo(UserLevel::class, 'id_level', 'id');
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($user) {
            $user->articles->each(function($articles) {
                $articles->delete();
            });
        });
    }
}
