<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cho phép tất cả người dùng thực hiện request này
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // Kiểm tra name là bắt buộc và không quá 255 ký tự
            'email' => 'required|email|max:255', // Kiểm tra email hợp lệ và không quá 255 ký tự
            'content' => 'required|string|max:1000', // Kiểm tra content là bắt buộc và không quá 1000 ký tự
            'title' => 'required|string|max:255', // Kiểm tra title là bắt buộc và không quá 255 ký tự
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'content.required' => 'Nội dung phản hồi là bắt buộc.',
            'title.required' => 'Tiêu đề phản hồi là bắt buộc.',
        ];
    }
}
