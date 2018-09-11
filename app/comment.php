<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function users()
    {
    	return $this->hasMany('App\User');
    }
    public function votes()
    {
    	return $this->hasMany('App\Vote');
    }
}
