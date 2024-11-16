<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FK_Skill extends Model
{
    protected $table = 'fk_skill';

    protected $fillable = [
        'student_id', 'company_id', 'teacher_id', 'skill_id'
    ];
}
