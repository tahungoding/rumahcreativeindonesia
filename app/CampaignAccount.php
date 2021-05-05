<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignAccount extends Model
{
    protected $fillable = ['number', 'name', 'id_directory_account', 'qrcode'];

    public function directory()
    {
        return $this->belongsTo(DirectoryAccount::class, 'id_directory_account', 'id');
    }

}
