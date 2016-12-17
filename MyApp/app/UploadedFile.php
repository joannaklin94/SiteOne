<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $fillable = [
        'id', 'file_name', 'original_name', 'description', 'user_id','student_id',
    ];

    protected $table = 'files';

}
