<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Xác thực người dùng có quyền sử dụng Form Request.
     */
    public function authorize()
    {
        return true; // Cho phép tất cả người dùng
    }

    /**
     * Các quy tắc xác thực.
     */
    public function rules()
    {
        $id = $this->route('id'); // Lấy ID từ route

        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:users,email,' . $id,
            'password' => [
                'required',              // Mật khẩu là bắt buộc
                'min:8',
                'regex:/[A-Z]/',         // Ít nhất 1 chữ cái in hoa
                'regex:/[a-z]/',         // Ít nhất 1 chữ cái thường
                'regex:/[0-9]/',         // Ít nhất 1 chữ số
                'regex:/[@$!%*?&]/',     // Ít nhất 1 ký tự đặc biệt
            ],
        ];
    }

    /**
     * Thông báo lỗi tùy chỉnh.
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu phải có ít nhất 1 chữ cái in hoa, 1 ký tự đặc biệt và 1 chữ số.',
        ];
    }
}
