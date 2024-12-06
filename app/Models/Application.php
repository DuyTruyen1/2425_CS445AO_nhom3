<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'research_topic_id',
        'student_id',
        'status',
    ];

    // Liên kết với đề tài nghiên cứu
    public function researchTopic()
    {
        return $this->belongsTo(ResearchTopic::class);
    }

    // Liên kết với sinh viên
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'research_topic_id', 'id');
    }
}
