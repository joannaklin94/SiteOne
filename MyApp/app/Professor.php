<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'prof_id', 'visit_hours', 'room', 'institute_id', 'faculty_id', 'telephone',
    ];

    protected $primaryKey = 'prof_id';

    public function user (){

        return $this->belongsTo('App/User');
    }



}
