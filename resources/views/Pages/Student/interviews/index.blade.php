@extends('Pages.layout.menu')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">📝 Danh Sách Công Việc 📝</h1>

        @if ($jobs->isEmpty())
            <div class="alert alert-warning text-center">Hiện tại không có công việc nào để bạn ứng tuyển.</div>
        @else
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Danh Sách Công Việc</h4>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
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
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->description }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>{{ number_format($job->salary, 0, ',', '.') }} VND</td>
                                    <td>{{ $job->job_type }}</td>
                                    <td>
                                        <form action="{{ route('student.jobs.apply', $job->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Ứng Tuyển</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <style>
        h1 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .table th, .table td {
            vertical-align: middle;
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
