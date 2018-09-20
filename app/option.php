<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function gift_gx()
    {
        return $this->belongsToMany('App\Gift_gx');
    }




    public function vote()
    {
        return $this->belongsTo('App\Vote');
    }



}
