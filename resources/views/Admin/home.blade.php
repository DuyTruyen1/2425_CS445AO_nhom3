@extends('layout.main')

@section('content')
    <div class="container mt-4">
        <!-- Tiêu đề trang -->
        <h1 class="text-center mb-4" style="font-weight: bold;">Chào mừng đến với Trang Quản Trị</h1>
        
        <div class="row">
            <!-- Tổng số người dùng -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Tổng số người dùng</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $usersCount }}</h5>
                        <p class="card-text">Tổng số người dùng hiện tại trong hệ thống.</p>
                    </div>
                </div>
            </div>

            <!-- Tổng số bài đăng blog -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Tổng số bài đăng blog</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $blogsCount }}</h5>
                        <p class="card-text">Số lượng bài viết hiện có trong hệ thống.</p>
                    </div>
                </div>
            </div>

            <!-- Tổng số tin nhắn -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Tổng số tin nhắn</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $messagesCount }}</h5>
                        <p class="card-text">Số lượng tin nhắn hiện có trong hệ thống.</p>
                    </div>
                </div>
            </div>

            <!-- Tổng số feedback -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Tổng số phản hồi</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $feedbacksCount }}</h5>
                        <p class="card-text">Số lượng phản hồi hiện có từ người dùng.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bảng danh sách người dùng -->
        <div class="mt-4">
            <h3>Danh sách người dùng</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
@stop()
