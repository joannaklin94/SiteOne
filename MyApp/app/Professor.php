<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'id', 'visit_hours', 'room', 'institute', 'telephone',
    ];

    public function professor (){

        return $this->belongsTo('App/User');
    }


    public function thesis ()
    {
        return $this->hasMany('App\Thesis', 'id_prof', 'id');
    }
}
