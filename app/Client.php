<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('id','active', 'timestamps','name', 'phone', 'password', 'email', 'date_of_birth', 'blood_type_id', 'last_donation_date', 'city_id', 'pin_code', 'api_token');
    protected $hidden = array('api_token');

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Governorate');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\DonationRequest');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function tokens()
    {
        return $this->hasMany('App\Token');
    }

}
