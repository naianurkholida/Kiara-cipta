

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link
	href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700%7CMontserrat:300,400,500,600,700%7CMerriweather:300,400,300i,400i"
	rel="stylesheet" type="text/css" />
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
	<link rel="shortcut icon" href="{{asset('assets/images/dermaexpress.png')}}">

	<link rel="canonical" href="https://derma-express.com/">
	<meta name="description" content="klinik kecantikan dengan dokter dan layanan estetika terbaik di Indonesia.">
	<title>Derma Express , Klinik Kecantikan dengan Dokter dan Layanan Estetika Terbaik di Indonesia.</title>
</head>
<body>
	<div class="container-login">
		<div class="img-login" style="background-image: url('http://localhost:8000/assets/admin/assets/media/bg/login-frontend.jpg');"></div>
		<div class="login-box">
			<div class="form-log">
				<!--begin::Signin-->
				<div class="kt-login__form">
					<div class="kt-login__title">
						<center>
							<img src="{{ asset(Helper::logo()) }}" style="width: 200px;"><br>
						</center>
						<h3>Reset Password</h3>
					</div>			

					<!--begin::Form-->
					<form action="{{ url('sign/forgot/next') }}" method="POST">
						{{csrf_field()}}
						<label>Username</label>
						<div class="input-group">
							<input type="username" name="username" id="username" class="form-control input-logfront" placeholder="Username">
						</div>

						<label>Password</label>
						<div class="input-group">
							<input type="password" name="password" id="password" class="form-control input-logfront" placeholder="Password" maxlength="8" minlength="8">
						</div>

						<label>New Password</label>
						<div class="input-group">
							<input type="password" name="new_password" id="new_password" class="form-control input-logfront" placeholder="New Password" maxlength="8" minlength="8">
						</div>

						<!--begin::Action-->
						<div class="kt-login__actions">
							<button type="button" id="reset_password" class="btn btn-primary btn-sm btn-elevate kt-login__btn-primary" style="width: 100%; height: 40px;">Reset Password</button>
						</div>
						<!--end::Action-->
						<div class="action-login">
							<a href="{{route('loginfront.login')}}">Login</a>
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
		var username = '';
		var password = '';

		$('#reset_password').click(function(event) {
			username = $('#username').val()
			password = $('#password').val()
			new_password = $('#new_password').val()

			if(username == null || username == ''){
				$.notify("username is required", "warn");
			}else if(password == null || password == ''){
				$.notify("password is required", "warn");
			}else if(new_password == null || new_password == ''){
				$.notify("new password is required", "warn");
			}else{

				$.ajax({
					url: '{{ url("sign/forgot/next") }}?username='+username+'&password='+password+'&new_password='+new_password,
					type: 'POST',
					dataType: 'json',
				})
				.done(function(res) {
					
					if(res.message[0].status == '200'){
						$.notify("Change password is successfully.", "success");

						window.location.href = '/sign';
					}else{
						$.notify("Change password is failed.", "error");
					}

				});

			}
		});
	});
</script>
</html>