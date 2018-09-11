<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gift_gx extends Model
{
    public function options()
    {
        return $this->belongsToMany('App\Option');
    }
    public function gifts()
    {
        return $this->belongsTo('App\Gift');
    }
}
