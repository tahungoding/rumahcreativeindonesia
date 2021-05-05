<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectoryAccount extends Model
{
    protected $fillable = ['number_code', 'logo', 'name'];

    public function account()
    {
        return $this->hasMany(CampaignAccount::class, 'id_directory_account', 'id');
    }
}
