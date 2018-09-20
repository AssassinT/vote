<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function option()
    {
        return $this->hasMany('App\Option');
    }

  

}
