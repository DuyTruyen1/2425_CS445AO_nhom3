<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearchTopicRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép gửi request
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|exists:teacher,id',
            'allowance' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'max_students' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.required' => 'Tiêu đề là bắt buộc.',
            'teacher_id.required' => 'Giáo viên là bắt buộc.',
            'teacher_id.exists' => 'Giáo viên không tồn tại trong hệ thống.',
            'allowance.numeric' => 'Trợ cấp phải là số.',
            'start_date.date' => 'Ngày bắt đầu phải là ngày hợp lệ.',
            'end_date.date' => 'Ngày kết thúc phải là ngày hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'max_students.required' => 'Số lượng sinh viên tối đa là bắt buộc.',
            'max_students.integer' => 'Số lượng sinh viên phải là một số nguyên.',
            'max_students.min' => 'Số lượng sinh viên tối đa phải lớn hơn hoặc bằng 1.',
        ];
    }
}
