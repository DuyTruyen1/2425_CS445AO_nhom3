@extends('Pages.layout.menu')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">📅 Danh Sách Các Cuộc Họp 📅</h1>
    
    <!-- Card to display meeting list -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Danh Sách Cuộc Họp</h4>
        </div>
        <div class="card-body bg-light">
            @if($meetings->isEmpty())
                <div class="alert alert-warning text-center">
                    Hiện tại không có cuộc họp nào.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>#</th>
                                <th>Tiêu Đề</th>
                                <th>Mô Tả</th>
                                <th>Bắt Đầu</th>
                                <th>Kết Thúc</th>
                                <th>Giáo Viên</th>
                                <th>Sinh Viên</th>
                                <th>Công Ty</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($meetings as $meeting)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $meeting->title }}</td>
                                <td>{{ $meeting->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($meeting->start_time)->format('H:i d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($meeting->end_time)->format('H:i d/m/Y') }}</td>
                                <td>{{ $meeting->teacher?->id ?? 'Chưa cập nhật' }}</td>
                                <td>{{ $meeting->student?->id ?? 'Chưa cập nhật' }}</td>
                                <td>{{ $meeting->company?->id ?? 'Chưa cập nhật' }}</td>
                                <td class="text-center">
                                    @if($meeting->meeting_url)
                                    <a href="{{ $meeting->meeting_url }}" class="btn btn-success btn-sm" target="_blank">
                                        Tham gia
                                    </a>
                                    @else
                                    <span class="badge bg-secondary">Không có</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Không có cuộc họp nào.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

<style>
    /* CSS for the page */
    h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .card {
        border-radius: 15px;
    }

    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .btn {
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .btn-success {
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-success:hover {
        background-color: #28a745;
        transform: translateY(-2px);
    }

    .badge.bg-secondary {
        background-color: #6c757d;
        color: white;
    }

    .table thead {
        background-color: #007bff;
        color: #fff;
    }

    .alert-warning {
        font-size: 1.1em;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
    }
</style>
