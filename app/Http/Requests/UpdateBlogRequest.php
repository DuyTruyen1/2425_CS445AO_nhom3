<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:200',
            'content' => 'required',
            'description' => 'nullable|max:255',
            'Hinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Chỉ cho phép file ảnh, tối đa 2MB
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'title.max' => 'Tiêu đề không được vượt quá 200 ký tự.',
            'content.required' => 'Nội dung không được để trống.',
            'description.max' => 'Mô tả không được vượt quá 255 ký tự.',
            'Hinh.image' => 'Hình ảnh phải là định dạng file hợp lệ.',
            'Hinh.mimes' => 'Chỉ chấp nhận các định dạng: jpeg, png, jpg, gif.',
            'Hinh.max' => 'Hình ảnh không được vượt quá 2MB.',
        ];
    }
}
