<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'id', 'specialisation', 'student_number', 'degree', 'status', 'telephone',
    ];

    public function user (){

        return $this->belongsTo('App/User');
    }

//    public function thesis()
//    {
//        return $this->hasOne('App\Thesis');
//    }





//    protected $incrementing = false; //chyba bo nie jest incrementing primary key

}
