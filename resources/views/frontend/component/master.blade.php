<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400i,700%7CMontserrat:300,400,500,600,700%7CMerriweather:300,400,300i,400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/swiper.css')}}" type="text/css" />

    <!-- shop Demo Specific Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/demos/shop/shop.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/demos/shop/css/fonts.css')}}" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="{{asset('assets/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{{asset('assets/css/colors.php?color=000000')}}" type="text/css" />

    <!-- Document Title
	============================================= -->
    <title>Home | Derma Express</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">
        <!-- Login Modal -->
        <div class="modal1 mfp-hide" id="modal-register">
            <div class="card divcenter" style="max-width: 540px;">
                <div class="card-header py-3 nobg center">
                    <h3 class="mb-0 t400">Hello, Welcome Back</h3>
                </div>
                <div class="card-body divcenter py-5" style="max-width: 70%;">

                    <a href="#" class="button button-large btn-block si-colored si-facebook nott t400 ls0 center nomargin"><i class="icon-facebook-sign"></i> Log in with Facebook</a>

                    <div class="divider divider-center"><span class="position-relative" style="top: -2px">OR</span></div>

                    <form id="login-form" name="login-form" class="nobottommargin row" action="#" method="post">

                        <div class="col-12">
                            <input type="text" id="login-form-username" name="login-form-username" value="" class="form-control not-dark" placeholder="Username" />
                        </div>

                        <div class="col-12 mt-4">
                            <input type="password" id="login-form-password" name="login-form-password" value="" class="form-control not-dark" placeholder="Password" />
                        </div>

                        <div class="col-12">
                            <a href="#" class="fright text-dark t300 mt-2">Forgot Password?</a>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="button btn-block nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer py-4 center">
                    <p class="mb-0">Don't have an account? <a href="#"><u>Sign up</u></a></p>
                </div>
            </div>
        </div>

        <!-- Top Bar
		============================================= -->
        <div id="top-bar" class="dark" style="background-color: #a3a5a7;">

            <div class="container clearfix">

                <div class="row justify-content-between">

                    <div class="col-lg-5 nobottommargin">


                    </div>

                    <div class="col-lg-7 d-none d-lg-flex justify-content-end">

                        <!-- Top Links
						============================================= -->
                        <div class="top-links">
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">FAQS</a></li>
                                <li><a href="#">Blogs</a></li>
                                <li><a href="#">EN</a>
                                    <ul>
                                        <li>
                                            <a href="#"><img src="{{asset('assets/images/icons/flags/french.png')}}'" alt="French"> FR</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{asset('assets/images/icons/flags/italian.png')}}" alt="Italian"> IT</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{asset('assets/images/icons/flags/german.png')}}" alt="German"> DE</a>
                                        </li>
                                    </ul>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                        <!-- .top-links end -->

                        <!-- Top Social
						============================================= -->
                        <div id="top-social">
                            <ul>
                                <li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                                <li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
                                <li><a href="tel:+91.11.85412542" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+91.11.85412542</span></a></li>
                                <li><a href="mailto:info@canvas.com" class="si-email3"><span class="ts-icon"><i class="icon-envelope-alt"></i></span><span class="ts-text">info@canvas.com</span></a></li>
                            </ul>
                        </div>
                        <!-- #top-social end -->

                    </div>
                </div>

            </div>

        </div>

        <!-- Header
		============================================= -->
        @include('frontend.component.header')
        <!-- #header end -->

        @yield('content')

        <!-- end yt -->

        <div class="section topmargin nobottommargin nobottomborder" style="padding: 25px 0;margin: 0 !important; background-color: #f9f9f9 !important; ">
            <div class="container clearfix">
                <center>
                    <a href="#" class="si-facebook" style="padding:10px"><span class="ts-icon" style="margin-right: 10px;"><i class="icon-facebook" ></i></span><span class="ts-text" style="margin-right: 10px;">Facebook</span></a>
                    <a href="#" class="si-instagram" style="padding:10px"><span class="ts-icon" style="margin-right: 10px;"><i class="icon-instagram2"></i></span><span class="ts-text" style="margin-right: 10px;">Instagram</span></a>
                </center>
            </div>
        </div>
        <!-- Footer
		============================================= -->
        <footer id="footer" class="nobg noborder" style="background-color: #f9f9f9 !important;">



            <!-- Copyrights
			============================================= -->
            <div id="copyrights" class="nobg">

                <div class="container clearfix">

                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
                            <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                        </div>

                        <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
                            <div class="copyrights-menu copyright-links clearfix">
                                <a href="#">About</a>/<a href="#">Features</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- #copyrights end -->

        </footer>
        <!-- #footer end -->

    </div>
    <!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-line-arrow-up"></div>

    <!-- External JavaScripts
	============================================= -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="{{asset('assets/js/functions.js')}}"></script>

    <!-- ADD-ONS JS FILES -->
    <script>
        window.onscroll = function() {
            var slider = $('#slider');
            if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
                slider.addClass("scrolled-slider");
            } else {
                slider.removeClass("scrolled-slider");
            }
        }
    </script>

</body>

</html>