@extends('Pages.layout.menu')

@section('title', 'Danh sách chủ đề')

@section('content')
<div class="container my-4">
    <h2 class="text-center text-primary mb-4">📚 Danh Sách Chủ Đề Nghiên Cứu 📚</h2>

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

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Tiêu Đề</th>    
                <th>Mô Tả</th>
                <th>Trợ Cấp</th>
                <th>Ngày Bắt Đầu</th>
                <th>Ngày Kết Thúc</th>
                <th>Danh Sách Ứng Tuyển</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topics as $key => $topic)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $topic->title }}</td>
                <td>{{ $topic->description }}</td>
                <td>{{ $topic->allowance }} VND</td>
                <td>{{ \Carbon\Carbon::parse($topic->start_date)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($topic->end_date)->format('d/m/Y') }}</td>
                <td>
                    @if ($topic->applications->isEmpty())
                        <p class="text-muted">Chưa có ứng viên nào ứng tuyển</p>
                    @else
                        <table class="table table-sm table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Tên Sinh Viên</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
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
                    <div class="d-flex justify-content-between">
                        <!-- Nút chỉnh sửa -->
                        <a href="{{ route('research-topics.edit', $topic->id) }}" class="btn btn-warning btn-sm">✏️ Chỉnh sửa</a>

                        <!-- Nút xóa -->
                        <form action="{{ route('research-topics.destroy', $topic->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đề tài này?')">❌ Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    h2 {
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }
    table th, table td {
        text-align: center;
        vertical-align: middle;
    }
    .btn {
        font-weight: 600;
        padding: 8px 16px;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .badge {
        font-size: 0.9rem;
        padding: 5px 10px;
    }
    .table-bordered {
        border: 1px solid #ddd;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>
@endsection
