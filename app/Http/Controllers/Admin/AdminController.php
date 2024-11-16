<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
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
}
