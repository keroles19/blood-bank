<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBankType extends Model 
{

    protected $table = 'blood_type_client';
    public $timestamps = true;
    protected $fillable = array('id', 'timestamps', 'client_id', 'blood_type_id');

}