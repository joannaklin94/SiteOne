<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'id', 'visit_hours', 'room', 'institute', 'telephone',
    ];

    public function user (){

        return $this->belongsTo('App/User');
    }



}
