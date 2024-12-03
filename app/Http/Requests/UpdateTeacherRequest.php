<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'age' => 'required|integer|min:18',
            'mobile' => 'required|digits:10',       // Kiểm tra số điện thoại có đúng 10 chữ số
            'department' => 'required',  // Kiểm tra phòng ban là chuỗi và có độ dài tối đa 255 ký tự
            'major' => 'required|string|max:255',        // Kiểm tra chuyên ngành
            'numberCMT' => 'required|string|max:20',    // Kiểm tra số CMND có độ dài tối đa 20 ký tự
            'office' => 'required|string|max:255',      // Kiểm tra văn phòng
            'position' => 'required|string|max:255',
            // // 'offer' => 'required|numeric',              // Kiểm tra mức lương
            'topicResearch' => 'required|string|max:100',  // Kiểm tra chủ đề nghiên cứu (nếu có)
            'numbers' => 'required',               // Kiểm tra số lượng
            'bonus' => 'required',
            'startDayOffer' => 'required|date|after_or_equal:today', // Quy tắc thời gian tuyển dụng phải lớn hơn hoặc bằng thời gian hiện tại
            'endDayOffer' => 'required|date|after_or_equal:startDayOffer',           // Kiểm tra tiền thưởng
            // 'startDayOffer' => 'required|date',           // Kiểm tra ngày bắt đầu là ngày hợp lệ
            // 'endDayOffer' => 'required|date|after:startDayOffer',  // Kiểm tra ngày kết thúc phải sau ngày bắt đầu
            // 'Hinh' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            // 'id.required' => 'ID giáo viên là bắt buộc.',
            // 'id.exists' => 'ID giáo viên không tồn tại.',
            'age.required' => 'Tuổi là bắt buộc.',
            'age.integer' => 'Tuổi phải là số nguyên.',
            'age.min' => 'Tuổi phải lớn hơn 18',
            'mobile.required' => 'Số điện thoại là bắt buộc.',
            'mobile.digits' => 'Số điện thoại phải có 10 chữ số.',
            'department.required' => 'Phòng ban là bắt buộc.',
            'major.required' => 'Chuyên ngành là bắt buộc.',
            'numberCMT.required' => 'Số CMND là bắt buộc.',
            'numberCMT.max' => 'Số CMND không được vượt quá 20 ký tự.',
            'position.required' => 'Vị trí / chức vụ là bắt buộc.',
            'office.required' => 'Văn phòng là bắt buộc.',
            'topicResearch.required' => 'Chủ đề nghiên cứu bắt buộc phải nhập.',
            'topicResearch.max' => 'Chủ đề nghiên cứu không được vượt quá 100 ký tự.',
            'numbers.required' => 'Số lượng là bắt buộc',

            'bonus.required' => 'Đãi ngộ là bắt buộc',
            'startDayOffer.required' => 'Ngày bắt đầu là bắt buộc',
            'endDayOffer.required' => 'Ngày kết thúc là bắt buộc',
            'startDayOffer.after_or_equal' => 'Ngày bắt đầu tuyển dụng phải lớn hơn hoặc bằng ngày hiện tại.',
            'endDayOffer.after_or_equal' => 'Ngày kết thúc tuyển dụng phải lớn hơn ngày bắt đầu tuyển dụng.',
            // 'startDayOffer.required' => 'Ngày bắt đầu là bắt buộc.',
            // 'endDayOffer.required' => 'Ngày kết thúc là bắt buộc.',
            // 'endDayOffer.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
            // 'Hinh.mimes' => 'Chỉ chấp nhận file hình ảnh có định dạng jpg, jpeg, png.',
            // 'Hinh.max' => 'File hình ảnh không được vượt quá 2MB.',


        ];
    }
}
