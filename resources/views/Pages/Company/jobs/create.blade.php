@extends('Pages.layout.menu')

@section('content')
    <div class="container mt-4">
        <h1>Tạo công việc mới</h1>

        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề công việc</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả công việc</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Địa điểm</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Mức lương</label>
                <input type="number" name="salary" id="salary" class="form-control">
            </div>

            <div class="mb-3">
                <label for="job_type" class="form-label">Loại công việc</label>
                <select name="job_type" id="job_type" class="form-select" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Internship">Internship</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Tạo công việc</button>
        </form>
    </div>
@endsection
