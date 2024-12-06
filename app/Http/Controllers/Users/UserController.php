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
use App\Http\Requests\RequestPassword;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RequestRegistration;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Login()
    {
        return view('Login.loginCustomer');
    }


    public function post_login(LoginRequest $request)  // Sử dụng LoginRequest để tự động xác thực
    {
        Auth::logout();

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Định nghĩa các route điều hướng tùy thuộc vào category của người dùng
            $routes = [
                '1' => 'company-home',
                '2' => 'teacher-home',
                '3' => 'student-home',
            ];

            // Kiểm tra category của người dùng và điều hướng đến route tương ứng
            if (isset($routes[$user->category])) {
                return redirect()->route($routes[$user->category])->with('success', 'Chào mừng quay trở lại');
            }
        }

        return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác!');
    }


    public function showChangePasswordForm()
    {
        return view('Login.change_password');
    }


    public function resetPassword(Request $request)
    {
        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->current_password, Auth::users()->password)) {
            return back()->with('error', 'Mật khẩu hiện tại không đúng.');
        }

        $request->validate([
            'new_password' => [
                'required',
                'confirmed',
                'min:8', // Tối thiểu 8 ký tự
                'regex:/[A-Z]/', // Ít nhất 1 ký tự in hoa
                'regex:/[a-z]/', // Ít nhất 1 ký tự thường
                'regex:/[0-9]/', // Ít nhất 1 số
                'regex:/[@$!%*?&]/', // Ít nhất 1 ký tự đặc biệt
            ],
        ], [
            'new_password.required' => 'Mật khẩu mới là bắt buộc.',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password.regex' => 'Mật khẩu mới phải có ít nhất 1 ký tự in hoa, 1 ký tự đặc biệt, và 1 chữ số.',
        ]);

        DB::table('user')
            ->where('id', Auth::id()) // Chỉ định người dùng hiện tại
            ->update([
                'password' => Hash::make($request->new_password) // Mã hóa mật khẩu mới
            ]);

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }





    public function registration()
    {
        return view('Registration.registerCustomer');
    }

    public function post_registration(RequestRegistration $requestRegistration)
    {

        $requestRegistration->merge(['password' => bcrypt($requestRegistration->password)]);
        if (Users::create($requestRegistration->all())) {
            return redirect()->route('login')->with('success', 'Đăng kí thành công');;
        } else {
            return redirect()->back()->with('danger', "Đăng kí thất bại");
        }
    }

    public function shareViews($view)
    {
        $id = Auth::user()->id;
        $category = Auth::user()->category;
        if ($category == 1) {
            $user = company::find($id);
        } elseif ($category == 2) {
            $user = teacher::find($id);
        } else $user = student::find($id);
        $hinh = $user->Hinh;
        $view->with('user', $hinh);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }

    public function updatePassword()
    {
        $category = category::all()[6];
        return view('Password/updatePassword', ['category' => $category]);
    }


    public function saveUpdatePassword(RequestPassword $requestPassword)
    {

        $user = users::find($requestPassword->id);

        if (Hash::check($requestPassword->password_old, $user->password)) {
            $user->password = bcrypt($requestPassword->password);
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
        return redirect()->back()->with('danger', "Mật khẩu cũ không đúng");
    }

    public function postHelp(FeedbackRequest $request)
    {
        $category = category::all()[7];
        $feedback = new feedback;
        $feedback->id_user = $request->id_user;
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->content = $request->content;
        $feedback->title = $request->title;
        $feedback->save();
        return redirect()->back()->with('success', "Cảm ơn bạn đã viết phản hồi!");
    }
    public function getHelp()
    {
        $category = category::all()[7];
        return view('Pages.Help', ['category' => $category]);
    }
}
