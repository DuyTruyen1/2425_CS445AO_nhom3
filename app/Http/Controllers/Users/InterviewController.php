<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\Job;
use App\Models\User;
use App\Models\Category;

class InterviewController extends Controller
{
    // Hiển thị danh sách công việc
    public function index()
    {
        $category = category::all()[2];

        // Lấy tất cả công việc mà sinh viên có thể ứng tuyển
        $jobs = Job::all();  // Hoặc thêm điều kiện lọc nếu cần
        return view('Pages.Student.interviews.index', compact('jobs', 'category'));
    }

    // Sinh viên nộp đơn ứng tuyển vào công việc
    public function apply($jobId)
    {
        // Lấy công việc
        $job = Job::findOrFail($jobId);

        // Kiểm tra nếu sinh viên đã ứng tuyển vào công việc này
        $existingApplication = Interview::where('student_id', auth()->user()->id)
            ->where('job_id', $job->id)
            ->exists();
        if ($existingApplication) {
            return redirect()->route('student.jobs.index')->with('error', 'Bạn đã ứng tuyển vào công việc này rồi.');
        }

        // Tạo một phỏng vấn mới cho sinh viên và công ty
        Interview::create([
            'student_id' => auth()->user()->id,
            'job_id' => $job->id,
            'status' => 'Đang chờ',
        ]);

        return redirect()->route('student.jobs.index')->with('success', 'Bạn đã ứng tuyển thành công.');
    }
}
