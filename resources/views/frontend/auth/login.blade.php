

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link
	href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700%7CMontserrat:300,400,500,600,700%7CMerriweather:300,400,300i,400i"
	rel="stylesheet" type="text/css" /> -->
	<link href="{{asset('assets/admin/assets/css/demo5/pages/login/login-1.css')}}" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400&display=swap"
	rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}" type="text/css" />


	<!-- shop Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/demos/shop/shop.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/demos/shop/css/fonts.css')}}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{asset('assets/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="{{asset('assets/css/colors.php?color=65b5aa')}}" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
	type="text/css" />

	<link href="{{asset('assets/admin/assets/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/general/dual-listbox/dist/dual-listbox.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/admin/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />

	<!-- <link rel="shortcut icon" href="{{asset('assets/images/dermaexpress.png')}}"> -->

	<link rel="shortcut icon" href="{{asset('rsz_1logodermaexpress.png')}}">

	<link rel="canonical" href="https://derma-express.com/">
	<meta name="description" content="klinik kecantikan dengan dokter dan layanan estetika terbaik di Indonesia.">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<title>Derma Express , Klinik Kecantikan dengan Dokter dan Layanan Estetika Terbaik di Indonesia.</title>
</head>
<body>
	<div class="container-login">
		<div class="img-login" style="background-image: url('/assets/admin/assets/media/bg/banner-login-dex.jpg');"></div>
		<div class="login-box">
			<div class="form-log">
				<!--begin::Signin-->
				
				<div class="kt-login__form">

					<div class="kt-login__title">
						<center>
							<img src="{{ asset(Helper::logo_login()) }}" style="width: 150px;"><br>
						</center>
					</div>			

					<!--begin::Form-->
					<form action="{{ url('sign/next') }}" method="POST" style="margin-top: 20px">
						<div class="card" style="margin-top: 20px; border-radius: 15px;">

							<div class="card-body">
								<h3 class="text-center" style="margin-bottom: 20px;">Hello DexPeople</h3>

								@if(Session::get('alert'))
								<div class="alert alert-danger alert-block">
									{{Session::get('alert')}}
								</div>
								@endif

								{{csrf_field()}}
								<label>Username</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="la la-user"></i></span>
									</div>
									<input type="text" name="username" id="username" class="form-control" placeholder="TELEPON" aria-label="Username" aria-describedby="basic-addon1" style="height: 45px;">
								</div>

								<label>Password</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-key"></i>
										</span>
									</div>
									<input type="password" name="password" id="password" class="form-control" aria-label="" placeholder="DDMMYYYY"value="" maxlength="8" minlength="8" style="height: 45px;" value="">
									<div class="input-group-append" id="show_password">
										<span class="input-group-text" id="check_password"><i class="la la-eye"></i></span>
									</div>

									<div class="input-group-append" id="hide_password">
										<span class="input-group-text" id="check_password_close"><i class="la la-eye-slash"></i></span>
									</div>
								</div>

								<small style="color: red; line-height: 1px !important;">
									Jika kamu member Derma Express, Gunakan nomer ponsel dan tanggal lahir yang terdaftar di Derma Express Membership.
								</small>

								<!--begin::Action-->
								<div class="kt-login__actions">
									<button type="button" id="login" class="btn btn-primary btn-sm btn-elevate kt-login__btn-primary" style="width: 100%; height: 40px; margin-top: 20px;">Sign In</button>
								</div>
								<!--end::Action-->
								
							</div>
						</div>

						<div class="action-login">
							<span>Belum terdaftar ? </span>

							<a href="{{ url('home') }}" class="kt-link kt-login__link-forgot">
								Lanjutkan Tanpa Login
							</a>

						</div>
						<div style="margin-top: 0px;">
							<center>
								<a href="{{route('loginfront.forgot')}}">Lupa Password ?</a>
							</center>
						</div>
					</form>
					<!--end::Form-->
				</div>
				<!--end::Signin-->
			</div>
		</div>
	</div>
</body>
<script src="{{ asset('assets/theme/assets/plugins/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/theme/assets/plugins/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/theme/assets/plugins/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/theme/assets/plugins/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/theme/assets/plugins/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/theme/assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/theme/assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/theme/assets/plugins/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/theme/assets/plugins/general/wnumb/wNumb.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/notify.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#hide_password').hide();

		var username = '';
		var password = '';
		$('#login').click(function(event) {
			username = $('#username').val()
			password = $('#password').val()

			if(username == null || username == '' || password == null || password == ''){
				$.notify("username is required", "warn");
				$.notify("password is required", "warn");
			}else{

				$.ajax({
					url: '{{ url("sign/next?username=") }}'+username+'&password='+password,
					// url: 'http://103.11.135.246:1507/login?username='+username+'&password='+password,
					type: 'POST',
					crossDomain: true,
					dataType: 'json',
				})
				.done(function(res) {

					if(res.message[0].Status == '200'){
						$.notify("Login is successfully.", "success");

						window.location.href = '/dashboard-customer';
					}else{
						$.notify("Invalid username or password.", "error");
					}

				});

			}
		});
	});

	$(document).ready(function(){
		$('#check_password').click(function(){
			$('#password').attr('type','text');
			$('#hide_password').show();
			$('#show_password').hide();
		});

		$('#check_password_close').click(function(){
			$('#password').attr('type','password');
			$('#show_password').show();
			$('#hide_password').hide();
		});
	});
</script>
</html>