<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['thumbnail', 'title', 'slug', 'target', 'description', 'start_date', 'end_date', 'status', 'id_user', 'rab'];

    public function donatur()
    {
        return $this->hasMany(CampaignDonor::class, 'id_campaign', 'id')->where('status', '=', 'verif');
    }
}
