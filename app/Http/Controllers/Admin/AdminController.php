<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRegistrationRequest;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Company;
use App\Models\Messenger;
use App\Models\Users;
use App\Models\Blog;
use App\Models\ThreadMessenger;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function adminHome()
    {
        $usersCount = Users::count();
        $blogsCount = Blog::count();
        $messagesCount = Messenger::count();
        $feedbacksCount = Feedback::count();
        $users = Users::all();

        return view('Admin.home', compact('usersCount', 'blogsCount', 'messagesCount', 'feedbacksCount', 'users'));
    }

    public function loginAdmin()
    {
        return view('Admin.Login_admin');
    }

    public function postLoginAdmin(AdminLoginRequest $request)
    {
        if (Auth::guard('adm')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin-home')->with('success', 'Chào mừng quay lại!');
        } else {
            return back()->withErrors(['message' => 'Thông tin đăng nhập không chính xác']);
        }
    }

    public function registrationAdmin()
    {
        return view('Admin.registration_admin1');
    }

    public function postRegistrationAdmin(AdminRegistrationRequest $request)
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

    public function user()
    {
        $users = Users::all();
        return view('Admin.user', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        Messenger::where('fk_user_id', $id)->delete();
        Blog::where('user_id', $id)->delete();

        $user = Users::find($id);
        if ($user) {
            if ($user->category == 3) {
                Student::find($id)?->delete();
                ThreadMessenger::where('user_student', $id)->delete();
            } elseif ($user->category == 2) {
                Teacher::find($id)?->delete();
                ThreadMessenger::where('user_teacher', $id)->delete();
            } else {
                Company::find($id)?->delete();
                ThreadMessenger::where('user_company', $id)->delete();
            }

            $user->delete();
            return redirect()->back()->with('success', 'Xóa người dùng thành công');
        }

        return redirect()->back()->with('error', 'Không tìm thấy người dùng');
    }
}
