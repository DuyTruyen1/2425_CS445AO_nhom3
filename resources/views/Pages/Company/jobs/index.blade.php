@extends('Pages.layout.menu')

@section('content')
<div class="container my-4">
    <h1 class="text-center text-primary mb-4">📝 Danh Sách Công Việc 📝</h1>

    <!-- Thêm link để tạo công việc mới -->
    <a href="{{ route('jobs.create') }}" class="btn btn-success mb-3">Tạo Công Việc Mới</a>

    <!-- Kiểm tra nếu không có công việc -->
    @if ($jobs->isEmpty())
        <div class="alert alert-info">
            Hiện tại không có công việc nào.
        </div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Tiêu Đề</th>
                    <th>Mô Tả</th>
                    <th>Địa Điểm</th>
                    <th>Mức Lương</th>
                    <th>Loại Công Việc</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Lặp qua tất cả công việc -->
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ Str::limit($job->description, 50) }}</td>
                        <td>{{ $job->location }}</td>
                        <td>{{ number_format($job->salary, 0, ',', '.') }} VND</td>
                        <td>{{ $job->job_type }}</td>
                        <td>
                            <!-- Xem chi tiết -->
                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm">Xem Chi Tiết</a>
                            
                            <!-- Sửa công việc -->
                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            
                            <!-- Xóa công việc -->
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa công việc này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>

                            <!-- Xem danh sách ứng viên -->
                            <a href="{{ route('jobs.applicants', $job->id) }}" class="btn btn-primary btn-sm">Xem Ứng Viên</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<style>
    h1 {
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }
    .btn {
        font-weight: 600;
        padding: 8px 16px;
    }
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .table-bordered {
        border: 1px solid #ddd;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>
@endsection
