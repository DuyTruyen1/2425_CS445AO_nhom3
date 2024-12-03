<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Interview;
use App\Models\Category;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $category = category::all()[2];

        // Hiển thị danh sách công việc của công ty
        $jobs = Job::where('company_id', auth()->id())->get();
        return view('Pages.Company.jobs.index', compact('jobs', 'category'));
    }

    public function create()
    {
        $category = category::all()[2];

        return view('Pages.Company.jobs.create', compact('category'));
    }

    public function store(Request $request)
    {
        // Lưu công việc mới
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'job_type' => 'required',
        ]);

        Job::create([
            'company_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
        ]);

        return redirect()->route('company.jobs.index')->with('success', 'Job created successfully!');
    }

    public function show(Job $job)
    {
        $category = category::all()[2];
        return view('Pages.Company.jobs.show', compact('job', 'category'));
    }

    public function edit(Job $job)
    {
        // Hiển thị form chỉnh sửa công việc
        return view('Pages.Company.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // Cập nhật công việc
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'job_type' => 'required',
        ]);

        $job->update($request->only('title', 'description', 'location', 'salary', 'job_type'));

        return redirect()->route('company.jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        // Xóa công việc
        $job->delete();

        return redirect()->route('company.jobs.index')->with('success', 'Job deleted successfully!');
    }

    // Hiển thị danh sách ứng viên đã ứng tuyển vào công việc của công ty
    public function showApplicants($jobId)
    {
        $category = category::all()[2];

        // Lấy thông tin công việc
        $job = Job::findOrFail($jobId);

        // Lấy danh sách ứng viên và thông tin sinh viên (email, name) qua user
        $applicants = Interview::where('job_id', $jobId)
            ->with('student.user:id,name,email') // Lấy thông tin sinh viên và user
            ->get();

        return view('Pages.company.jobs.applicants', compact('job', 'applicants', 'category'));
    }


    // Chấp nhận ứng viên
    public function acceptApplicant($interviewId)
    {
        // Lấy thông tin interview
        $interview = Interview::findOrFail($interviewId);

        // Kiểm tra nếu interview có trạng thái "Đang chờ"
        if ($interview->status == 'Đang chờ') {
            // Cập nhật trạng thái thành "Chấp nhận"
            $interview->status = 'Chấp nhận';
            $interview->save();

            return redirect()->route('jobs.applicants', $interview->job_id)
                ->with('success', 'Bạn đã chấp nhận ứng viên thành công.');
        }

        return redirect()->route('jobs.applicants', $interview->job_id)
            ->with('error', 'Ứng viên này đã bị từ chối hoặc đã được chấp nhận.');
    }
}
