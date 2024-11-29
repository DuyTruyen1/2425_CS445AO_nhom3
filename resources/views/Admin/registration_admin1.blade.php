<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--favicon-->
    <link rel="icon" href="/assets_admin/images/favicon-32x32.png" type="image/png" />

    <!--plugins-->
    <link href="/assets_admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/assets_admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/assets_admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- loader-->
    <link href="/assets_admin/css/pace.min.css" rel="stylesheet" />
    <script src="/assets_admin/js/pace.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="/assets_admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets_admin/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="/assets_admin/css/app.css" rel="stylesheet">
    <link href="/assets_admin/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom CSS for form -->
    <style>
        .error-text {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .input-error {
            border-color: red !important;
        }
    </style>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper" id="app">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3>Đăng Ký</h3>
                                        <p>Bạn đã có tài khoản? <a href="./login">Đăng Nhập Tại Đây</a></p>
                                    </div>
                                    <div class="form-body">
                                        <!-- Form bắt đầu -->
                                        <form method="POST" id="formdata" class="row g-3">
                                            @csrf <!-- Token CSRF -->

                                            <!-- Họ và tên -->
                                            <div class="col-sm-12">
                                                <label class="form-label">Họ Và Tên</label>
                                                <input name="name" id="txtName" value="{{ old('name') }}" type="text" class="form-control @error('name') input-error @enderror" placeholder="Nhập vào họ và tên">
                                                @error('name')
                                                <span class="error-text">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input name="email" type="email" id="txtEmail" value="{{ old('email') }}" class="form-control @error('email') input-error @enderror" placeholder="example@user.com">
                                                @error('email')
                                                <span class="error-text">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Mật khẩu -->
                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <input id="txtPassword" name="password" type="password" class="form-control @error('password') input-error @enderror" placeholder="Nhập vào mật khẩu">
                                                @error('password')
                                                <span class="error-text">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Xác nhận mật khẩu -->
                                            <div class="col-12">
                                                <label class="form-label">Confirm Password</label>
                                                <input id="txtPassword2" name="confirm_password" type="password" class="form-control @error('confirm_password') input-error @enderror" placeholder="Nhập lại mật khẩu">
                                                @error('confirm_password')
                                                <span class="error-text">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Address</label>
                                                <input name="address" type="text" class="form-control" placeholder="Nhập vào địa chỉ">
                                                @error('address')
                                                <span class="error-text">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Nút đăng ký -->
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-warning"><i class='bx bx-user'></i> Đăng Ký</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Form kết thúc -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->

    <!-- Scripts -->
    <script src="/assets_admin/js/bootstrap.bundle.min.js"></script>
    <script src="/assets_admin/js/jquery.min.js"></script>
    <script src="/assets_admin/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/assets_admin/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets_admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr Notifications -->
    <script>
        @if (session('success'))
            toastr.success('{{ session('success') }}', 'Thành công', { timeOut: 5000 });
        @endif

        @if (session('danger'))
            toastr.error('{{ session('danger') }}', 'Thất bại', { timeOut: 5000 });
        @endif
    </script>

    <!--app JS-->
    <script src="/assets_admin/js/app.js"></script>
</body>

</html>
