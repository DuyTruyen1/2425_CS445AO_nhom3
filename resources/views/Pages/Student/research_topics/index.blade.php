@extends('Pages.layout.menu')

@section('title', 'Danh sách chủ đề')

@section('content')
<h2>Danh sách chủ đề</h2>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Trợ cấp</th>
            <th>Giáo viên</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topics as $key => $topic)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $topic->title }}</td>
            <td>{{ $topic->description }}</td>
            <td>{{ $topic->allowance }}</td>
            <td>{{ $topic->teacher->name }}</td>
            <td>{{ $topic->start_date }}</td>
            <td>{{ $topic->end_date }}</td>
            <td>
                <!-- Form ứng tuyển -->
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="research_topic_id" value="{{ $topic->id }}">
                    <button type="submit" 
                        {{ $topic->applications->contains('student_id', auth()->id()) ? 'disabled' : '' }}>
                        Ứng tuyển
                    </button>
                </form>
                @if($topic->applications->contains('student_id', auth()->id()))
                    <span style="color: green;">Đã ứng tuyển</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
