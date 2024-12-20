@extends('layout.main')
@section('content')

<!-- Thêm CSS riêng -->
<link rel="stylesheet" href="{{ asset('asset/CSS/user.css') }}">

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">🎯 Quản Lý Tài Khoản Người Dùng 🎯</h2>
    
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover shadow-lg">
            <thead class="thead-dark">
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
                            <a href="{{ route('admin.userAcc.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Chỉnh sửa
                            </a>

                            <!-- Nút xóa -->
                            <form method="POST" action="{{ route('admin.userAcc.delete', $user->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')">
                                    <i class="fas fa-trash-alt"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    h2 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
    .table-container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .table {
        border-radius: 10px;
        overflow: hidden;
    }
    .table th, .table td {
        text-align: center;
        padding: 10px;
    }
    .table th {
        background-color: #007bff;
        color: #fff;
    }
    .table td {
        background-color: #f9f9f9;
    }
    .btn {
        transition: background-color 0.3s, transform 0.2s;
    }
    .btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }
    .btn-warning {
        background-color: #ff9800;
    }
    .btn-warning:hover {
        background-color: #f57c00;
    }
    .btn-danger {
        background-color: #e74c3c;
    }
    .btn-danger:hover {
        background-color: #c0392b;
    }
</style>

@stop
