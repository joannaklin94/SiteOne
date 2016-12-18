<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'comment_id', 'message', 'user_id', 'id_student',
    ];
}
