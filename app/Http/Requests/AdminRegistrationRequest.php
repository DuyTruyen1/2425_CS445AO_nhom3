<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegistrationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:admin,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8', // Ít nhất 8 ký tự
                'regex:/[A-Z]/', // Ít nhất 1 ký tự in hoa
                'regex:/[!@#$%^&*(),.?":{}|<>]/', // Ít nhất 1 ký tự đặc biệt
                'confirmed', // Kiểm tra xác nhận mật khẩu

            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại, vui lòng chọn email khác.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất 1 ký tự in hoa và 1 ký tự đặc biệt.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.', // Thêm thông báo lỗi khi mật khẩu xác nhận không khớp
        ];
    }
}
