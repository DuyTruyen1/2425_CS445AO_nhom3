<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FK_Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Messenger;
use App\Models\Blog;
use App\Models\Users;

class NumberController extends Controller
{
    public function numbers()
    {
        $usersCount = Users::count();
        $skillStats = Fk_Skill::select('skill.name', DB::raw('count(*) as total'))
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->groupBy('skill.name')
            ->join('students', 'students.id', '=', 'fk_skill.student_id')
            ->get()
            ->toArray();
        $skillStats2 = Fk_Skill::select('skill.name', DB::raw('count(*) as total'))
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->groupBy('skill.name')
            ->join('teacher', 'teacher.id', '=', 'fk_skill.teacher_id')
            ->get()
            ->toArray();
        $skillStats3 = Fk_Skill::select('skill.name', DB::raw('count(*) as total'))
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->groupBy('skill.name')
            ->join('company', 'company.id', '=', 'fk_skill.company_id')
            ->get()
            ->toArray();
        $companyCount = Users::where('category', 1)->count();
        $teacherCount = Users::where('category', 2)->count();
        $studentCount = Users::where('category', 3)->count();
        $blogCount = Blog::count();
        $messageCount = Messenger::count();

        return view('Admin.numbers', compact('messageCount', 'skillStats', 'skillStats2', 'skillStats3', 'companyCount', 'teacherCount', 'studentCount', 'blogCount', 'usersCount'));
    }
}
