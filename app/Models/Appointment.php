<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'meeting_url',
        'teacher_id',
        'company_id',
        'student_id',
    ];

    // Quan hệ với model Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    // Quan hệ với model Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Quan hệ với model Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
