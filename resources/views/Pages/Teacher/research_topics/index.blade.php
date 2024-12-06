@extends('Pages.layout.menu')

@section('title', 'Danh sách chủ đề')

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">Danh sách chủ đề</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>    
                <th>Mô tả</th>
                <th>Trợ cấp</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Danh sách ứng tuyển</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topics as $key => $topic)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $topic->title }}</td>
                <td>{{ $topic->description }}</td>
                <td>{{ $topic->allowance }}</td>
                <td>{{ $topic->start_date }}</td>
                <td>{{ $topic->end_date }}</td>
                <td>
                    @if ($topic->applications->isEmpty())
                        <p class="text-muted">Chưa có ứng viên nào ứng tuyển</p>
                    @else
                        <table class="table table-sm table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Tên sinh viên</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topic->applications as $application)
                                <tr>
                                    <td>{{ $application->student->name }}</td>
                                    <td>{{ ucfirst($application->status) }}</td>
                                    <td>
                                        @if ($application->status === 'pending')
                                            <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="accepted">
                                                <button type="submit" class="btn btn-success btn-sm">Chấp nhận</button>
                                            </form>
                                            <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-danger btn-sm">Từ chối</button>
                                            </form>
                                        @else
                                            <span class="badge bg-info">{{ ucfirst($application->status) }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </td>
                <td>
                    <!-- Nút chỉnh sửa -->
                    <a href="{{ route('research-topics.edit', $topic->id) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>

                    <!-- Nút xóa -->
                    <form action="{{ route('research-topics.destroy', $topic->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đề tài này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
