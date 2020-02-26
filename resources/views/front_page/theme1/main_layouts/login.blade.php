<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
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

    <!-- Document Title
	============================================= -->
    <title>Login | Mizan Amanah</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="" class="clearfix">

        <!-- Content
		============================================= -->
        <section id="content">

            <div class="content-wrap nopadding">

                <div class="section nopadding nomargin"
                    style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('{{asset('themes/theme1/demos/nonprofit/images/slider/1.jpg')}}') center center no-repeat; background-size: cover; overflow-y:scroll !important;">
                </div>

                <div class="section nobg full-screen nopadding nomargin">
                    <div class="container-fluid vertical-middle divcenter clearfix">


                        <div class="card divcenter noradius noborder"
                            style="max-width: 400px; background-color: rgba(255,255,255,0.93);">

                            <div class="center">
                                <a href="index.html"><img src="{{asset('themes/theme1/images/logo-laz-mizan-amanah.png')}}" alt="Canvas Logo" width="300px;" style="margin-top: 30px; margin-bottom: 20px;"></a>
                            </div>
                            <div class="card-body" style="padding: 40px;" id="login">
                                <form id="login-form" name="login-form" class="nobottommargin" action="{{Route('front_page.pro_login')}}" method="post">
                                {{ csrf_field() }}
                                    <h3>@lang('language.masuk')</h3>

                                    <div class="col_full">
                                        <label for="login-form-username">Username:</label>
                                        <input type="text" id="username" name="username" value=""
                                            class="form-control not-dark" 
                                            onkeypress="if (event.keyCode==13){ cek_simpan();return false;}"/>
                                    </div>

                                    <div class="col_full">
                                        <label for="login-form-password">@lang('language.katasandi'):</label>
                                        <input type="password" id="password" name="password"
                                            value="" class="form-control not-dark" 
                                            onkeypress="if (event.keyCode==13){ cek_simpan();return false;}"/>
                                    </div>

                                    <div class="col_full nobottommargin">
                                        <a href="{{Route('front_page.forgot_password')}}" class="fright">@lang('language.lupa_password')</a>
                                    </div>

                                    <div class="col_full">
                                        <button class="button btn-program btn-block" type="button" onclick="cek_simpan()" id="login-form-submit"
                                            name="login-form-submit" value="login"
                                            style="margin-top: 20px; border-radius: 10px;">@lang('language.masuk')</button>
                                    </div>
                                </form>

                                <div class="line line-sm"></div>

                                <div class="center">
                                    <h6 style="margin-bottom: 15px;"><a href="{{Route('front_page.register')}}">@lang('language.daftar_akun')</a>
                                    </h6>

                                </div>
                            </div>

                            <div class="card-body" style="padding: 40px;" id="forgot_password">
                                <form id="forgot-password-form" name="login-form" class="nobottommargin" action="{{Route('front_page.post_reset_password', $userid)}}" method="post">
                                {{ csrf_field() }}
                                    <h3>@lang('language.masukan_password_baru')</h3>

                                    <div class="col_full">
                                        <label for="login-form-password">@lang('language.katasandi'):</label>
                                        <input type="password" id="pass_baru" name="pass_baru" value=""
                                            class="form-control not-dark" />
                                    </div>

                                    <div class="col_full">
                                        <label for="login-form-password-confirm">@lang('language.konfirmasi_katasandi'):</label>
                                        <input type="password" id="password-confirm" name="password"
                                            value="" class="form-control not-dark" />
                                            <input type="hidden" name="trigger" value="forgot password">
                                            <input type="hidden" name="token" value="{{$token}}">
                                    </div>

                                    <div class="col_full">
                                        <button class="button btn-program btn-block" type="button" onclick="cek_simpan_password()" id="login-form-submit"
                                            name="login-form-submit" value="login"
                                            style="margin-top: 20px; border-radius: 10px;">@lang('language.masuk')</button>
                                    </div>
                                </form>

                                <div class="line line-sm"></div>

                                <div class="center">
                                    <h6 style="margin-bottom: 15px;"><a href="{{Route('front_page.register')}}">@lang('language.daftar_akun')</a>
                                    </h6>

                                </div>
                            </div>
                        </div>

                        <div class="center dark"><small>Copyrights &copy; Mizan Amanah.</small></div>

                    </div>
                </div>

            </div>

        </section><!-- #content end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
	============================================= -->
    <script src="{{asset('themes/theme1/js/jquery.js')}}"></script>
    <script src="{{asset('themes/theme1/js/plugins.js')}}"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="{{asset('themes/theme1/js/functions.js')}}"></script>

    <script>
        function cek_simpan(){
            if($("#username").val() == ""){
                alert('Username Anda Kosong')
            }else if($("#password").val() == ""){
                alert('Password Anda Kosong')
            }else{
                $("#login-form").submit()
            }
        }

        function cek_simpan_password(){
            console.log($("#pass_baru").val())
            console.log($("#password-confirm").val())
            if($("#pass_baru").val() == "" || $("#password-confirm").val() == ""){
                alert('password tidak boleh kosong')
            }else if($("#pass_baru").val() != $("#password-confirm").val()){
                alert('password berbeda')
            }else{
                $("#forgot-password-form").submit()
            }
        }

        $( document ).ready(function() {
            if({{$alert}} == 1){
                alert("@lang('language.validasi_uname_pass')")
            }else if({{$alert}} == 2){
                alert('Cek Email Anda Untuk Link Lupa Password')
            }else if({{$alert}} == 3){
                alert('Link Lupa Password Sudah Kadaluarsa')
            }

            if({{$status}} == 0){
                $("#forgot_password").hide()
            }else if({{$status}} == 1){
                $("#login").hide()
            }
        });
    </script>

</body>

</html>