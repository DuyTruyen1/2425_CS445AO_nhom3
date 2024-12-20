@extends('Pages.layout.menu')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">🔍 Chi Tiết Công Việc: {{ $job->title }}</h2>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th scope="row">🎯 Tiêu Đề</th>
                    <td>{{ $job->title }}</td>
                </tr>
                <tr>
                    <th scope="row">📝 Mô Tả</th>
                    <td>{{ $job->description }}</td>
                </tr>
                <tr>
                    <th scope="row">📍 Vị Trí</th>
                    <td>{{ $job->location }}</td>
                </tr>
                <tr>
                    <th scope="row">💰 Lương</th>
                    <td>{{ number_format($job->salary, 0, ',', '.') }} VND</td>
                </tr>
                <tr>
                    <th scope="row">💼 Loại Công Việc</th>
                    <td>{{ $job->job_type }}</td>
                </tr>
                <tr>
                    <th scope="row">🏢 Công Ty</th>
                    <td>{{ $job->company->name }}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <a href="{{ route('company.jobs.index') }}" class="btn btn-warning btn-lg px-4">⏪ Quay Lại</a>
            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary btn-lg px-4">✏️ Chỉnh Sửa</a>
        </div>
    </div>

    <style>
        h2 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        table {
            background: #ffffff;
            border: 2px solid #ddd;
        }
        table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        table td {
            font-size: 1.1rem;
            color: #333;
        }
        .btn {
            font-size: 1.1rem;
        }
    </style>
@endsection
