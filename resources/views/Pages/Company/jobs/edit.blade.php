@extends('Pages.layout.menu')
@section('content')
    <div class="container">
        <h1>Chỉnh Sửa Công Việc: {{ $job->title }}</h1>
        <form action="{{ route('jobs.update', $job->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu Đề:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $job->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Mô Tả:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $job->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Vị Trí:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $job->location }}" required>
            </div>
            <div class="form-group">
                <label for="salary">Lương:</label>
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $job->salary }}" required>
            </div>
            <div class="form-group">
                <label for="job_type">Loại Công Việc:</label>
                <select class="form-control" id="job_type" name="job_type" required>
                    <option value="full_time" {{ $job->job_type == 'full_time' ? 'selected' : '' }}>Toàn Thời Gian</option>
                    <option value="part_time" {{ $job->job_type == 'part_time' ? 'selected' : '' }}>Bán Thời Gian</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cập Nhật</button>
            <a href="{{ route('company.jobs.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection

@endsection
