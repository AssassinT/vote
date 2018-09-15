<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gift extends Model
{
    public function gift_gx()
    {
        return $this->hasMany('App\Gift_gx');
    }
}
