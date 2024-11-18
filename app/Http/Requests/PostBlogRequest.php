<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostBlogRequest extends FormRequest
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
            'Tieude' => 'required',
            'Noidung' => 'required',
            'Tomtat' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Tieude.required' => 'Bạn chưa nhập tiêu đề',
            'Noidung.required' => 'Bạn chưa nhập nội dung',
            'Tomtat.required' => 'Bạn chưa nhập tóm tắt'
        ];
    }
}
