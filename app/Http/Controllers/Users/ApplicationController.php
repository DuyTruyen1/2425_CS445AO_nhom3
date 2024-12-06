<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ResearchTopic;
use App\Models\Teacher;
use App\Models\Category;

class ApplicationController extends Controller
{
    public function index()
    {
        // Lấy danh sách các chủ đề nghiên cứu kèm theo giáo viên và ứng tuyển
        $topics = ResearchTopic::with(['teacher', 'applications'])->get();
        $category = category::all()[2];

        return view('Pages.Student.research_topics.index', compact('topics', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'research_topic_id' => 'required|exists:research_topics,id',
        ]);

        $alreadyApplied = Application::where('research_topic_id', $request->research_topic_id)
            ->where('student_id', auth()->id())
            ->exists();

        if ($alreadyApplied) {
            return redirect()->back()->with('error', 'Bạn đã ứng tuyển chủ đề này.');
        }

        Application::create([
            'research_topic_id' => $request->research_topic_id,
            'student_id' => auth()->id(),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Ứng tuyển thành công. Vui lòng chờ giáo viên duyệt.');
    }
}
