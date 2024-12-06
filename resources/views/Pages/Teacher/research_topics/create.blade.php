@extends('Pages.layout.menu')
@section('content')
<div class="container my-4">
    <h1 class="text-center mb-4">Tạo Đề Tài Nghiên Cứu</h1>


    <form action="{{ route('research_topics.store') }}" method="POST" class="border p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề đề tài:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="teacher_id" class="form-label">Giáo viên phụ trách:</label>
            <select id="teacher_id" name="teacher_id" class="form-select" >
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="allowance" class="form-label">Trợ cấp:</label>
            <input type="number" id="allowance" name="allowance" class="form-control" step="0.01" value="{{ old('allowance') }}">
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}">
        </div>

        <div class="mb-3">
            <label for="max_students" class="form-label">Số lượng sinh viên tối đa:</label>
            <input type="number" id="max_students" name="max_students" class="form-control" value="{{ old('max_students', 1) }}" min="1" >
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-warning">Tạo Đề Tài</button>
            <a href="/Pages/Teacher/research_topics/index" class="btn btn-secondary">Xem danh sách chủ đề nghiên cứu</a>
        </div>
    </form>
</div>
@endsection
