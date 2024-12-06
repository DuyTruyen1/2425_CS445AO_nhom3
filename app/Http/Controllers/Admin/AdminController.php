<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRegistrationRequest;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\UpdateUserRequest;
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
        $role = Users::select('category')->get();


        // Thêm thông báo vào session
        return view('Admin.home', compact('usersCount', 'blogsCount', 'messagesCount', 'feedbacksCount', 'users', 'role'))
            ->with('success', 'Chào mừng quay trở lại!');
    }

    public function loginAdmin()
    {
        // Trả về view login và truyền thông báo vào session
        return view('Admin.Login_admin')->with('success', 'Đăng xuất quản trị viên thành công!');
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
        // Hiển thị view đăng ký với thông báo lỗi qua Toastr
        return view('Admin.registration_admin1')->with('error', 'Vui lòng đăng ký để tiếp tục.');
    }

    public function postRegistrationAdmin(AdminRegistrationRequest $request)
    {
        // Mã hóa mật khẩu trước khi lưu
        $request->merge(['password' => bcrypt($request->password)]);

        // Tạo tài khoản admin
        $admin = Admin::create($request->all());

        // Kiểm tra nếu tạo thành công
        if ($admin) {
            // Thêm thông báo thành công vào session và redirect tới trang login
            return redirect()->route('login-admin')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập');
        } else {
            // Thêm thông báo lỗi vào session và quay lại trang đăng ký
            return back()->withErrors(['message' => 'Thông tin đăng ký không chính xác']);
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

    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('Admin.edit', compact('user'));
    }

    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'Người dùng đã được xóa!');
    }


    public function updateUser(UpdateUserRequest $request, $id)
    {
        $user = Users::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users')->with('success', 'Thông tin người dùng đã được cập nhật thành công!');
    }


    public function destroyAcc($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'Người dùng đã bị xóa thành công.');
    }

    public function Logout_admin(Request $request)
    {
        // Đăng xuất admin
        Auth::guard('adm')->logout();

        // Xóa tất cả session liên quan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Chuyển hướng về trang đăng nhập admin
        return redirect()->route('login-admin')->with('success', 'Bạn đã đăng xuất thành công!');
    }
}
