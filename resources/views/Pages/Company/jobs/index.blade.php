@extends('Pages.layout.menu')

@section('content')
    <h1>Danh sách công việc</h1>

    <!-- Thêm link để tạo công việc mới -->
    <a href="{{ route('jobs.create') }}" class="btn btn-warning mb-3">Tạo công việc mới</a>

    <!-- Kiểm tra nếu không có công việc -->
    @if ($jobs->isEmpty())
        <p>Hiện tại không có công việc nào.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Địa điểm</th>
                    <th>Mức lương</th>
                    <th>Loại công việc</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Lặp qua tất cả công việc -->
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->description }}</td>
                        <td>{{ $job->location }}</td>
                        <td>{{ number_format($job->salary, 0, ',', '.') }} VND</td>
                        <td>{{ $job->job_type }}</td>
                        <td>
                            <!-- Thêm các hành động như xem chi tiết, chỉnh sửa hoặc xóa -->
                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>

                              <!-- Thêm nút để xem danh sách ứng viên -->
                              <a href="{{ route('jobs.applicants', $job->id) }}" class="btn btn-primary btn-sm">Xem ứng viên</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
