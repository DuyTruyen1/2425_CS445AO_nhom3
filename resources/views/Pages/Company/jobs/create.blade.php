@extends('Pages.layout.menu')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">🎯 Tạo Công Việc Mới 🎯</h2>

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

        <form action="{{ route('jobs.store') }}" method="POST" class="p-4 border rounded bg-light shadow">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">🎯 Tiêu Đề Công Việc</label>
                <input type="text" name="title" id="title" class="form-control border-primary" placeholder="Nhập tiêu đề công việc" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">📝 Mô Tả Công Việc</label>
                <textarea name="description" id="description" class="form-control border-primary" rows="4" placeholder="Nhập mô tả công việc" required></textarea>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label fw-bold">📍 Địa Điểm</label>
                <input type="text" name="location" id="location" class="form-control border-primary" placeholder="Nhập địa điểm công việc" required>
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label fw-bold">💰 Mức Lương</label>
                <input type="number" name="salary" id="salary" class="form-control border-primary" placeholder="Nhập mức lương" >
            </div>

            <div class="mb-3">
                <label for="job_type" class="form-label fw-bold">💼 Loại Công Việc</label>
                <select name="job_type" id="job_type" class="form-select border-primary" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Internship">Internship</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success btn-lg px-4">✔️ Tạo Công Việc</button>
                <a href="{{ route('company.jobs.index') }}" class="btn btn-danger btn-lg px-4">❌ Hủy</a>
            </div>
        </form>
    </div>

    <style>
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
