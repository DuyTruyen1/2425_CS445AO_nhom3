<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required', // Loại bỏ yêu cầu về độ dài và ký tự đặc biệt
        ];
    }

    /**
     * Tùy chỉnh thông báo lỗi nếu có.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
            'password.required' => 'Mật khẩu không được để trống.', // Chỉ thông báo khi mật khẩu trống
        ];
    }
}
