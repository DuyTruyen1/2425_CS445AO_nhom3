@extends('Pages.layout.menu')
@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">📚 Tạo Đề Tài Nghiên Cứu 📚</h2>
    
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

    <form action="{{ route('research_topics.store') }}" method="POST" class="p-4 border rounded bg-light shadow">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label fw-bold">✨ Tiêu Đề Đề Tài</label>
            <input type="text" id="title" name="title" class="form-control border-primary" value="{{ old('title') }}" placeholder="Nhập tiêu đề đề tài">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">📝 Mô Tả</label>
            <textarea id="description" name="description" class="form-control border-primary" rows="4" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="teacher_id" class="form-label fw-bold">👨‍🏫 Giáo Viên Phụ Trách</label>
            <select id="teacher_id" name="teacher_id" class="form-select border-primary">
                <option value="" disabled selected>-- Chọn Giáo Viên --</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->id }} - {{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="allowance" class="form-label fw-bold">💰 Trợ Cấp</label>
            <input type="number" id="allowance" name="allowance" class="form-control border-primary" step="0.01" value="{{ old('allowance') }}" placeholder="Nhập trợ cấp">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label fw-bold">📅 Ngày Bắt Đầu</label>
                <input type="date" id="start_date" name="start_date" class="form-control border-primary" value="{{ old('start_date') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label fw-bold">📅 Ngày Kết Thúc</label>
                <input type="date" id="end_date" name="end_date" class="form-control border-primary" value="{{ old('end_date') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="max_students" class="form-label fw-bold">👥 Số Lượng Sinh Viên Tối Đa</label>
            <input type="number" id="max_students" name="max_students" class="form-control border-primary" value="{{ old('max_students', 1) }}" min="1" placeholder="Nhập số lượng sinh viên tối đa">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success btn-lg px-4">✔️ Tạo Đề Tài</button>
            <a href="/Pages/Teacher/research_topics/index" class="btn btn-danger btn-lg px-4">❌ Hủy</a>
        </div>
    </form>
</div>

<style>
    h2 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    form {
        background-color: #f9f9f9;
        border: 2px solid #ddd;
    }
    form .form-label {
        color: #333;
        font-weight: 600;
    }
    form .form-control {
        transition: border-color 0.3s;
    }
    form .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }
    .btn {
        font-weight: 600;
        padding: 10px 20px;
        font-size: 16px;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
@endsection
