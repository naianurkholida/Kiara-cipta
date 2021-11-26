

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
    <div class="img-login" style="background-image: url('https://derma-express.com/assets/admin/assets/media/slider/Slider_20210714041916.jpg');"></div>
    <div class="login-box">
        <div class="form-log">
                        <!--begin::Signin-->
						<div class="kt-login__form">
							<div class="kt-login__title">
                                <center>
								<img src="{{ asset(Helper::logo()) }}" style="width: 200px;"><br>
								</center>
                                <h3>Sign Up</h3>
							</div>			

							<!--begin::Form-->
							<form action="" method="POST">
								@if(Session::get('alert'))
								<div class="alert alert-danger alert-block">
									{{Session::get('alert')}}
								</div>
								@endif
								{{csrf_field()}}
								<label>Nama</label>
								<div class="input-group">
									<input type="nama" name="nama" class="form-control input-logfront" placeholder="Nama">
								</div>
								<label>Email</label>
								<div class="input-group">
									<input type="email" name="email" class="form-control input-logfront" placeholder="Email">
								</div>
								<label>password</label>
								<div class="input-group">
									<input type="password" name="password" class="form-control input-logfront" placeholder="password">
								</div>
								<label>Confirm Password</label>
								<div class="input-group">
									<input type="password" name="confirmpassword" class="form-control input-logfront" placeholder="Confirm Password">
								</div>
								<!--begin::Action-->
								<div class="kt-login__actions">
									<!-- <a href="#" class="kt-link kt-login__link-forgot">
										Forgot Password ?
									</a> -->
									<button type="submit" class="btn btn-primary btn-sm btn-elevate kt-login__btn-primary" style="width: 100%; height: 40px;">Buat Akun</button>
								</div>
								<!--end::Action-->
                                <div class="action-login">
                                    <a href="{{route('loginfront')}}">Login</a>
                                </div>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
        </div>
    </div>
</div>
</body>
</html>