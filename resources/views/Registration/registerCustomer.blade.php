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
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper" id="app">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="/assets_admin/images/logo-img.png" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Đăng Ký</h3>
                                        <p>Bạn có sẳn sàng để đăng ký một tài khoản? <a href="./login">Đăng Nhập Tại Đây</a></p>
                                    </div>
                                    <div class="form-body">
                                        <!-- Ensure CSRF token is included -->
                                        <form method="POST" id="formdata" class="row g-3">
                                            @csrf <!-- CSRF Token -->
                                            <div class="col-sm-12">
                                                <label class="form-label">Họ Và Tên</label>
                                                <input name="name" id="txtName" value="{{ old('name') }}" type="text" class="form-control" placeholder="Nhập vào họ và tên">
                                                @if($errors->has('name'))
                                                    <span class="error-text">
                                                        {{$errors->first('name')}}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input name="email" type="email" id="txtEmail" value="{{ old('email') }}" class="form-control" placeholder="example@user.com">
                                                @if($errors->has('email'))
                                                    <span class="error-text">
                                                        {{$errors->first('email')}}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input id="txtPassword" name="password" type="password" class="form-control border-end-0" placeholder="Nhập vào mật khẩu"> 
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    @if($errors->has('password'))
                                                        <span class="error-text">
                                                            {{$errors->first('password')}}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Confirm Password</label>
                                                <div class="input-group">
                                                    <input id="txtPassword2" name="confirm_password" type="password" class="form-control border-end-0" placeholder="Nhập lại mật khẩu"> 
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    @if($errors->has('confirm_password'))
                                                        <span class="error-text">
                                                            {{$errors->first('confirm_password')}}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="Category">Loại tài khoản</label>
                                                <select class="form-control" name="category" id="txtCategory">
                                                    <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>Sinh viên</option>
                                                    <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>Nhà trường</option>
                                                    <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>Công ty</option>
                                                </select>
                                                @if($errors->has('category'))
                                                    <span class="error-text">
                                                        {{$errors->first('category')}}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Đăng Ký</button>
                                                </div>
                                            </div>
                                        </form>
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
    <!-- Bootstrap JS -->
    <script src="/assets_admin/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/assets_admin/js/jquery.min.js"></script>
    <script src="/assets_admin/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/assets_admin/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets_admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--Password show & hide js -->
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
    <!--app JS-->
    <script src="/assets_admin/js/app.js"></script>
</body>

</html>
