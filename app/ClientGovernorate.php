<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientGovernorate extends Model 
{

    protected $table = 'client_governorate';
    public $timestamps = true;
    protected $fillable = array('id', 'timestamps', 'client_id', 'governorate_id');

}