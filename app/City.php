<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('timestamps', 'id', 'name', 'governorate_id');

    public function governorate()
    {
        return $this->belongsTo('App\Governorate', 'governorate_id');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\DonationRequest');
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

}