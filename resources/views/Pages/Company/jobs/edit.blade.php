@extends('Pages.layout.menu')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">✏️ Chỉnh Sửa Công Việc: {{ $job->title }}</h1>

        <form action="{{ route('jobs.update', $job->id) }}" method="POST" class="p-4 border rounded bg-light shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">📌 Tiêu Đề</label>
                <input type="text" class="form-control border-primary" id="title" name="title" value="{{ $job->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">📝 Mô Tả</label>
                <textarea class="form-control border-primary" id="description" name="description" required>{{ $job->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label fw-bold">📍 Vị Trí</label>
                <input type="text" class="form-control border-primary" id="location" name="location" value="{{ $job->location }}" required>
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label fw-bold">💸 Lương</label>
                <input type="number" class="form-control border-primary" id="salary" name="salary" value="{{ $job->salary }}" required>
            </div>

            <div class="mb-3">
                <label for="job_type" class="form-label fw-bold">🔧 Loại Công Việc</label>
                <select class="form-select border-primary" id="job_type" name="job_type" required>
                    <option value="full_time" {{ $job->job_type == 'full_time' ? 'selected' : '' }}>Toàn Thời Gian</option>
                    <option value="part_time" {{ $job->job_type == 'part_time' ? 'selected' : '' }}>Bán Thời Gian</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success btn-lg px-4">✔️ Cập Nhật</button>
                <a href="{{ route('company.jobs.index') }}" class="btn btn-danger btn-lg px-4">❌ Hủy</a>
            </div>
        </form>
    </div>

    <style>
        h1 {
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

        .btn {
            font-weight: bold;
        }
    </style>
@endsection
