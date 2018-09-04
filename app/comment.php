<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
    public function votes()
    {
    	return $this->belongsToMany('App\Vote');
    }
}
