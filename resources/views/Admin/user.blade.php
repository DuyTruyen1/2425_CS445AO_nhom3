@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('asset/CSS/user.css') }}">

<div class="table-container">
    <h2 class="text-center">Quản Lý Tài Khoản Người Dùng</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th hidden>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td hidden>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Nút cập nhật -->
                        <a href="{{ route('admin.userAcc.edit', $user->id) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>

                        <!-- Nút xóa -->
                        <form method="POST" action="{{ route('admin.userAcc.delete', $user->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
