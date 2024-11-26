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
            'password' => 'required|min:8|regex:/[A-Z]/|regex:/[@$!%*?&]/', // Cập nhật quy tắc password
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
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một ký tự in hoa và một ký tự đặc biệt.',
        ];
    }
}
