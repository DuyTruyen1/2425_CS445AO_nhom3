@extends('Pages.layout.menu')

@section('title', 'Chỉnh sửa đề tài')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">✏️ Chỉnh sửa đề tài nghiên cứu ✏️</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops! Có lỗi xảy ra:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('research-topics.update', $topic->id) }}" method="POST" class="p-4 border rounded shadow bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label fw-bold">✨ Tiêu Đề Đề Tài</label>
            <input type="text" id="title" name="title" class="form-control border-primary" value="{{ $topic->title }}" placeholder="Nhập tiêu đề đề tài" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">📝 Mô Tả</label>
            <textarea id="description" name="description" class="form-control border-primary" rows="4" placeholder="Nhập mô tả về đề tài" required>{{ $topic->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="allowance" class="form-label fw-bold">💰 Trợ Cấp</label>
            <input type="number" id="allowance" name="allowance" class="form-control border-primary" value="{{ $topic->allowance }}" min="0" step="0.01" placeholder="Nhập trợ cấp (nếu có)" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label fw-bold">📅 Ngày Bắt Đầu</label>
                <input type="date" id="start_date" name="start_date" class="form-control border-primary" value="{{ $topic->start_date }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label fw-bold">📅 Ngày Kết Thúc</label>
                <input type="date" id="end_date" name="end_date" class="form-control border-primary" value="{{ $topic->end_date }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-warning btn-lg px-4">✔️ Cập nhật</button>
            <a href="{{ route('research-topics.index') }}" class="btn btn-secondary btn-lg px-4">❌ Hủy</a>
        </div>
    </form>
</div>

<style>
    h2 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    form {
        background-color: #f9f9f9;
        border: 2px solid #ddd;
    }
    form .form-label {
        color: #333;
        font-weight: 600;
    }
    form .form-control {
        transition: border-color 0.3s;
    }
    form .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }
    .btn {
        font-weight: 600;
        padding: 10px 20px;
        font-size: 16px;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
</style>
@endsection
