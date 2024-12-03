@extends('Pages.layout.menu')

@section('content')
    <div class="container">
        <h1>Danh Sách Ứng Viên cho Công Việc: {{ $job->title }}</h1>
        
        @if ($applicants->isEmpty())
            <p>Hiện tại không có ứng viên nào ứng tuyển vào công việc này.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tên Ứng Viên</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                        {{-- <th>Hành Động</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applicants as $applicant)
                        <tr>
                          
                            <td><p>Student ID: {{ $applicant->student_id }}</p>
                            <td>
                                @if ($applicant->status == 'Đang chờ')
                                    <span class="badge badge-warning">{{ $applicant->status }}</span>
                                @elseif ($applicant->status == 'Chấp nhận')
                                    <span class="badge badge-success">{{ $applicant->status }}</span>
                                @else
                                    <span class="badge badge-danger">{{ $applicant->status }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($applicant->status == 'Đang chờ')
                                    <form action="{{ route('interviews.accept', $applicant->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Chấp Nhận</button>
                                    </form>
                                @else
                                    <button class="btn btn-success"> chấp nhận</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        
        <a href="{{ route('company.jobs.index') }}" class="btn btn-primary">Quay lại danh sách công việc</a>
    </div>
@endsection
