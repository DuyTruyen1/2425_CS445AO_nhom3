@extends('layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/CSS/user.css') }}">

<div class="container mt-5">
    <h2 class="text-center mb-4 text-primary">Chỉnh Sửa Thông Tin Người Dùng</h2>

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

    <!-- Form chỉnh sửa người dùng -->
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white text-center">
            <h4>Thông Tin Người Dùng</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.userAcc.update', $user->id) }}">
                @csrf
                @method('PUT')

                <table class="table table-borderless">
                    <tbody>
                        <!-- Tên -->
                        <tr>
                            <td><label for="name" class="fw-bold">Tên:</label></td>
                            <td>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" placeholder="Nhập tên người dùng">
                            </td>
                        </tr>

                        <!-- Email -->
                        <tr>
                            <td><label for="email" class="fw-bold">Email:</label></td>
                            <td>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Nhập email">
                            </td>
                        </tr>

                        <!-- Mật khẩu -->
                        <tr>
                            <td><label for="password" class="fw-bold">Mật khẩu mới:</label></td>
                            <td>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu mới">
                                <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Nút lưu -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary me-3 px-4">Cập Nhật</button>
                    <a href="{{ route('users') }}" class="btn btn-secondary px-4">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
