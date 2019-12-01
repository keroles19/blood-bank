<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientBost extends Model 
{

    protected $table = 'client_post';
    public $timestamps = true;
    protected $fillable = array('id', 'timestamps', 'client_id');

}