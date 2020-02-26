<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('themes/theme1/css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{asset('themes/theme1/images/mizan-bulat.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('themes/theme1/images/mizan-bulat.png')}}">
    <style>
        .error{ color:red; }
    </style>

    <!-- Document Title
	============================================= -->
    <title>Daftar | Mizan Amanah</title>

</head>

<script>
    function cek_email(){
		var email = $("#email").val()
		console.log(email)
		$.ajax({
			type:'GET',
			url:'{{Route("front_page.register")}}'+'/cek_email/'+email,
            dataType: 'Json',
			success:function(data){
				console.log(data)
				if (data == null) {
					$("#cek_hasil_email").val(0)
				}else{
					alert('Email Sudah Terdaftar !');
                    $('#email').val('');
					$("#cek_hasil_email").val(1)
				}
			}
		})
    }
    
    function cek_simpan(){
        if($('#g-recaptcha-response').val() == ""){
            alert('Captcha Tidak Boleh Kosong')
        }else if($("#nama").val() == ""){
            alert('nama tidak boleh kosong')
        }else if($("#username").val() == ""){
            alert('username tidak boleh kosong')
        }else if($("#email").val() == ""){
            alert('email tidak boleh kosong')
        }else if(($("#password1").val() != $("#password2").val() || $("#password1").val() == "" || $("#password2").val() == "")){
            alert('password tidak sama dan tidak boleh kosong')
        }else if($("#nama").val() == ""){
            alert('nama tidak boleh kosong')
        }else if( /(.+)@(.+){2,}\.(.+){2,}/.test($("#email").val()) ){
            alert('Berhasil Mendaftar, Silahkan Login');
            $("#form").submit()
        } else {
            alert('email Tidak Valid')
		}
    }
</script>

<body style="background: url('{{asset('themes/theme1/demos/nonprofit/images/slider/1.jpg')}}') center center no-repeat; background-size: cover;">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix" style="width: 50%;">

        <!-- Content
		============================================= -->
        <!-- <section id="content">

            <div class="content-wrap nopadding">

                <div class="section nopadding nomargin"
                    style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('{{asset('themes/theme1/demos/nonprofit/images/slider/1.jpg')}}') center center no-repeat; background-size: cover;">
                </div>

                <div class="section nobg full-screen nopadding nomargin">
                    <div class="container-fluid vertical-middle divcenter clearfix"> -->


                   <!--  <div class="card divcenter noradius noborder"
                            style="max-width: 400px; background-color: rgba(255,255,255,0.93);"> -->
                        <div id="register-box" >

                            <div class="center">
                                <a href="{{url('home')}}"><img src="{{asset('themes/theme1/images/logo-laz-mizan-amanah.png')}}" alt="Canvas Logo" width="300px;" style="margin-top: 30px; margin-bottom: 20px;"></a>
                            </div>
                            <div class="card-body" style="padding: 40px;">
                                <form id="form" name="login-form" class="nobottommargin" action="{{Route('front_page.pro_register')}}" method="post">
                                {{csrf_field()}}
                                    <h3>@lang('language.daftar_akun')</h3>

                                    <div class="col_full">
                                        <label for="login-form-username">@lang('language.nama_lengkap') :</label>
                                        <input type="text" id="nama" name="nama" value=""
                                            class="form-control not-dark" />
                                    </div>

                                    <div class="col_full">
                                        <label for="login-form-username">@lang('language.alamat') :</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control not-dark">
                                    </div>

                                     <div class="col_full">
                                        <label for="login-form-username">@lang('language.telp') :</label>
                                        <input type="text" name="telp" id="telp" class="form-control not-dark">
                                    </div>

                                    <div class="col_full">
                                        <label for="login-form-username">Username :</label>
                                        <input type="text" id="username" name="username" value=""
                                            class="form-control not-dark" />
                                    </div>

                                    <div class="col_full">
                                        <label for="login-form-username">Email :</label>
                                        <input type="text" id="email" oninput="cek_email()" name="email" value="" class="form-control not-dark" />
                                            <input type="hidden" id="cek_hasil_email" value="" class="form-control not-dark" />
                                    </div>
                                    
                                    <div class="col_full">
                                        <label for="login-form-password">@lang('language.katasandi'):</label>
                                        <input type="password" id="password1" name="password1"
                                            value="" class="form-control not-dark" />
                                    </div>
                                    
                                    <div class="col_full">
                                        <label for="login-form-password">@lang('language.konfirmasi_katasandi'):</label>
                                        <input type="password" id="password2" name="password2"
                                            value="" class="form-control not-dark" />
                                    </div>

                                    <div class="form-group">
                                        <label for="captcha">Captcha</label>
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    </div>
                                 
                                    <div class="col_full">
                                        <button type="button" onclick="cek_simpan()" class="button btn-program btn-block" id="login-form-submit"
                                            name="login-form-submit" value="login"
                                            style="margin-top: 20px; border-radius: 10px;">@lang('language.daftar')</button>
                                    </div>
                                </form>

                                <div class="line line-sm"></div>

                                <div class="center">
                                    <h6 style="margin-bottom: 15px;"><a href="{{Route('front_page.login')}}">@lang('language.punya_akun')</a>
                                    </h6>

                                </div>
                            </div>
                        </div>

                        <!-- <div class="center dark"><small>Copyrights &copy; Mizan Amanah.</small></div>

                    </div>
                </div>

            </div>

        </section> --><!-- #content end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
	============================================= -->
    <script src="{{asset('themes/theme1/js/jquery.js')}}"></script>
    <script src="{{asset('themes/theme1/js/plugins.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="{{asset('themes/theme1/js/functions.js')}}"></script>

</body>

</html>