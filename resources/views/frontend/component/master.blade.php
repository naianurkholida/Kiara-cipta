<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Page with empty content">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Stylesheets
    	============================================= -->
    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,400,400i,700%7CMontserrat:300,400,500,600,700%7CMerriweather:300,400,300i,400i"
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
    <!-- Document Title
    	============================================= -->
    <title>Home | Derma Express</title>
    @php
    $next = asset('assets/image/next.png');
    $prev = asset('assets/image/prev.png');
    $close = asset('assets/image/close.png');
    @endphp
    <style>
        .lb-nav a.lb-prev {
            background: url(<?= $prev ?>) left 48% no-repeat;
            background-size: 50px;
        }

        .lb-nav a.lb-next {
            background: url(<?= $next ?>) right 48% no-repeat;
            background-size: 50px;
        }

        .lb-data .lb-close {
            background: url(<?= $close ?>) top right no-repeat;
            background-size: 20px;
        }

    </style>
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

                    <a href="#"
                        class="button button-large btn-block si-colored si-facebook nott t400 ls0 center nomargin"><i
                            class="icon-facebook-sign"></i> Log in with Facebook</a>

                    <div class="divider divider-center"><span class="position-relative" style="top: -2px">OR</span>
                    </div>

                    <form id="login-form" name="login-form" class="nobottommargin row" action="#" method="post">

                        <div class="col-12">
                            <input type="text" id="login-form-username" name="login-form-username" value=""
                                class="form-control not-dark" placeholder="Username" />
                        </div>

                        <div class="col-12 mt-4">
                            <input type="password" id="login-form-password" name="login-form-password" value=""
                                class="form-control not-dark" placeholder="Password" />
                        </div>

                        <div class="col-12">
                            <a href="#" class="fright text-dark t300 mt-2">Forgot Password?</a>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="button btn-block nomargin" id="login-form-submit" name="login-form-submit"
                                value="login">Login</button>
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
                                <li><a href="#">{{ Helper::baseLanguageName() }}</a>
                                    <ul>
                                        @foreach(Helper::language() as $row)
                                        <li>
                                            <a href="{{ route('language.switch', $row->code) }}"><img
                                                    src="{{ $row->getFirstMediaUrl('language') }}"> {{ $row->code }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- .top-links end -->

                        <!-- Top Social
                        	============================================= -->
                        <div id="top-social">
                            <ul>
                                <li><a href="{{ Helper::cfacebook() }}" class="si-facebook" target="_blank"><span
                                            class="ts-icon"><i class="icon-facebook"></i></span><span
                                            class="ts-text">Facebook</span></a></li>

                                <li><a href="{{ Helper::cinstagram() }}" class="si-instagram" target="_blank"><span
                                            class="ts-icon"><i class="icon-instagram2"></i></span><span
                                            class="ts-text">Instagram</span></a></li>

                                <li><a href="{{ Helper::ctwitter() }}" class="si-twitter"><span class="ts-icon"><i
                                                class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a>
                                </li>

                                <li><a href="{{ Helper::cwhatsapp() }}" target="_blank" rel="noopener"
                                        class="si-whatsapp"><span class="ts-icon"><i
                                                class="icon-whatsapp"></i></span><span
                                            class="ts-text">Whatsapp</span></a></li>

                                <li><a href="{{ Helper::cemail() }}" class="si-email3" target="_blank"><span
                                            class="ts-icon"><i class="icon-envelope-alt"></i></span><span
                                            class="ts-text">Email</span></a></li>
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


        <!-- Footer
        	============================================= -->
        <footer id="footer">

            <div class="container">
                <!-- Footer Widgets
					============================================= -->
                <div class="footer-widgets-wrap clearfix">
                    <div class="col_two_third">

                        <div class="col_one_third">

                            <div class="widget widget_links clearfix">

                                <h4>FOLLOW US</h4>
                                <ul>
                                    <li><a href="{{ Helper::cfacebook() }}"><img
                                                src="{{asset('assets/image/logo/fb.png')}}" style="width: 20px;">
                                            <strong>Facebook</strong></a></li>
                                    <li><a href="{{ Helper::cinstagram() }}"><img
                                                src="{{asset('assets/image/logo/ig.png')}}" style="width: 20px;">
                                            <strong>Instagram</strong></a></li>
                                    <li><a href="{{ Helper::ctwitter() }}"><img
                                                src="{{asset('assets/image/logo/twit.png')}}" style="width: 20px;">
                                            <strong>Twitter</strong></a></li>
                                    <li><a href="{{ Helper::cwhatsapp() }}"><img
                                                src="{{asset('assets/image/logo/wa.png')}}"
                                                style="width: 20px;"><strong>Whatsapp</strong></a></li>
                                    <li><a href="{{ Helper::cemail() }}"><img
                                                src="{{asset('assets/image/logo/mail.png')}}"
                                                style="width: 20px;"><strong>Mail</strong></a></li>
                                </ul>
                            </div>

                        </div>

                        <div class="col_one_third">

                            <div class="widget widget_links clearfix">

                                <h4>Online Store</h4>

                                <ul>
                                    <li><a href="https://shopee.co.id/dermaexpress?v=795&smtt=0.0.3"><img
                                                src="{{asset('assets/image/logo/shopee.png')}}" style="width: 20px;">
                                            <strong>Shopee</strong></a></li>
                                    <li><a href="https://tokopedia.link/8WuUYJSWA7"><img
                                                src="{{asset('assets/image/logo/tokopedia.png')}}" style="width: 20px;">
                                            <strong>Tokopedia</strong></a></li>
                                    <li><a href="https://www.bukalapak.com/u/dermaexpress"><img
                                                src="{{asset('assets/image/logo/bukalapak.png')}}" style="width: 20px;">
                                            <strong>Bukalapak</strong></a></li>
                                    <li><a href="https://s.lazada.co.id/s.b7283"><img
                                                src="{{asset('assets/image/logo/lazada.png')}}"
                                                style="width: 30px;"><strong>Lazada</strong></a></li>
                                </ul>

                            </div>

                        </div>

                        <div class="col_one_third col_last">

                            <div class="widget clearfix">
                                <h4>Klinik Kami</h4>

                                <div id="post-list-footer">
                                    <div class="">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <a href="https://g.co/kgs/xfrpoV" target="blank">
                                                    <h6>UTAN KAYU</h6>
                                                </a>
                                            </div>
                                            {{-- <ul class="entry-meta">
													<li><i class="icon-pushpin"></i> <a href="https://g.co/kgs/xfrpoV" target="blank"> Jl. Utan Kayu Raya No. 79B dan 79C Jakarta Timur.</a></li>
												</ul> --}}
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <a href="https://g.co/kgs/1c6QKP" target="blank">
                                                    <h6>GADING SERPONG</h6>
                                                </a>
                                            </div>
                                            {{-- <ul class="entry-meta">
													<li><i class="icon-pushpin"></i> <a href="https://g.co/kgs/1c6QKP" target="blank"> Ruko Diamond III No 12-15, Jl. Gading Golf Boulevard, Gading Serpong,  Pakulonan Barat, Kelapa dua Kota Tangerang, Banten. </a></li>
												</ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix">
                            <h4>Kritik dan Saran</h4>

                            <div id="post-list-footer">
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <a href="{{ Helper::cwhatsapp() }}"><abbr title=""><strong><i
                                                        class="icon-whatsapp-square"></i></strong> 0822 58883050
                                            </abbr></a>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4>Jam Operasional</h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <strong>Senin - Jumat: 11:30 - 19:30 WIB</strong> <br>
                                            <strong>Sabtu - Minggu: 10:00 - 18:00 WIB </strong>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
				============================================= -->
            <!-- <div id="copyrights">
					<div class="container clearfix"> -->
            <!-- <div class="col_half"> -->
            <!-- <div class="mapouter">
								<div class="gmap_canvas">
									<iframe width="1000" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=jl.kh%20wahid%20hasyim%20no.47%2C%20gondangdia%2C%20Jakarta%20Pusat&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" >
									</iframe>
								</div>
							</div> -->
            <!-- </div> -->
            <!-- </div>
				</div> -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        Copyrights © <?=date('Y')?> Derma Express<br>
                    </div>

                </div>

            </div><!-- #copyrights end -->

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
    <script src="{{asset('assets/js/lightbox.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <!-- Footer Scripts
    	============================================= -->
    <script src="{{asset('assets/js/functions.js')}}"></script>

    <!-- ADD-ONS JS FILES -->
    <script>
        window.onscroll = function () {
            var slider = $('#slider');
            if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
                slider.addClass("scrolled-slider");
            } else {
                slider.removeClass("scrolled-slider");
            }
        }

    </script>

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5e5ce427298c395d1ceaab3c/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();

    </script>
    <script>
        $(document).ready(function () {
            $(".pop-container").hide();
            setTimeout(function () {
                $(".pop-container").show();
                console.log('show');
            }, 7000); // 5000 to load it after 5 seconds from page load
        });
        if (window.matchMedia('(max-width: 425px)')) {
            $("#header_dalem").removeClass("container");
            $("#footer-sosmed").removeClass("container");
            $("#header_luar").removeClass("container").addClass("container-fluid");
            $("#header_detail").removeClass("container");
        } else {
            $("#header_dalem").addClass("container");
            $("#footer-sosmed").addClass("container");
            $("#header_detail").addClass("container");
            $("#header_luar").removeClass("container-fluid").addClass("container");
        }
        $(".close-pop").click(function () {
            $(".pop-container").hide();
        });
        $('#slider-owl').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            URLhashListener: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
        $('.owl-next').hide();
        $('.owl-prev').hide();

        $(function () {
            $.ajax({
                    url: '{{ url("ajax-produk") }}',
                    type: 'GET',
                    dataType: 'Json',
                })
                .done(function (res) {
                    $.each(res, function (index, val) {
                        $('#submenu' + index).hover(function () {
                            $('#detail-submenu' + index).css('display', 'flex');
                        }, function () {
                            setTimeout(function () {
                                $('#detail-submenu' + index).css('display', 'none');
                            }, 100);
                        });
                    });
                });
        });

        $('#carousel-profile').owlCarousel({
            loop: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

    </script>
    @yield('js')

</body>

</html>
