<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\student;
use App\Models\teacher;
use App\Models\company;
use App\Models\Feedback;
use App\Models\Category;
use App\Models\Blog;
use App\Models\FK_Skill;
use App\Models\Skill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostBlogRequest;
use Illuminate\Support\Str;


use App\Http\Requests\RequestPassword;
use App\Http\Requests\RequestRegistration;

class CompanyController extends Controller
{
    public function getHome()
    {
        $companys = users::where('category', 1)->count();
        $teachers = users::where('category', 2)->count();
        $students = users::where('category', 3)->count();
        $blogs = blog::all()->count();
        $category = category::all()[0];
        $skill_all = Fk_Skill::select('skill.name', DB::raw('count(*) as total'))
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->groupBy('skill.name')
            ->join('students', 'students.id', '=', 'fk_skill.student_id')
            ->get()
            ->toArray();
        $skill_all2 = Fk_Skill::select('skill.name', DB::raw('count(*) as total'))
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->groupBy('skill.name')
            ->join('teacher', 'teacher.id', '=', 'fk_skill.teacher_id')
            ->get()
            ->toArray();
        $skill_all3 = Fk_Skill::select('skill.name', DB::raw('count(*) as total'))
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->groupBy('skill.name')
            ->join('company', 'company.id', '=', 'fk_skill.company_id')
            ->get()
            ->toArray();
        return view('Pages.Company.home', ['skill_all3' => $skill_all3, 'skill_all2' => $skill_all2, 'skill_all' => $skill_all, 'category' => $category, 'companys' => $companys, 'teachers' => $teachers, 'students' => $students, 'blogs' => $blogs]);
    }

    public function getBlog()
    {

        $category = category::all()[2];
        $id = Auth::user()->id;
        $BL_cpn = DB::table('blog')
            ->where('id', $id)
            ->paginate(4);

        return view('Pages.Company.Blog', ['BL_cpn' => $BL_cpn, 'category' => $category]);
    }

    public function postBlog(PostBlogRequest $request)
    {
        $category = category::all()[2];
        $id = Auth::user()->id;

        $blog = new bLog;
        $blog->id = $id;
        $blog->title = $request->Tieude;
        $blog->content = $request->Noidung;
        $blog->description = $request->Tomtat;

        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '_' . $name;
            while (file_exists('upload/blog/' . $Hinh)) {
                $Hinh = Str::random(4) . "_" . $name;
            }
            $file->move('upload/blog', $Hinh);
            $blog->Hinh = $Hinh;
        }

        $blog->save();
        $BL_cpn = DB::table('blog')
            ->where('id', $id)
            ->paginate(4);

        return view('Pages.Company.Blog', ['category' => $category, 'BL_cpn' => $BL_cpn])->with('success', 'Bạn thêm bài đăng thành công');
    }

    public function getUpdateBlog($id_blog)
    {
        $category = category::all()[2];
        $BL_cpn = DB::table('blog')->paginate(4);

        $blog = blog::find($id_blog);

        return view('Pages.Company.updateBlog', ['blog' => $blog, 'category' => $category, 'BL_cpn' => $BL_cpn]);
    }

    public function delBlog($id_blog)
    {
        $category = category::all()[2];
        $blog = blog::find($id_blog);
        if ($blog->Hinh != NULL) unlink('upload/blog/' . $blog->Hinh);
        $blog->delete();
        $id = Auth::user()->id;
        $BL_cpn = DB::table('blog')
            ->where('id', $id)
            ->paginate(4);
        return view('Pages.Company.Blog', ['category' => $category, 'BL_cpn' => $BL_cpn])->with('success', 'Bạn xoá bài đăng thành công');
    }

    public function getDS1(Request $request)
    {
        $category = category::all()[4];
        $company = company::all();

        if ($request->search) {
            $search = $request->search;
            $data = DB::table('students')
                ->join('user', 'user.id', '=', 'students.id')
                ->join('fk_skill', 'fk_skill.student_id', '=', 'students.id')
                ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
                ->select('user.id as id1', 'user.name as name1', 'user.email as email1', 'students.mobile as mobile1', 'students.department as department1', 'students.gpa as gpa1')
                ->where('user.name', 'like', "%$search%")
                ->orwhere('email', 'like', "%$search%")
                ->orwhere('mobile', 'like', "%$search%")
                ->orwhere('department', 'like', "%$search%")
                ->orwhere('gpa', 'like', "%$search%")
                ->orwhere('skill.name', 'like', "%$search%")
                ->orderBy('id1')
                ->distinct()
                ->paginate(2);
            //dd($data);
        } elseif ($request->name) {
            $filter = $request->name;
            $data = DB::table('students')
                ->join('user', 'user.id', '=', 'students.id')
                ->select('user.id as id1', 'user.name as name1', 'user.email as email1', 'students.mobile as mobile1', 'students.department as department1', 'students.gpa as gpa1')
                ->where('user.id', $filter)
                ->paginate(2);
        } elseif ($request->email) {
            $filter = $request->email;
            $data = DB::table('students')
                ->join('user', 'user.id', '=', 'students.id')
                ->select('user.id as id1', 'user.name as name1', 'user.email as email1', 'students.mobile as mobile1', 'students.department as department1', 'students.gpa as gpa1')
                ->where('user.id', $filter)
                ->paginate(2);
        } elseif ($request->mobile) {
            $filter = $request->mobile;
            $data = DB::table('students')
                ->join('user', 'user.id', '=', 'students.id')
                ->select('user.id as id1', 'user.name as name1', 'user.email as email1', 'students.mobile as mobile1', 'students.department as department1', 'students.gpa as gpa1')
                ->where('mobile', $filter)
                ->paginate(2);
        } elseif ($request->department) {
            $filter = $request->department;
            $data = DB::table('students')
                ->join('user', 'user.id', '=', 'students.id')
                ->select('user.id as id1', 'user.name as name1', 'user.email as email1', 'students.mobile as mobile1', 'students.department as department1', 'students.gpa as gpa1')
                ->where('department', $filter)
                ->paginate(2);
        } elseif ($request->gpa) {
            $filter = $request->gpa;
            $data = DB::table('students')
                ->join('user', 'user.id', '=', 'students.id')
                ->select('user.id as id1', 'user.name as name1', 'user.email as email1', 'students.mobile as mobile1', 'students.department as department1', 'students.gpa as gpa1')
                ->where('gpa', $filter)
                ->paginate(2);
        } elseif ($request->skill) {

            $filter = $request->skill;
            $data = DB::table('students')
                ->join('user', 'user.id', '=', 'students.id')
                ->join('fk_skill', 'fk_skill.student_id', '=', 'students.id')
                ->select('user.id as id1', 'user.name as name1', 'user.email as email1', 'students.mobile as mobile1', 'students.department as department1', 'students.gpa as gpa1')
                ->where('fk_skill.skill_id', $filter)
                ->orderBy('id1')
                ->paginate(2);
        } else {
            $data = DB::table('students')
                ->join('user', 'user.id', '=', 'students.id')
                ->select('user.id as id1', 'user.name as name1', 'user.email as email1', 'students.mobile as mobile1', 'students.department as department1', 'students.gpa as gpa1')
                ->paginate(2);
        }

        $user = DB::table('user')
            ->join('students', 'user.id', '=', 'students.id')
            ->select("user.*")
            ->get();

        $user1 = DB::table('user')
            ->join('students', 'user.id', '=', 'students.id')
            ->orderBy('name', 'asc')
            ->get();

        $user2 = DB::table('user')
            ->join('students', 'user.id', '=', 'students.id')
            ->orderBy('email', 'asc')
            ->get();

        $students = DB::table('students')
            ->select("*")
            ->get();

        $skill1 = DB::table('fk_skill')
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->select('fk_skill.student_id as student_id1', 'skill.name as name1')
            ->get();

        $skill = skill::all();

        return view('Pages.Company.DS1', ['user' => $user, 'skill' => $skill, 'skill1' => $skill1, 'user1' => $user1, 'user2' => $user2, 'students' => $students, 'data' => $data, 'category' => $category]);
    }

    public function getProfile($id)
    {
        $kcheck = [];
        $skill_all = Fk_Skill::select('skill.name')
            ->join('skill', 'skill.id', '=', 'fk_skill.skill_id')
            ->join('company', 'company.id', '=', 'fk_skill.company_id')
            ->where(['fk_skill.company_id' => $id])
            ->get()->toArray();
        foreach ($skill_all as $k) {
            array_push($kcheck, $k['name']);
        }
        $skill = skill::all();
        $company = company::find($id);
        $category = category::all()[1];
        if ($company != null)

            return view('Pages.Company.Profile', ['company' => $company, 'category' => $category, 'skill' => $skill, 'skillcheck' => $kcheck]);
        else return view('Pages.Company.Profile2', ['category' => $category, 'skill' => $skill]);
    }
}
