<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Interview;
use App\Models\Category;

class StudyController extends Controller
{
    public function index()
    {
        $category = category::all()[2];

        // Hiển thị danh sách công việc của công ty
        $jobs = Job::where('company_id', auth()->id())->get();
        return view('Pages.Company.jobs.index', compact('jobs', 'category'));
    }
}
