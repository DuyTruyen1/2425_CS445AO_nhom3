<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThreadMessenger extends Model
{
    protected $table = 'messenger_threads';

    protected $fillable = [
        'user_student', 'user_teacher', 'user_company'
    ];
}
