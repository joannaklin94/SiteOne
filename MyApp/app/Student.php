<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'specialisation', 'student_number', 'degree', 'status', 'tel',
    ];

    public function user (){

        return $this->belongsTo('App/User');
    }





}
