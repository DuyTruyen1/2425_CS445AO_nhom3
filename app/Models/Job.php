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
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Mối quan hệ: Công việc có thể có nhiều phỏng vấn
    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }

    // Kiểm tra giá trị hợp lệ của job_type
    public static function validJobTypes()
    {
        return ['full_time', 'part_time', 'internship', 'freelance'];
    }

    // Thêm một phương thức set để kiểm tra và gán giá trị hợp lệ cho job_type
    public function setJobTypeAttribute($value)
    {
        if (!in_array($value, self::validJobTypes())) {
            throw new \InvalidArgumentException("Invalid job type.");
        }
        $this->attributes['job_type'] = $value;
    }
}
