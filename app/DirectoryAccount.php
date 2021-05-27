<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectoryAccount extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['number_code', 'logo', 'name'];
    
    protected $dates = ['deleted_at'];
    
    public function account()
    {
        return $this->hasMany(CampaignAccount::class, 'id_directory_account', 'id');
    }
}
