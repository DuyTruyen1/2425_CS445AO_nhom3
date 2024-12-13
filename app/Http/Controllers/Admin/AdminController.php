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
use App\Models\Chat;
use App\Models\Messenger;
use App\Models\Users;
use App\Models\Blog;
use App\Models\ThreadMessenger;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\ResearchTopic;

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

    public function chats()
    {
        $LoggedAdminInfo = session('LoggedAdminInfo');

        if (!$LoggedAdminInfo) {
            return redirect()->route('login-admin')->with('fail', 'You must be logged in to access the dashboard');
        }

        $admin = Admin::find($LoggedAdminInfo);

        if (!$admin) {
            return redirect()->route('login-admin')->with('fail', 'Invalid admin credentials');
        }

        $chats = Chat::with([
            'senderProfilee',
            'receiverProfilee',
            'senderSellerProfile',
            'receiverSellerProfile'
        ])
            ->where('sender_id', $admin->id)
            ->orWhere('receiver_id', $admin->id)
            ->get();

        // Kết hợp kết quả và loại bỏ các cuộc trò chuyện trùng lặp
        $allChats = $chats->map(function ($chat) use ($admin) {
            if ($chat->sender_id == $admin->id) {
                if ($chat->receiverProfilee) {
                    $chat->user_id = $chat->receiver_id;
                    $chat->profile = $chat->receiverProfilee;
                } else {
                    $chat->user_id = $chat->receiver_id;
                    $chat->profile = $chat->receiverSellerProfile;
                }
            } else {
                if ($chat->senderProfilee) {
                    $chat->user_id = $chat->sender_id;
                    $chat->profile = $chat->senderProfilee;
                } else {
                    $chat->user_id = $chat->sender_id;
                    $chat->profile = $chat->senderSellerProfile;
                }
            }
            return $chat;
        })->unique('user_id')->values();

        $users = Users::all();
        return view('admin.chats', [
            'LoggedAdminInfo' => $admin,
            'chats' => $allChats,
            'users' => $users
        ]);
    }



    public function loginAdmin()
    {
        // Trả về view login và truyền thông báo vào session
        return view('Admin.Login_admin')->with('success', 'Đăng xuất quản trị viên thành công!');
    }


    public function postLoginAdmin(AdminLoginRequest $request)
    {
        if (Auth::guard('adm')->attempt($request->only('email', 'password'))) {
            $admin = Auth::guard('adm')->user();
            session(['LoggedAdminInfo' => $admin->id]);

            return redirect()->route('admin-home')->with('success', 'Chào mừng quay lại!');
        } else {
            return back()->withErrors(['message' => 'Thông tin đăng nhập không chính xác']);
        }
    }



    public function registrationAdmin()
    {
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


    public function logoutAdmin(Request $request)
    {
        // Xoá toàn bộ session
        $request->session()->flush();

        // Đăng xuất admin
        Auth::guard('adm')->logout();

        // Tải lại trang login
        return redirect()->route('login-admin')->with('success', 'Bạn đã đăng xuất thành công!');
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

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login-admin')->with('success', 'Bạn đã đăng xuất thành công!');
    }

    public function job()
    {
        $jobs = Job::orderBy('id', 'asc')->get();
        return view('admin.jobs', compact('jobs'));
    }

    public function research()
    {
        $researchTopics = ResearchTopic::orderBy('id', 'asc')->get();
        return view('admin.research', compact('researchTopics'));
    }
}
