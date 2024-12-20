@extends('layout.main')
@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">📅 Appointment List 📅</h1>
    
    <a href="{{ route('admin.appointments.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i> Create New Appointment</a>

    @if ($appointments->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead style="background: linear-gradient(90deg, #6a11cb, #2575fc); color: white;">
                    <tr style="color: black">
                        <th class="text-center">#</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Start Time</th>
                        <th class="text-center">End Time</th>
                        <th class="text-center">Meeting URL</th>
                        <th class="text-center">Teacher</th>
                        <th class="text-center">Company</th>
                        <th class="text-center">Student</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $appointment->title }}</td>
                        <td class="text-center">{{ $appointment->description }}</td>
                        <td class="text-center">{{ $appointment->start_time }}</td>
                        <td class="text-center">{{ $appointment->end_time }}</td>
                        <td class="text-center">
                            @if ($appointment->meeting_url)
                                <a href="{{ $appointment->meeting_url }}" target="_blank" class="btn btn-info btn-sm">Join Meeting</a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $appointment->teacher->id ?? 'N/A' }}</td>
                        <td class="text-center">{{ $appointment->company->id ?? 'N/A' }}</td>
                        <td class="text-center">{{ $appointment->student->id ?? 'N/A' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xoá không ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-muted">No appointments available.</p>
    @endif
</div>

<style>
    h1 {
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    table th, table td {
        text-align: center;
        vertical-align: middle;
    }

    table tbody tr:hover {
        background-color: #f1f8ff !important;
        transition: background-color 0.3s ease;
    }

    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .table-responsive {
        max-height: 500px;
        overflow-y: auto;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>

@endsection
