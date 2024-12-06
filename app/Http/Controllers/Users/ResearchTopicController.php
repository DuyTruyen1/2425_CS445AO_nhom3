<?php

namespace App\Http\Controllers\Users;

use App\Models\ResearchTopic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Application;
use App\Http\Requests\ResearchTopicRequest;
use App\Http\Requests\UpdateResearchTopicRequest;

class ResearchTopicController extends Controller
{
    public function index()
    {
        $topics = ResearchTopic::with('teacher')->get();
        $category = category::all()[2];

        return view('Pages.Teacher.research_topics.index', compact('topics', 'category'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $category = category::all()[2];

        return view('Pages.Teacher.research_topics.create', compact('teachers', 'category'));
    }

    public function store(ResearchTopicRequest $request)
    {
        ResearchTopic::create($request->validated());

        return redirect()->route('research-topics.index')->with('success', 'Đề tài nghiên cứu đã được tạo thành công!');
    }


    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $application->update(['status' => $request->status]);

        return back()->with('success', 'Cập nhật trạng thái thành công!');
    }

    public function edit($id)
    {
        $category = category::all()[2];

        $topic = ResearchTopic::findOrFail($id);

        return view('Pages.Teacher.research_topics.edit', compact('topic', 'category'));
    }

    public function update(UpdateResearchTopicRequest $request, $id)
    {
        $topic = ResearchTopic::findOrFail($id);
        $topic->update($request->validated());

        return redirect()->route('research-topics.index')->with('success', 'Cập nhật đề tài thành công!');
    }


    public function destroy($id)
    {
        $topic = ResearchTopic::findOrFail($id);
        $topic->delete();

        return redirect()->route('research-topics.index')->with('success', 'Xóa đề tài thành công!');
    }
}
