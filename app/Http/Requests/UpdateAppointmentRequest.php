<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Trả về true nếu người dùng có quyền thực hiện request này
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'meeting_url' => 'nullable|url',
            'teacher_id' => 'nullable|exists:teacher,id',
            'company_id' => 'nullable|exists:company,id',
            'student_id' => 'nullable|exists:students,id',
        ];
    }
}
