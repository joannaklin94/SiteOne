<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = [
        'id', 'id_prof', 'title', 'description', 'degree', 'specialisations',
    ];

//    public function user (){
//
//        return $this->belongsTo('App\User','id','id_prof');
//    }
}
