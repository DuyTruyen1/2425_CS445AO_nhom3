@extends('layout.main')

@section('content')

<!-- Thêm CSS riêng -->
<link rel="stylesheet" href="{{ asset('asset/CSS/skill.css') }}">

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">✏️ Thêm Kỹ Năng ✏️</h2>

    <!-- Add Skill Form -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Thêm Kỹ Năng</h4>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('skills.add') }}" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label for="skill_name" class="fw-bold text-primary">Tên Kỹ Năng</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="skill_name" name="name" placeholder="Nhập tên kỹ năng" value="{{ old('name') }}">
                    
                    <!-- Hiển thị lỗi nếu có -->
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3 w-100">Thêm</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Skills Table -->
    <div class="card mt-4 shadow-lg border-0">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Danh Sách Kỹ Năng</h4>
        </div>
        <div class="card-body bg-light">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên Kỹ Năng</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <td>{{ $skill->id }}</td>
                            <td>{{ $skill->name }}</td>
                            <td>
                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('skills.delete', $skill->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    h2 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
    .card {
        border-radius: 15px;
    }
    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }
    .btn {
        transition: background-color 0.3s, transform 0.2s;
    }
    .btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }
    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-2px);
    }
    .table thead {
        background-color: #007bff;
        color: #fff;
    }
</style>

@endsection
