<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'id_prof', 'title', 'description', 'finish_date'
    ];

    public function professor (){

        return $this->belongsTo('App/Professor');
    }
}
