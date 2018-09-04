<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function comments()
    {
        return $this->belongsTo('App\Comment');
    }
}
