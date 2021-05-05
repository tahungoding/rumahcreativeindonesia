<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignDonor extends Model
{
    protected $fillable = ['name', 'amount', 'message', 'id_campaign', 'id_campaign_account', 'proof', 'status'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'id_campaign', 'id');
    }

    public function campaign_account()
    {
        return $this->belongsTo(CampaignAccount::class, 'id_campaign_account', 'id');
    }
}
