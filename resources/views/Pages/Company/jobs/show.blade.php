@extends('Pages.layout.menu')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Chi Tiết Công Việc: {{ $job->title }}</h1>

        <!-- Tạo bảng hiển thị chi tiết công việc -->
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th scope="row">Tiêu đề</th>
                    <td>{{ $job->title }}</td>
                </tr>
                <tr>
                    <th scope="row">Mô Tả</th>
                    <td>{{ $job->description }}</td>
                </tr>
                <tr>
                    <th scope="row">Vị Trí</th>
                    <td>{{ $job->location }}</td>
                </tr>
                <tr>
                    <th scope="row">Lương</th>
                    <td>{{ number_format($job->salary, 0, ',', '.') }} VND</td>
                </tr>
                <tr>
                    <th scope="row">Loại Công Việc</th>
                    <td>{{ $job->job_type }}</td>
                </tr>
                <tr>
                    <th scope="row">Công Ty</th>
                    <td>{{ $job->company->id }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Nút Quay lại -->
        <a href="{{ route('company.jobs.index') }}" class="btn btn-warning mt-2">Quay lại danh sách công việc</a>
    </div>
@endsection
