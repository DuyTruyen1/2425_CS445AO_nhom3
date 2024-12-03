@extends('Pages.layout.menu')
@section('content')
<form action="{{ route('student.interviews.store') }}" method="POST">
  @csrf
  <input type="hidden" name="job_id" value="{{ $job->id }}">
  <input type="hidden" name="student_id" value="{{ $student->id }}">

  <label for="interview_date">Ngày phỏng vấn</label>
  <input type="datetime-local" name="interview_date" required>
  
  <label for="status">Trạng thái</label>
  <select name="status" id="status" required>
      <option value="Pending">Chờ phỏng vấn</option>
      <option value="Completed">Hoàn thành</option>
      <option value="Canceled">Hủy bỏ</option>
  </select>

  <button type="submit">Lên lịch phỏng vấn</button>
</form>

@endsection