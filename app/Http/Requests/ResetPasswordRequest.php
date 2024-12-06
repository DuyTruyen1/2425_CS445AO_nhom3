<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',  // Kiểm tra email hợp lệ
            'reset_code' => 'required|exists:password_resets,reset_code',  // Kiểm tra mã OTP
            'password' => [
                'required',
                'confirmed',
                'min:8',  // Mật khẩu ít nhất 8 ký tự
                'regex:/[A-Z]/',  // Ít nhất 1 ký tự in hoa
                'regex:/[0-9]/',  // Ít nhất 1 ký tự số
                'regex:/[@$!%*?&]/',  // Ít nhất 1 ký tự đặc biệt
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'reset_code.required' => 'Mã OTP là bắt buộc.',
            'reset_code.exists' => 'Mã OTP không hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu phải có ít nhất 1 ký tự in hoa, 1 ký tự số và 1 ký tự đặc biệt.',
        ];
    }
}
