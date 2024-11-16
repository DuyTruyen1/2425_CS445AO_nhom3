<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSkillRequest extends FormRequest
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
        $id = $this->route('id'); // Lấy ID từ route

        return [
            'name' => 'required|unique:Skill,name,' . $id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được trống',
            'name.unique' => 'Tên danh đã tồn tại',
        ];
    }
}
