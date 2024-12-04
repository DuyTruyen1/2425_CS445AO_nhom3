@extends('layout.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Cập Nhật Blog</h2>

    <!-- Hiển thị lỗi (nếu có) -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form cập nhật -->
    <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tiêu đề -->
        <div class="form-group mb-3">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}">
        </div>

        <!-- Nội dung -->
        <div class="form-group mb-3">
            <label for="content">Nội dung:</label>
            <textarea name="content" id="content" class="form-control" rows="5">{{ old('content', $blog->content) }}</textarea>
        </div>

        <!-- Mô tả -->
        <div class="form-group mb-3">
            <label for="description">Mô tả:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $blog->description) }}</textarea>
        </div>

        <!-- Hình ảnh -->
        <div class="form-group mb-3">
            <label for="Hinh">Hình ảnh:</label>
            <input type="file" name="Hinh" id="Hinh" class="form-control">
            @if ($blog->Hinh)
                <p class="mt-2">Hình ảnh hiện tại: 
                    <img src="{{ asset('upload/' . $blog->Hinh) }}" alt="Hình ảnh" width="150">
                </p>
            @endif
        </div>

        <!-- Nút lưu -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('delete_blog') }}" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
</div>

@stop
