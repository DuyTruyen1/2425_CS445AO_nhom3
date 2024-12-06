<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <!-- Favicon -->
    <link rel="icon" href="/assets_admin/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets_admin/css/app.css" rel="stylesheet">
    <link href="/assets_admin/css/icons.css" rel="stylesheet">
</head>

<body class="bg-login">
    <!-- Wrapper -->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="assets/images/logo-img.png" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <!-- Hiển thị thông báo lỗi và thành công -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div class="text-center">
                                        <h3 class="">Đặt Lại Mật Khẩu</h3>
                                    </div>

                                    <div class="form-body">
                                        <!-- Form Đặt lại mật khẩu -->
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $email }}">

                                            <!-- Mã OTP -->
                                            <div class="mb-3">
                                                <label for="reset_code" class="form-label">Mã OTP</label>
                                                <input type="text" name="reset_code" class="form-control" placeholder="Nhập mã OTP">
                                                @error('reset_code')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Mật khẩu mới -->
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Mật Khẩu Mới</label>
                                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Xác nhận mật khẩu mới -->
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Xác Nhận Mật Khẩu Mới</label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu mới">
                                                @error('password_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-warning btn-block"><i class="bx bxs-lock-open"></i>Đặt lại mật khẩu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
            </div>
        </div>
    </div>
    <!-- End wrapper -->

    <!-- Bootstrap JS -->
    <script src="/assets_admin/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="/assets_admin/js/jquery.min.js"></script>
    <!-- Password Show & Hide JS -->
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
</body>

</html>
