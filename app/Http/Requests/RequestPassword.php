<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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
            'id' => 'required|exists:user,id', // Kiểm tra id có tồn tại trong bảng users
            'password_old' => 'required|string',
            'password' => [
                'required',
                'string',
                'min:8', // Mật khẩu mới ít nhất 8 ký tự
                'regex:/[A-Z]/', // Mật khẩu mới phải chứa ít nhất 1 ký tự in hoa
                'regex:/[\W_]/', // Mật khẩu mới phải chứa ít nhất 1 ký tự đặc biệt
                'confirmed', // Xác nhận mật khẩu (có trường password_confirmation)
            ],
            'pw_confirm' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password_old.required' => 'Yêu cầu nhập mật khẩu cũ.',
            'password.required' => 'Bạn phải nhập mật khẩu mới .',
            'password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu mới phải chứa ít nhất 1 ký tự in hoa và 1 ký tự đặc biệt.',
            'pw_confirm.required' => 'Trường này không được để trống',
            'pw_confirm.same' => 'Mật khẩu xác nhận không đúng',
        ];
    }
}
