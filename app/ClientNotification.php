<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('id', 'timestamps', 'client_id', 'is_read');
    protected $visible = array('notification_id');

}