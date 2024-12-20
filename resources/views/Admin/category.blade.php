@extends('layout.main')
@section('content')

<!-- Thêm CSS riêng -->
<link rel="stylesheet" href="{{ asset('asset/CSS/category.css') }}">

<div class="container mt-5">
    <!-- Thêm danh mục form -->
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h4>🎯 Thêm Danh Mục Mới 🎯</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label for="category_name">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="category_name" name="name" placeholder="Nhập tên danh mục">
                </div>
                <button type="button" class="btn btn-primary btn-block mt-3" onclick="SaveCategory(this)">
                    <i class="fas fa-plus-circle"></i> Thêm Danh Mục
                </button>
            </form>
        </div>
    </div>

    <!-- Danh sách danh mục -->
    <div class="card mt-4 shadow-lg">
        <div class="card-header text-center">
            <h4>📋 Danh Sách Danh Mục 📋</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th hidden>ID</th>
                        <th>STT</th>
                        <th>Tên Danh Mục</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cat as $key => $ca)
                        <tr>
                            <td hidden>{{ $ca->id }}</td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $ca->name }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" onclick="EditCategory(this)">
                                    <i class="fas fa-edit"></i> Sửa
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="DeleteCategory(this)">
                                    <i class="fas fa-trash-alt"></i> Xóa
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Sửa Danh Mục -->
<div class="modal fade" id="modal-category" tabindex="-1" role="dialog" aria-labelledby="modal-categoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-categoryLabel">Sửa Danh Mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Tên Danh Mục</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Nhập tên danh mục cần sửa">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="SaveEdit()">Lưu Thay Đổi</button>
            </div>
        </div>
    </div>
</div>

<!-- Thêm CSS và hiệu ứng cho modal -->
<style>
    .card-header {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    .card-body {
        background-color: #f9f9f9;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table th, .table td {
        text-align: center;
        padding: 12px 15px;
    }

    .btn {
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .btn-info, .btn-danger {
        font-size: 12px;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-info {
        background-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-danger {
        background-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .modal-title {
        font-weight: bold;
    }

    .modal-body .form-group {
        margin-bottom: 1.5rem;
    }
</style>

@stop
