@extends('Pages.layout.menu')

@section('title', 'Danh Sách Chủ Đề')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">📚 Danh Sách Chủ Đề 📚</h2>

        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Các Chủ Đề Nghiên Cứu</h4>
            </div>
            <div class="card-body bg-light">
                @if ($topics->isEmpty())
                    <div class="alert alert-warning text-center">
                        Hiện tại không có chủ đề nào để ứng tuyển.
                    </div>
                @else
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Tiêu Đề</th>
                                <th>Mô Tả</th>
                                <th>Trợ Cấp</th>
                                <th>Giáo Viên</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics as $key => $topic)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $topic->title }}</td>
                                    <td>{{ $topic->description }}</td>
                                    <td>{{ number_format($topic->allowance, 0, ',', '.') }} VND</td>
                                    <td>{{ $topic->teacher->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($topic->start_date)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($topic->end_date)->format('d/m/Y') }}</td>
                                    <td>
                                        <!-- Form ứng tuyển -->
                                        <form action="" method="POST">
                                            @csrf
                                            <input type="hidden" name="research_topic_id" value="{{ $topic->id }}">
                                            <button type="submit" class="btn btn-success btn-sm" 
                                                {{ $topic->applications->contains('student_id', auth()->id()) ? 'disabled' : '' }}>
                                                Ứng Tuyển
                                            </button>
                                        </form>
                                        @if($topic->applications->contains('student_id', auth()->id()))
                                            <span class="text-success">Đã ứng tuyển</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <style>
        h2 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .card {
            border-radius: 10px;
        }
        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn {
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .alert {
            font-size: 18px;
        }
    </style>
@endsection
