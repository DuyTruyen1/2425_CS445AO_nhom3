@extends('layout.main')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5 text-success">💼 Danh sách Jobs 💼</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead style="background: linear-gradient(90deg, #ff9a9e, #fad0c4); color: white;">
                <tr style="color: black">
                    <th>ID</th>
                    <th>Công ty</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Vị trí</th>
                    <th>Lương</th>
                    <th>Loại công việc</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                <tr style="background-color: {{ $loop->odd ? '#e9f7ff' : '#fff7e6' }};">
                    <td class="text-center"><span class="badge bg-danger">{{ $job->id }}</span></td>
                    <td><span class="badge bg-primary text-light">{{ $job->company_id }}</span></td>
                    <td class="fw-bold">{{ $job->title }}</td>
                    <td>{{ Str::limit($job->description, 50, '...') }}</td>
                    <td class="text-info fw-semibold">{{ $job->location }}</td>
                    <td class="text-end text-success">{{ number_format($job->salary, 0) }} VND</td>
                    <td>
                        <span class="badge bg-primary text-light{{ $job->job_type == 'Full-time' ? 'success' : ($job->job_type == 'Part-time' ? 'warning' : 'secondary') }}">
                            {{ $job->job_type }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    /* body {
        background: linear-gradient(120deg, #fdfbfb, #ebedee);
        color: #333;
    } */
    h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
    table th {
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    table tbody tr:hover {
        background-color: #fffacd !important;
        transition: all 0.3s ease-in-out;
    }
</style>
@endsection
