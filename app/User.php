<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'user_name', 'email', 'password',
    // ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function proposal()
    {
        return $this->hasMany('App\Proposal');
    }

     public function comment()
    {
        return $this->hasMany('App\Comment');
    }

     public function vote()
    {
        return $this->hasMany('App\Vote');
    }
    
}
