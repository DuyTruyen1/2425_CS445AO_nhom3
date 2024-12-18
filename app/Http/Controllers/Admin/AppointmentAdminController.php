<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Category;
use App\Models\Appointment;
use App\Models\Teacher;
use App\Models\Company;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use GuzzleHttp\Promise\Create;

class AppointmentAdminController extends Controller
{
    // Hiển thị form tạo cuộc hẹn
    public function create()
    {
        $category = Category::first();
        $teachers = Teacher::all();  // Lấy tất cả giáo viên
        $companies = Company::all();  // Lấy tất cả công ty
        $students = Student::all();   // Lấy tất cả sinh viên

        return view('admin.appointments.create', compact('teachers', 'companies', 'students', 'category'));
    }

    public function store(CreateAppointmentRequest $request)
    {
        // Lấy dữ liệu đã được xác thực từ StoreAppointmentRequest
        $validated = $request->validated();

        // Lưu cuộc hẹn vào cơ sở dữ liệu
        $appointment = Appointment::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'meeting_url' => $validated['meeting_url'],
            'teacher_id' => $validated['teacher_id'],
            'company_id' => $validated['company_id'],
            'student_id' => $validated['student_id'],
        ]);

        // Chuyển hướng hoặc trả về thông báo
        return redirect()->route('admin.appointments.index')->with('success', 'Tạo cuộc hẹn thành công!');
    }

    // Hiển thị tất cả các cuộc hẹn
    public function index()
    {
        $category = Category::first();
        $appointments = Appointment::with(['teacher', 'company', 'student'])->get();

        return view('admin.appointments.index', compact('appointments', 'category'));
    }

    public function destroy($id)
    {
        // Tìm cuộc hẹn theo ID
        $appointment = Appointment::find($id);

        // Kiểm tra nếu không tìm thấy cuộc hẹn
        if (!$appointment) {
            return redirect()->route('admin.appointments.index')->with('error', 'Cuộc hẹn không tồn tại.');
        }

        // Xóa cuộc hẹn
        $appointment->delete();

        // Chuyển hướng hoặc trả về thông báo
        return redirect()->route('admin.appointments.index')->with('success', 'Xoá cuộc hẹn thành công!');
    }

    public function edit($id)
    {
        $category = Category::first();
        $appointment = Appointment::findOrFail($id);
        $teachers = Teacher::all();  // Lấy danh sách giáo viên
        $companies = Company::all();  // Lấy danh sách công ty
        $students = Student::all();   // Lấy danh sách sinh viên

        return view('admin.appointments.edit', compact('appointment', 'teachers', 'companies', 'students', 'category'));
    }

    public function update(UpdateAppointmentRequest $request, $id)
    {
        // Lấy dữ liệu đã được xác thực từ UpdateAppointmentRequest
        $validated = $request->validated();

        // Tìm và cập nhật cuộc hẹn
        $appointment = Appointment::findOrFail($id);

        $appointment->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'meeting_url' => $validated['meeting_url'],
            'teacher_id' => $validated['teacher_id'],
            'company_id' => $validated['company_id'],
            'student_id' => $validated['student_id'],
        ]);

        return redirect()->route('admin.appointments.index')->with('success', 'Cập nhật cuộc hẹn thành công!');
    }
}
