<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SendResetLinkRequest;

class ForgotPassword extends Controller
{
    public function showResetForm()
    {
        return view('Password.Email');
    }

    public function sendResetLinkEmail(SendResetLinkRequest $request)
    {
        $user = Users::where('email', $request->email)->first();
        if ($user) {
            // Tạo mã reset_code ngẫu nhiên
            $code = rand(100000, 999999);

            DB::table('password_resets')->insert([
                'email' => $user->email,
                'reset_code' => $code,
                'created_at' => now(),
            ]);

            // Gửi email chứa mã OTP
            Mail::to($user->email)->send(new ResetPasswordMail($code));

            return redirect()->route('password.change')->with('status', 'Đã gửi mã thay đổi mật khẩu đến email của bạn!');
        }

        return back()->withErrors(['email' => 'Email không tồn tại trong hệ thống.']);
    }




    public function showNewPasswordForm()
    {
        // Kiểm tra xem có mã reset trong session không
        if (!session::has('reset_code') || !session::has('reset_email')) {
            return redirect()->route('password.request')->withErrors(['email' => 'Mã reset không hợp lệ.']);
        }

        // Lấy email từ session
        $email = session::get('reset_email');

        return view('Password.reset', compact('email'));  // Pass email vào view nếu cần
    }

    public function reset(ResetPasswordRequest $request)
    {
        // Tìm mã OTP trong bảng password_resets
        $passwordReset = DB::table('password_resets')
            ->where('reset_code', $request->reset_code)
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['reset_code' => 'Mã OTP không hợp lệ.']);
        }

        $user = Users::where('email', $passwordReset->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email không tồn tại trong hệ thống.']);
        }

        if ($passwordReset->email !== $user->email) {
            return back()->withErrors(['email' => 'Email không hợp lệ.']);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        DB::table('password_resets')->where('reset_code', $request->reset_code)->delete();

        return redirect()->route('login')->with('status', 'Mật khẩu của bạn đã được thay đổi thành công!');
    }
}
