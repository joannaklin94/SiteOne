<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'visit_hours', 'room', 'institute', 'telephone',
    ];
}
