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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="bg-login">
	<!--wrapper-->
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
									<!-- Success and Danger Alerts -->
									@if(Session::has('success'))
										<div class="alert alert-success alert-dismissable">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>Thành công! </strong> {{Session::get('success')}}
										</div>
									@endif

									@if(Session::has('danger'))
										<div class="alert alert-danger alert-dismissable">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>Thất bại! </strong> {{\Session::get('danger')}}
										</div>
									@endif
									<!-- End Alerts -->

									<div class="text-center">
										<h3 class="">Đăng Nhập</h3>
										<p>Bạn chưa có tài khoản? <a href="./registration">Đăng Ký Tại Đây</a></p>
									</div>
									<div class="login-separater text-center mb-4"> 
										<span>OR SIGN IN WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form method="POST" class="row g-3">
											@csrf
											<div class="col-12">
												<label class="form-label">Email</label>
												<input name="email" type="email" class="form-control" placeholder="Nhập vào email" required>
											</div>
											<div class="col-12">
												<label class="form-label">Mật Khẩu</label>
												<div class="input-group" id="show_hide_password">
													<input name="password" type="password" class="form-control border-end-0" placeholder="Nhập vào mật khẩu" required> 
													<a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
											</div>
											<div class="col-md-6 text-end">	
												<a href="/authen_admintication-forgot-password.html">Quên Mật Khẩu?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Đăng Nhập</button>
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
</body>

</html>