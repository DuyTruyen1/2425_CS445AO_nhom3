<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 'student_id', 'interview_date', 'status',
    ];

    // Mối quan hệ: Phỏng vấn thuộc về công việc
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    // Mối quan hệ: Phỏng vấn thuộc về sinh viên
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function user()
    {
        return $this->belongsToThrough(User::class, Student::class, 'student_id', 'user_id');
    }
}
