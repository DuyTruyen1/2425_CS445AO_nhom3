@extends('Pages.layout.menu')

@section('content')
    <div class="container mt-4">
        <h1>Danh Sách Công Việc</h1>

        @if ($jobs->isEmpty())
            <p>Hiện tại không có công việc nào để bạn ứng tuyển.</p>
        @else
            <table class="table table-bordered table-striped table-hover">
                <thead>
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
                                    <button type="submit" class="btn btn-success">Ứng Tuyển</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
