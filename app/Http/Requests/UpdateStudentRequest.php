<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có quyền gửi yêu cầu này không.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Đảm bảo rằng tất cả người dùng đều có quyền gửi yêu cầu này.
    }

    /**
     * Các quy tắc xác thực.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'studentCode' => 'required|string|max:50|unique:students,studentCode,' . $this->route('id'), // Kiểm tra mã sinh viên không trùng lặp.
            'birth' => 'required|date|before:today', // Kiểm tra ngày sinh nhỏ hơn hôm nay.
            'mobile' => 'required|string|min:10', // Kiểm tra số điện thoại, ít nhất 10 ký tự.
            'department' => 'required|string|max:255', // Kiểm tra khoa không để trống và có độ dài tối đa.
            'major' => 'required|string|max:255', // Kiểm tra ngành học không để trống và có độ dài tối đa.
            'level' => 'required|string|max:50', // Kiểm tra cấp độ không để trống và có độ dài tối đa.
            'trainingSystem' => 'required|string|max:255', // Kiểm tra hệ đào tạo không để trống và có độ dài tối đa.
            'trainingProgram' => 'required|string|max:255', // Kiểm tra chương trình đào tạo không để trống và có độ dài tối đa.
            'forte' => 'nullable|string|max:255', // Kiểm tra kỹ năng, có thể bỏ trống và có độ dài tối đa.
            'gpa' => 'nullable|numeric|between:0,4', // Kiểm tra GPA nằm trong khoảng từ 0 đến 4.
            'favourite' => 'nullable|string|max:255', // Kiểm tra sở thích, có thể bỏ trống và có độ dài tối đa.
            'nation' => 'required|string|max:255', // Kiểm tra quốc gia không để trống và có độ dài tối đa.
            'city' => 'required|string|max:255', // Kiểm tra thành phố không để trống và có độ dài tối đa.
            'district' => 'required|string|max:255', // Kiểm tra quận/huyện không để trống và có độ dài tối đa.
            'commune' => 'required|string|max:255', // Kiểm tra xã/phường không để trống và có độ dài tối đa.
            'street' => 'required|string|max:255', // Kiểm tra đường không để trống và có độ dài tối đa.
            'homeNumber' => 'nullable|string|max:50', // Kiểm tra số nhà, có thể bỏ trống và có độ dài tối đa.
            'prize' => 'nullable|string|max:255', // Kiểm tra giải thưởng, có thể bỏ trống và có độ dài tối đa.
            'numberCMT' => 'required|string|min:10', // Kiểm tra số chứng minh thư, ít nhất 10 ký tự.
            'Hinh' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Kiểm tra tệp hình ảnh có định dạng đúng và kích thước không quá 2MB.
        ];
    }

    /**
     * Các thông báo lỗi cho các quy tắc xác thực.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'studentCode.required' => 'Mã sinh viên là bắt buộc.',
            'studentCode.unique' => 'Mã sinh viên đã tồn tại.',
            'birth.required' => 'Ngày sinh là bắt buộc.',
            'birth.before' => 'Ngày sinh phải là ngày nhỏ hơn ngày hôm nay.',
            'mobile.required' => 'Số điện thoại là bắt buộc.',
            'mobile.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            'department.required' => 'Khoa là bắt buộc.',
            'major.required' => 'Ngành học là bắt buộc.',
            'level.required' => 'Cấp độ là bắt buộc.',
            'trainingSystem.required' => 'Hệ đào tạo là bắt buộc.',
            'trainingProgram.required' => 'Chương trình đào tạo là bắt buộc.',
            'forte.max' => 'Kỹ năng không được quá 255 ký tự.',
            'gpa.required' => 'Điểm trung bình là bắt buộc.',
            'gpa.numeric' => 'Điểm trung bình phải là một số.',
            'gpa.between' => 'Điểm trung bình phải nằm trong khoảng từ 0 đến 4.',
            'favourite.max' => 'Sở thích không được quá 255 ký tự.',
            'nation.required' => 'Quốc gia là bắt buộc.',
            'city.required' => 'Tỉnh/Thành phố là bắt buộc.',
            'district.required' => 'Quận/Huyện là bắt buộc.',
            'commune.required' => 'Xã là bắt buộc.',
            'street.required' => 'Đường là bắt buộc.',
            'homeNumber.max' => 'Số nhà không được quá 50 ký tự.',
            'prize.max' => 'Giải thưởng không được quá 255 ký tự.',
            'numberCMT.required' => 'Số chứng minh thư là bắt buộc.',
            'numberCMT.min' => 'Số chứng minh thư phải có ít nhất 10 ký tự.',
            'Hinh.image' => 'Tệp hình phải là ảnh.',
            'Hinh.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg, png.',
            'Hinh.max' => 'Hình ảnh không được quá 2MB.',
        ];
    }
}
