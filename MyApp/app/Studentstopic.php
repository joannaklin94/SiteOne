<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentstopic extends Model
{
    protected $fillable = [
        'id_student', 'id_thesis',
    ];

}
