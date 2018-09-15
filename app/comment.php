<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function user()
    {
    	return $this->hasMany('App\User');
    }
    public function vote()
    {
    	return $this->hasMany('App\Vote');
    }
}
