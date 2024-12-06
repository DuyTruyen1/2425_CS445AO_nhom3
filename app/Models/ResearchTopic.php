<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'teacher_id',
        'allowance',
        'start_date',
        'end_date',
        'max_students',
    ];

    // Liên kết với giáo viên
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Liên kết với ứng tuyển
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
