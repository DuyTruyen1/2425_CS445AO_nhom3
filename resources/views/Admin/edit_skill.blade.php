@extends('layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('asset/CSS/skill.css') }}">

<!-- Edit Skill Form -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Sửa Kỹ Năng</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('skills.update', $skill->id) }}" method="POST" role="form">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="skill_name">Tên Kỹ Năng</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="skill_name" name="name" value="{{ old('name', $skill->name) }}">
                    
                    <!-- Hiển thị lỗi nếu có -->
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">Cập Nhật</button>

                </div>

            </form>
        </div>
    </div>
</div>

@endsection
