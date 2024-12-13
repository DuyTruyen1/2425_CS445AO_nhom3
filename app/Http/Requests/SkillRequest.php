<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:skill,name', // Kiểm tra trường 'name' là bắt buộc và duy nhất trong bảng 'skills'
        ];
    }

    /**
     * Tùy chọn: Các thông báo lỗi tùy chỉnh.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên kỹ năng là bắt buộc.',
            'name.string' => 'Tên kỹ năng phải là một chuỗi ký tự.',
            'name.max' => 'Tên kỹ năng không được vượt quá 255 ký tự.',
            'name.unique' => 'Tên kỹ năng đã tồn tại.',
        ];
    }
}
