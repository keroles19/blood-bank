<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('id', 'timestamps', 'title', 'image', 'body', 'category_id');

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}