<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    public function gift_gxs()
    {
        return $this->belongsToMany('App\Gift_gx');
    }

    public function vote()
    {
        return $this->belongsTo('App\Vote');
    }
}
