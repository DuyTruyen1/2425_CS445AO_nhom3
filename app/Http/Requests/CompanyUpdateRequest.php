<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'address' => 'required|string|max:255', // Kiểm tra địa chỉ không trống và là chuỗi
            'mobile' => 'required|numeric|digits_between:10,11', // Kiểm tra số điện thoại là kiểu số
            'fax' => 'required|string|max:50|regex:/^[0-9]+$/', // Kiểm tra fax (nếu có) là chuỗi
            'yearEstablish' => 'required|date_format:Y', // Kiểm tra năm thành lập là năm hợp lệ
            'offer' => 'nullable|string|max:255', // Kiểm tra offer (nếu có) là chuỗi
            'salary' => 'required|numeric', // Kiểm tra lương (nếu có) là số
            'numbers' => 'required|numeric', // Kiểm tra số lượng (nếu có) là số
            'bonus' => 'required', // Kiểm tra thưởng (nếu có) là số
            'startDayOffer' => 'required|date|after_or_equal:today', // Quy tắc thời gian tuyển dụng phải lớn hơn hoặc bằng thời gian hiện tại
            'endDayOffer' => 'required|date|after_or_equal:startDayOffer', // Quy tắc ngày kết thúc tuyển dụng phải lớn hơn ngày bắt đầu tuyển dụng
            'Hinh' => 'nullable|mimes:jpg,png,jpeg|max:2048', // Kiểm tra file hình ảnh (nếu có)
            // 'skill_id' => 'nullable|array', // Kiểm tra kỹ năng có thể là mảng
            // 'skill_id.*' => 'exists:skills,id', // Kiểm tra từng kỹ năng có tồn tại trong bảng skills
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Địa chỉ công ty là bắt buộc.',
            'address.string' => 'Địa chỉ công ty phải là một chuỗi.',
            'mobile.required' => 'Số điện thoại công ty là bắt buộc.',
            'mobile.numeric' => 'Số điện thoại phải là kiểu số.',
            'mobile.digits_between' => 'Số điện thoại phải có từ 10 đến 11 chữ số.',
            'fax.required' => 'Bắt buộc phải nhập số fax.',
            'fax.regex' => 'Số fax chỉ được chứa các ký tự số.',
            'yearEstablish.required' => 'Năm thành lập công ty là bắt buộc.',
            'yearEstablish.date_format' => 'Năm thành lập phải có định dạng năm (Y).',
            'offer.string' => 'Đề nghị công ty phải là một chuỗi.',
            'salary.required' => 'Lương công ty bắt buộc phải nhập.',
            'salary.numeric' => 'Lương công ty phải là kiểu số.',
            'numbers.required' => 'Số lượng công ty tuyển không được để trống.',
            'numbers.numeric' => 'Số lượng công ty phải là kiểu số.',
            'bonus.required' => 'Thưởng công ty bắt buộc phải nhập vào.',
            'startDayOffer.required' => 'Ngày bắt đầu đề nghị là bắt buộc.',
            'startDayOffer.date_format' => 'Ngày bắt đầu đề nghị phải có định dạng dd/mm/yyyy.',
            'endDayOffer.required' => 'Ngày kết thúc đề nghị là bắt buộc.',
            'endDayOffer.date_format' => 'Ngày kết thúc đề nghị phải có định dạng dd/mm/yyyy.',
            'endDayOffer.after' => 'Ngày kết thúc đề nghị phải sau ngày bắt đầu.',
            'startDayOffer.after_or_equal' => 'Ngày bắt đầu tuyển dụng phải lớn hơn hoặc bằng ngày hiện tại.',
            'endDayOffer.after_or_equal' => 'Ngày kết thúc tuyển dụng phải lớn hơn ngày bắt đầu tuyển dụng.',
            'Hinh.mimes' => 'Chỉ chấp nhận các định dạng ảnh jpg, png, jpeg.',
            'Hinh.max' => 'Kích thước file ảnh không vượt quá 2MB.',
            // 'skill_id.array' => 'Kỹ năng phải là một mảng.',
            // 'skill_id.*.exists' => 'Mỗi kỹ năng phải tồn tại trong cơ sở dữ liệu.',
        ];
    }
}
