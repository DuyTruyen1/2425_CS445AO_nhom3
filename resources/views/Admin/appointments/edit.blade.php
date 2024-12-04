@extends('layout.main')
@section('content')
<div class="container">
  <h1 class="mt-4">Chỉnh sửa cuộc hẹn</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
      @csrf
      @method('PUT')
      
      <div class="mb-3">
          <label for="title" class="form-label">Tiêu đề</label>
          <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $appointment->title) }}" >
      </div>

      <div class="mb-3">
          <label for="description" class="form-label">Mô tả</label>
          <textarea name="description" id="description" class="form-control">{{ old('description', $appointment->description) }}</textarea>
      </div>

      <div class="mb-3">
          <label for="start_time" class="form-label">Thời gian bắt đầu</label>
          <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', $appointment->start_time) }}" >
      </div>

      <div class="mb-3">
          <label for="end_time" class="form-label">Thời gian kết thúc</label>
          <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', $appointment->end_time) }}" >
      </div>

      <div class="mb-3">
          <label for="meeting_url" class="form-label">URL cuộc họp</label>
          <input type="url" name="meeting_url" id="meeting_url" class="form-control" value="{{ old('meeting_url', $appointment->meeting_url) }}">
      </div>

      <div class="mb-3">
          <label for="teacher_id" class="form-label">Giáo viên</label>
          <select name="teacher_id" id="teacher_id" class="form-select">
              <option value="">-- Chọn giáo viên --</option>
              @foreach($teachers as $teacher)
                  <option value="{{ $teacher->id }}" {{ $appointment->teacher_id == $teacher->id ? 'selected' : '' }}>
                      {{ $teacher->id }}
                  </option>
              @endforeach
          </select>
      </div>

      <div class="mb-3">
          <label for="company_id" class="form-label">Công ty</label>
          <select name="company_id" id="company_id" class="form-select">
              <option value="">-- Chọn công ty --</option>
              @foreach($companies as $company)
                  <option value="{{ $company->id }}" {{ $appointment->company_id == $company->id ? 'selected' : '' }}>
                      {{ $company->id }}
                  </option>
              @endforeach
          </select>
      </div>

      <div class="mb-3">
          <label for="student_id" class="form-label">Sinh viên</label>
          <select name="student_id" id="student_id" class="form-select">
              <option value="">-- Chọn sinh viên --</option>
              @foreach($students as $student)
                  <option value="{{ $student->id }}" {{ $appointment->student_id == $student->id ? 'selected' : '' }}>
                      {{ $student->id }}
                  </option>
              @endforeach
          </select>
      </div>

      <button type="submit" class="btn btn-warning">Cập nhật</button>
      <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">Hủy</a>
  </form>
</div>
@endsection