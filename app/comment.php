<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function vote()
    {
    	return $this->belongsTo('App\Vote');
    }
}
