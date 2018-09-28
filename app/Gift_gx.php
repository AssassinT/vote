<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift_gx extends Model
{
    public function option()
    {
        return $this->belongsTo('App\Option');
    }
    public function gift()
    {
        return $this->belongsTo('App\Gift');
    }
}
