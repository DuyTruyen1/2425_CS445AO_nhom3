<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job';

    protected $fillable = [
        'company_id', 'title', 'description', 'location', 'salary', 'job_type',
    ];

    // Mối quan hệ: Công ty sở hữu nhiều công việc
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id'); // Đổi từ User thành Company
    }

    // Mối quan hệ: Công việc có thể có nhiều phỏng vấn
    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}
