<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gift extends Model
{
    public function gift_gxs()
    {
        return $this->hasMany('App\Gift_gx');
    }
}
