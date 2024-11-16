<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher";

    public function studentOfTeacher()
    {
        return $this->hasMany('App\student', 'TeacherID', 'StudentID');
    }
}
