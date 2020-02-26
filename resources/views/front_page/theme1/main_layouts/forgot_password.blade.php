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
    <div id="wrapper" class="clearfix">

        <!-- Content
		============================================= -->
        <section id="content">

            <div class="content-wrap nopadding">

                <div class="section nopadding nomargin"
                    style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('{{asset('themes/theme1/demos/nonprofit/images/slider/1.jpg')}}') center center no-repeat; background-size: cover;">
                </div>

                <div class="section nobg full-screen nopadding nomargin">
                    <div class="container-fluid vertical-middle divcenter clearfix">


                        <div class="card divcenter noradius noborder"
                            style="max-width: 400px; background-color: rgba(255,255,255,0.93);">

                            <div class="center">
                                <a href="index.html"><img src="{{asset('themes/theme1/images/mizan-panjang.png')}}" alt="Canvas Logo"
                                        height="100px;" style="margin-top: 30px; margin-bottom: 20px;"></a>
                            </div>
                            <div class="card-body" style="padding: 40px;">
                                <form id="form" name="login-form" class="nobottommargin" action="{{Route('front_page.forgot_password_post')}}" method="post">
                                {{ csrf_field() }}
                                    <h3>@lang('language.forgot_password')</h3>

                                    <div class="col_full">
                                        <label for="login-form-username">email:</label>
                                        <input type="text" id="email" name="email" value=""
                                            class="form-control not-dark" onfocusout="cek_email()"/>
                                        <input type="hidden" id="cek_hasil_email">
                                    </div>

                                    <div class="col_full">
                                        <button class="button btn-program btn-block" type="button" onclick="cek_simpan()" id="login-form-submit"
                                            name="login-form-submit" value="login"
                                            style="margin-top: 20px; border-radius: 10px;">@lang('language.kirim')</button>
                                    </div>
                                </form>

                                <div class="line line-sm"></div>

                                <div class="center">
                                    <h6 style="margin-bottom: 15px;"><a href="{{Route('front_page.login')}}">@lang('language.punya_akun')</a>
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
        function cek_email(){
            var email = $("#email").val()
            console.log(email)
            $.ajax({
                type:'GET',
                url:'{{Route("front_page.register")}}'+'/cek_email/'+email,
                success:function(data){
                    console.log(JSON.parse(data))
                    if (JSON.parse(data) == null) {
                        alert('Email Tidak Ditemukan')
                        $("#cek_hasil_email").val(1)
                    }else{
                        $("#cek_hasil_email").val(0)
                    }
                }
            })
        }

        function cek_simpan(){
            if($("#cek_hasil_email").val() == 1){
                alert('Email Tidak Ditemukan')
            }else if( /(.+)@(.+){2,}\.(.+){2,}/.test($("#email").val()) ){
                $("#form").submit()
            } else {
                alert('email Tidak Valid')
            }
        }
    </script>

</body>

</html>