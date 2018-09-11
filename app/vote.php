<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->belongsTo('App\Comment');
    }

    public function option()
    {
        return $this->belongsToMany('App\Option');
    }


    public function option()
    {
        return $this->hasMany('App\Option');
    }

  

}
