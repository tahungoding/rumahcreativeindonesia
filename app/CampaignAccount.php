<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignAccount extends Model
{
    use SoftDeletes;

    protected $fillable = ['number', 'name', 'id_directory_account', 'qrcode'];

    protected $dates = ['deleted_at'];

    public function directory()
    {
        return $this->belongsTo(DirectoryAccount::class, 'id_directory_account', 'id');
    }

}
