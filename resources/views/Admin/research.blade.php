@extends('layout.main')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5 text-primary">✨ Danh sách Research Topics ✨</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle text-center">
            <thead style="background: linear-gradient(90deg, #ff7eb3, #ff758c); color: white;">
                <tr style="color: black">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Teacher</th>
                    <th>Allowance</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Max Students</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($researchTopics as $topic)
                <tr style="background-color: {{ $loop->odd ? '#fff5f7' : '#f2f7ff' }};">
                    <td><span class="badge bg-danger">{{ $topic->id }}</span></td>
                    <td class="fw-bold">{{ $topic->title }}</td>
                    <td>{{ Str::limit($topic->description, 50, '...') }}</td>
                    <td><span class="badge bg-info text-dark">{{ $topic->teacher_id }}</span></td>
                    <td class="text-end text-success">{{ number_format($topic->allowance, 2) }} VND</td>
                    <td>{{ date('d/m/Y', strtotime($topic->start_date)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($topic->end_date)) }}</td>
                    <td><span class="badge bg-warning text-dark">{{ $topic->max_students }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    /* body {
        background: linear-gradient(120deg, #f3ec78, #af4261);
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
        background-color: #ffe4e1 !important;
        transition: all 0.3s ease-in-out;
    }
</style>
@endsection
