<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;
use App\Http\Requests\EditSkillRequest;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // Hiển thị danh sách kỹ năng
    public function skill()
    {
        $skills = Skill::all();
        return view('Admin.skill', compact('skills'));
    }

    // Thêm kỹ năng mới
    public function postSkill(SkillRequest $req)
    {
        Skill::create($req->validated());
        return redirect()->back()->with('success', 'Thêm thành công kỹ năng');
    }

    // Hiển thị form sửa kỹ năng
    public function editSkill($id)
    {
        $skill = Skill::find($id);
        return view('Admin.edit_skill', compact('skill'));
    }

    // Cập nhật kỹ năng
    public function postEditSkill(EditSkillRequest $req, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($req->validated());
        return redirect()->route('skills')->with('success', 'Cập nhật thành công');
    }

    // Xóa kỹ năng
    public function deleteSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
