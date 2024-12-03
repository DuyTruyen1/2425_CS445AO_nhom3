@extends('Pages.layout.menu')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Danh sách các cuộc họp</h1>
    
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Bắt đầu</th>
                            <th>Kết thúc</th>
                            <th>Giáo viên</th>
                            <th>Sinh viên</th>
                            <th>Công ty</th>
                            <th>Thao tác</th>
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
        </div>
    </div>
</div>
@endsection
