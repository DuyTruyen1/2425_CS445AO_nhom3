@extends('Pages.layout.menu')

@section('title', 'Chỉnh sửa đề tài')

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">Chỉnh sửa đề tài</h2>

    <form action="{{ route('research-topics.update', $topic->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $topic->title }}" >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ $topic->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="allowance" class="form-label">Trợ cấp:</label>
            <input type="number" id="allowance" name="allowance" class="form-control" value="{{ $topic->allowance }}" min="0" step="0.01">
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $topic->start_date }}" >
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $topic->end_date }}" >
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="{{ route('research-topics.index') }}" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
</div>
@endsection
