@extends('layout.main')
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Danh sách Research Topics</h1>
    <table class="table table-bordered table-hover">
      <thead class="table-dark" style="color: black;">
        <tr>
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
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->title }}</td>
                <td>{{ $topic->description }}</td>
                <td>{{ $topic->teacher_id }}</td>
                <td>{{ number_format($topic->allowance, 2) }} VND</td>
                <td>{{ $topic->start_date }}</td>
                <td>{{ $topic->end_date }}</td>
                <td>{{ $topic->max_students }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
