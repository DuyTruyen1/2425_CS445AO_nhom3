<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Skill;
use App\Models\FK_Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Messenger;
use App\Models\Blog;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\Users;

class AdminController extends Controller
{
    use ValidatesRequests;  // Thêm trait này để sử dụng phương thức validate

    public function adminHome()
    {
        $usersCount = Users::count();
        $blogsCount = Blog::count();
        $messagesCount = Messenger::count();
        $feedbacksCount = Feedback::count();
        $users = Users::all(); // Có thể thêm điều kiện lọc nếu cần

        return view('Admin.home', compact('usersCount', 'blogsCount', 'messagesCount', 'feedbacksCount', 'users'));
    }

    public function loginAdmin()
    {
        return view('Admin.Login_admin');
    }

    public function postLoginAdmin(Request $request)
    {
        if (Auth::guard('adm')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin-home')->with('success', 'Chào mừng quay lại!');
        } else {
            return back()->withErrors(['message' => 'Thông tin đăng nhập không chính xác']);
        }
    }

    public function registrationAdmin()
    {
        return view('Admin.registration_admin');
    }

    public function postRegistrationAdmin(Request $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $admin = Admin::create($request->all());

        if ($admin) {
            return redirect()->route('login-admin');
        } else {
            return back()->withErrors(['message' => 'Đăng ký không thành công']);
        }
    }

    public function logoutAdmin()
    {
        Auth::guard('adm')->logout();
        return redirect()->route('login-admin');
    }

    public function category()
    {
        $category = Category::all();
        return view('Admin.category', ['cat' => $category]);
    }

    public function postCategory(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|unique:Category',
        ], [
            'name.required' => ' Không được trống',
        ]);
        $category = Category::create($req->all());
        return response()->json(['success' => 'them thanh cong san pham']);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return json_encode([
            'cat' => $category,
        ]);
    }

    public function postEditCategory(Request $req, $id)
    {
        $this->validate($req, [
            'name' => 'required|unique:Category,name,' . $id,
        ], [
            'name.required' => 'Tên danh mục không được trống',
            'name.unique' => 'Tên danh đã tồn tại ',
        ]);
        Category::find($id)->update($req->all());
        return response()->json(['success' => 'update thành cong']);
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return response()->json(['success' => 'Xóa thành công danh mục']);
    }

    public function user()
    {
        $users = Users::all();
        return view('Admin.user', ['users' => $users]);
    }

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
            ->join('teachers', 'teachers.id', '=', 'fk_skill.teacher_id')
            ->get()
            ->toArray();
        $skillStats3 = Fk_Skill::select('skill.name', DB::raw('count(*) as total'))
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->groupBy('skill.name')
            ->join('companies', 'companies.id', '=', 'fk_skill.company_id')
            ->get()
            ->toArray();
        $companyCount = Users::where('category', 1)->count();
        $teacherCount = Users::where('category', 2)->count();
        $studentCount = Users::where('category', 3)->count();
        $blogCount = Blog::count();
        $messageCount = Messenger::count();

        return view('Admin.numbers', compact('messageCount', 'skillStats', 'skillStats2', 'skillStats3', 'companyCount', 'teacherCount', 'studentCount', 'blogCount', 'usersCount'));
    }

    public function deleteBlog(Request $request)
    {
        $blog = Blog::find($request->id);
        if ($blog) {
            try {
                $blog->delete();
                return redirect()->back()->with('success', 'Bạn đã xoá thành công bài đăng');
            } catch (\Exception $e) {
                return redirect()->back()->with('danger', 'Có lỗi khi xoá bài đăng: ' . $e->getMessage());
            }
        }
        return redirect()->back()->with('danger', 'Không tìm thấy bài đăng này');
    }


    public function getBlog()
    {
        $blogs = Blog::all();
        return view('Admin.blog', ['BL_St' => $blogs]);
    }

    public function deleteUser($id)
    {
        Messenger::where('fk_user_id', $id)->delete();
        Blog::where('user_id', $id)->delete();

        $user = Users::find($id);
        if ($user) {
            if ($user->category == 3) {
                Student::find($id)?->delete();
                \App\Models\ThreadMessenger::where('user_student', $id)->delete();
            } elseif ($user->category == 2) {
                Teacher::find($id)?->delete();
                \App\Models\ThreadMessenger::where('user_teacher', $id)->delete();
            } else {
                Company::find($id)?->delete();
                \App\Models\ThreadMessenger::where('user_company', $id)->delete();
            }

            $user->delete();
            return redirect()->back()->with('success', 'Xóa người dùng thành công');
        }

        return redirect()->back()->with('error', 'Không tìm thấy người dùng');
    }

    public function feedback()
    {
        $feedbacks = Feedback::all();
        return view('Admin.feedback', ['feedbacks' => $feedbacks]);
    }

    public function skill()
    {
        $skill = Skill::all();
        return view('Admin.skill', ['skill' => $skill]);
    }

    public function postSkill(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|unique:Skill',
        ], [
            'name.required' => ' Không được trống',
        ]);
        $skill = Skill::create($req->all());
        return response()->json(['success' => 'them thanh cong san pham']);
    }

    public function editSkill($id)
    {
        $skill = Skill::find($id);
        return response()->json(['skill' => $skill]);
    }

    public function postEditSkill(Request $req, $id)
    {
        $this->validate($req, [
            'name' => 'required|unique:Skill,name,' . $id,
        ], [
            'name.required' => 'Tên danh mục không được trống',
            'name.unique' => 'Tên danh đã tồn tại ',
        ]);
        Skill::find($id)->update($req->all());
        return response()->json(['success' => 'update thành cong']);
    }

    public function deleteSkill($id)
    {
        // Tìm kỹ năng theo ID và xóa
        $skill = Skill::find($id);

        if ($skill) {
            $skill->delete(); // Xóa kỹ năng
            return response()->json(['success' => 'Xóa thành công']);
        } else {
            return response()->json(['error' => 'Kỹ năng không tồn tại'], 404);
        }
    }
}
