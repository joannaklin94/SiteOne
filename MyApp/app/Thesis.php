<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = [
        'id', 'id_prof', 'title', 'description', 'degree', 'specialisations',
    ];

    public function professor (){

        return $this->belongsTo('App/Professor');
    }
}
