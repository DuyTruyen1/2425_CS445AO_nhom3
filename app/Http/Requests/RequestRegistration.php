<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegistration extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8', // ít nhất 8 ký tự
                'regex:/[A-Z]/', // ít nhất một ký tự in hoa
                'regex:/[@$!%*?&#]/', // ít nhất một ký tự đặc biệt
            ],
            'confirm_password' => 'required|same:password',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên',
            'email.required' => 'Bạn phải nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một ký tự in hoa và một ký tự đặc biệt',
            'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
            'confirm_password.same' => 'Mật khẩu xác nhận không đúng',
            'category.required' => 'Trường này không được để trống',
        ];
    }
}
