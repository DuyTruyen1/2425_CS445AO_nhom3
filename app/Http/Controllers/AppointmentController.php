<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Teacher;
use App\Models\Company;
use App\Models\Student;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Hiển thị form tạo cuộc hẹn
    public function create()
    {
        $teachers = Teacher::all();  // Lấy tất cả giáo viên
        $companies = Company::all();  // Lấy tất cả công ty
        $students = Student::all();   // Lấy tất cả sinh viên

        return view('appointments.create', compact('teachers', 'companies', 'students'));
    }

    // Lưu cuộc hẹn
    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'meeting_url' => 'nullable|url',
            'teacher_id' => 'nullable|exists:teacher,id',
            'company_id' => 'nullable|exists:company,id',
            'student_id' => 'nullable|exists:students,id',
        ]);

        // Lưu cuộc hẹn vào cơ sở dữ liệu
        $appointment = Appointment::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'meeting_url' => $request->meeting_url,
            'teacher_id' => $request->teacher_id,
            'company_id' => $request->company_id,
            'student_id' => $request->student_id,
        ]);

        // Chuyển hướng hoặc trả về thông báo
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully!');
    }

    // Hiển thị tất cả các cuộc hẹn
    public function index()
    {
        $appointments = Appointment::with(['teacher', 'company', 'student'])->get();

        return view('appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        $appointment = Appointment::with(['teacher', 'company', 'student'])->findOrFail($id);

        return view('appointments.show', compact('appointment'));
    }
}
