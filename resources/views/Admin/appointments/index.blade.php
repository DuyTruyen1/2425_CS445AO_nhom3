@extends('layout.main')
@section('content')
<div class="container">
    <h1>Appointment List</h1>
    <a href="{{ route('admin.appointments.create') }}" class="btn btn-warning mb-3">Create New Appointment</a>

    @if ($appointments->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Meeting URL</th>
                    <th>Teacher</th>
                    <th>Company</th>
                    <th>Student</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $appointment->title }}</td>
                    <td>{{ $appointment->description }}</td>
                    <td>{{ $appointment->start_time }}</td>
                    <td>{{ $appointment->end_time }}</td>
                    <td>
                        @if ($appointment->meeting_url)
                            <a href="{{ $appointment->meeting_url }}" target="_blank">Join Meeting</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $appointment->teacher->id ?? 'N/A' }}</td>
                    <td>{{ $appointment->company->id ?? 'N/A' }}</td>
                    <td>{{ $appointment->student->id ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá không ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No appointments available.</p>
    @endif
</div>
@endsection


