<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'id');
    }

    public function thesis ()
    {
        return $this->hasMany('App\Thesis', 'id', 'id');
    }

    public function Role()
    {
        if ($this->role == 'admin'){
            return 0 ;
        }

        if ($this->role == 'prof'){
            return 1 ;
        }

        if ($this->role == 'student'){
            return 2 ;
        }
    }



}
