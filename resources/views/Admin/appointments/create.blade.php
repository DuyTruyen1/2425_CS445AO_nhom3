@extends('layout.main')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tạo lịch hẹn</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('admin.appointments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter description"></textarea>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" >
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" >
        </div>

        <div class="mb-3">
            <label for="meeting_url" class="form-label">Meeting URL</label>
            <input type="text" name="meeting_url" id="meeting_url" class="form-control" placeholder="Enter meeting URL">
        </div>

        <div class="mb-3">
            <label for="teacher_id" class="form-label">Teacher</label>
            <select name="teacher_id" id="teacher_id" class="form-select form-select-lg" aria-label="Select Teacher">
                <option value="" disabled selected>-- Select a Teacher --</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->id }} - {{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="company_id" class="form-label">Company</label>
            <select name="company_id" id="company_id" class="form-select form-select-lg" aria-label="Select Company">
                <option value="" disabled selected>-- Select a Company --</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->id }} - {{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select name="student_id" id="student_id" class="form-select form-select-lg" aria-label="Select Student">
                <option value="" disabled selected>-- Select a Student --</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->id }} - {{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-warning">Create Appointment</button>
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
