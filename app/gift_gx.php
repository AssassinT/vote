<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gift_gx extends Model
{
    public function options()
    {
        return $this->hasMany('App\Option');
    }
    public function gifts()
    {
        return $this->belongsTo('App\Gift');
    }
}
