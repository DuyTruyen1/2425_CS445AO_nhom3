<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppointmentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date|after_or_equal:now',
            'end_time' => 'required|date|after:start_time',
            'meeting_url' => 'required|url|regex:/^(https?):\/\/[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+(:\d+)?(\/[^\s]*)?$/', // Đảm bảo URL hợp lệ
            'teacher_id' => 'required|exists:teacher,id',
            'company_id' => 'required|exists:company,id',
            'student_id' => 'required|exists:students,id',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'description.required' => 'Mô tả là bắt buộc.',
            'start_time.required' => 'Thời gian bắt đầu là bắt buộc.',
            'start_time.after_or_equal' => 'Thời gian bắt đầu phải là một ngày trong tương lai.',
            'end_time.required' => 'Thời gian kết thúc là bắt buộc.',
            'end_time.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'meeting_url.required' => 'URL cuộc họp là bắt buộc.',
            'meeting_url.url' => 'URL cuộc họp phải là một đường dẫn hợp lệ.',
            'meeting_url.regex' => 'URL cuộc họp phải có định dạng hợp lệ (ví dụ: http://example.com).',
            'teacher_id.required' => 'Giáo viên là bắt buộc.',
            'company_id.required' => 'Công ty là bắt buộc.',
            'student_id.required' => 'Sinh viên là bắt buộc.',
        ];
    }
}
