@extends('layout.main')
@section('content')
<div class="container">
    <h1 class="mb-4">Danh sách Jobs</h1>
    <table class="table table-bordered table-hover">
      <thead class="table-dark" style="color: black;">
        <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Salary</th>
                <th>Job Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->company_id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->description }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->salary }}</td>
                <td>{{ $job->job_type }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
