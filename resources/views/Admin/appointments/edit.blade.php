@extends('layout.main')
@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">✏️ Chỉnh Sửa Cuộc Hẹn ✏️</h2>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops! Có lỗi xảy ra:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST" class="p-4 border rounded bg-light shadow">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">✨ Tiêu Đề</label>
            <input type="text" name="title" id="title" class="form-control border-primary" value="{{ old('title', $appointment->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">📝 Mô Tả</label>
            <textarea name="description" id="description" class="form-control border-primary" rows="4" required>{{ old('description', $appointment->description) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="start_time" class="form-label fw-bold">⏰ Thời Gian Bắt Đầu</label>
                <input type="datetime-local" name="start_time" id="start_time" class="form-control border-primary" value="{{ old('start_time', $appointment->start_time) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="end_time" class="form-label fw-bold">⏳ Thời Gian Kết Thúc</label>
                <input type="datetime-local" name="end_time" id="end_time" class="form-control border-primary" value="{{ old('end_time', $appointment->end_time) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="meeting_url" class="form-label fw-bold">🔗 URL Cuộc Họp</label>
            <input type="url" name="meeting_url" id="meeting_url" class="form-control border-primary" value="{{ old('meeting_url', $appointment->meeting_url) }}" placeholder="Nhập URL cuộc họp">
        </div>

        <div class="mb-3">
            <label for="teacher_id" class="form-label fw-bold">👩‍🏫 Giáo Viên</label>
            <select name="teacher_id" id="teacher_id" class="form-select border-primary" required>
                <option value="" disabled selected>-- Chọn Giáo Viên --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $appointment->teacher_id == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->id }} - {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label fw-bold">🏢 Công Ty</label>
            <select name="company_id" id="company_id" class="form-select border-primary" required>
                <option value="" disabled selected>-- Chọn Công Ty --</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $appointment->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->id }} - {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="student_id" class="form-label fw-bold">🎓 Sinh Viên</label>
            <select name="student_id" id="student_id" class="form-select border-primary" required>
                <option value="" disabled selected>-- Chọn Sinh Viên --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $appointment->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->id }} - {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-warning btn-lg px-4">✔️ Cập Nhật</button>
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary btn-lg px-4">❌ Hủy</a>
        </div>
    </form>
</div>

<style>
    /* body {
        background: linear-gradient(120deg, #f3f4f6, #e8eaf6);
        font-family: 'Arial', sans-serif;
    } */
    h2 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
    form {
        background: #ffffff;
        border: 2px solid #ddd;
    }
    form .form-label {
        color: #333;
    }
    form .form-control {
        transition: border-color 0.3s;
    }
    form .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }
</style>
@endsection
