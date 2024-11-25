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
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên',
            'email.required' => 'Bạn phải nhập email',
            'password.required' => 'Mật khẩu không được để trống',
            'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
            'confirm_password.same' => 'Mật khẩu xác nhận không đúng',
            'category.required' => 'Trường này không được để trống',
        ];
    }
}
