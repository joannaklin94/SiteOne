<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = [
        'id', 'id_prof', 'title_pol', 'title_ang','description_pol', 'description_ang', 'degree', 'faculties', 'specialisations',
    ];

//    protected $primaryKey = 'prof_id';


//    public function user (){
//
//        return $this->belongsTo('App\User','id','id_prof');
//    }
}
