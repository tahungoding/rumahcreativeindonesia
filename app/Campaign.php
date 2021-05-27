<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;

    protected $fillable = ['thumbnail', 'title', 'slug', 'target', 'description', 'start_date', 'end_date', 'status', 'id_user', 'rab'];

    protected $dates = ['deleted_at'];
    
    public function donatur()
    {
        return $this->hasMany(CampaignDonor::class, 'id_campaign', 'id')->where('status', '=', 'verif');
    }
}
