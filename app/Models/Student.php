<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
