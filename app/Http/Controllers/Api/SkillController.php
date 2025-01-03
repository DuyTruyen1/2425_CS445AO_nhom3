<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;
use App\Http\Requests\EditSkillRequest;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function skill()
    {
        $skill = Skill::all();
        return view('Admin.skill', ['skill' => $skill]);
    }

    public function postSkill(SkillRequest $req)
    {
        $skill = Skill::create($req->validated());
        return response()->json(['success' => 'Thêm thành công kỹ năng']);
    }

    public function editSkill($id)
    {
        $skill = Skill::find($id);
        return response()->json(['skill' => $skill]);
    }

    public function postEditSkill(EditSkillRequest $req, $id)
    {
        $skill = Skill::findOrFail($id); // Kiểm tra tồn tại
        $skill->update($req->validated()); // Chỉ nhận dữ liệu hợp lệ
        return response()->json(['success' => 'Cập nhật thành công']);
    }

    public function deleteSkill($id)
    {
        $skill = Skill::find($id);

        if ($skill) {
            $skill->delete();
            return response()->json(['success' => 'Xóa thành công']);
        } else {
            return response()->json(['error' => 'Kỹ năng không tồn tại'], 404);
        }
    }
}
