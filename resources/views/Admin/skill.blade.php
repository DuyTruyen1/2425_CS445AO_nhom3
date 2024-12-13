@extends('layout.main')

@section('content')

<!-- Thêm CSS riêng -->
<link rel="stylesheet" href="{{ asset('asset/CSS/skill.css') }}">

<div class="container mt-5">
    <!-- Add Skill Form -->
    <div class="card">
        <div class="card-header">
            <h4>Thêm Kỹ Năng</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('skills.add') }}" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label for="skill_name">Tên Kỹ Năng</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="skill_name" name="name" placeholder="Nhập tên kỹ năng" value="{{ old('name') }}">
                    
                    <!-- Hiển thị lỗi nếu có -->
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">Thêm</button>

                </div>
            </form>
        </div>
    </div>

    <!-- Skills Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h4>Danh Sách Kỹ Năng</h4>
        </div>
        <div class="card-body">
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
                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-sm btn-info">Sửa</a>
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

@endsection
