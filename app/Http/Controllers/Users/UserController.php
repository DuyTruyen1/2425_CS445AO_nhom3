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
use App\Http\Requests\RequestRegistration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Login()
    {
        return view('Login.loginCustomer');
    }


    public function post_login(Request $request)
    {
        // Đăng xuất người dùng trước khi đăng nhập mới
        Auth::logout();

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($request->only('email', 'password'))) {
            // Kiểm tra category của người dùng sau khi đăng nhập thành công
            $user = Auth::user();

            $routes = [
                '1' => 'company-home',
                // '2' => 'teacher-home ',
                // '3' => 'student-home',
            ];

            // Kiểm tra xem category có hợp lệ không, nếu hợp lệ sẽ chuyển hướng đến trang tương ứng
            if (isset($routes[$user->category])) {
                return redirect()->route($routes[$user->category])->with('success', 'Chào mừng quay trở lại');
            }
        }

        // Nếu đăng nhập thất bại
        return redirect()->back()->with('danger', "Đăng nhập thất bại");
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

    public function postHelp(Request $request)
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
