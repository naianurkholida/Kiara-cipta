<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Page with empty content">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="_globalsign-domain-verification" content="faYUt9pHF1Oqq4zNeoIbmo5lX9cck5K_tdXhwpvmK-" />
	<meta name="facebook-domain-verification" content="b54r9im3ln73mt00zmhkl1i2bcn1qp" />
    <meta name="facebook-domain-verification" content="2owbzol2qc7qbpaxp3i84lfrt3uhxb" />
    <meta name="facebook-domain-verification" content="b54r9im3ln73mt00zmhkl1i2bcn1qp" />

    <!-- Stylesheets
    	============================================= -->
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
        @yield('header')

        <!-- Document Title
        	============================================= -->
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

                .owl-carousel:hover .owl-nav .owl-next {
                     display: block !important; 
                }

        	</style>
        	<!-- Google Tag Manager -->
        	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TK5BKMT');</script>
        <!-- End Google Tag Manager -->

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '5649171165125533');
                fbq('track', 'PageView');
            </script>
            <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=5649171165125533&ev=PageView&noscript=1"
                /></noscript>
                <!-- End Facebook Pixel Code -->
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
                        			<li>
										<a href="{{ Helper::cfacebook() }}" class="si-facebook" target="_blank">
											<span class="ts-icon"><i class="icon-facebook"></i></span>
											<span class="ts-text">Facebook</span>
										</a>
									</li>

									<li>
										<a href="{{ Helper::cinstagram() }}" class="si-instagram" target="_blank">
											<span class="ts-icon"><i class="icon-instagram2"></i></span>
											<span class="ts-text">Instagram</span>
										</a>
									</li>

									<li>
										<a href="{{ Helper::ctwitter() }}" class="si-twitter">
											<span class="ts-icon"><i class="icon-twitter"></i></span>
											<span class="ts-text">Twitter</span>
										</a>
									</li>

									<li>
										<a href="{{ Helper::cwhatsapp() }}" target="_blank" rel="noopener" class="si-whatsapp">
											<span class="ts-icon"><i class="icon-whatsapp"></i></span>
											<span class="ts-text">Whatsapp</span>
										</a>
									</li>

									<li>
										<a href="{{ Helper::cemail() }}" class="si-email3" target="_blank">
											<span class="ts-icon"><i class="icon-envelope-alt"></i></span>
											<span class="ts-text">Email</span>
										</a>
									</li>
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


            <!-- Footer ============================================= -->
            <div id="footer">

                <div class="container">

                    <div class="footer-widgets-wrap clearfix">

                        <div class="col_half">

                            <div class="widget clearfix">

                                <!-- <img src="images/footer-widget-logo.png" alt="" class="footer-logo"> -->

                                <!-- <strong>Derma Express</strong>  -->
                                <!-- <p>Klinik Kecantikan dengan Dokter dan Layanan Estetika Terbaik di Indonesia.</p> -->

                                <div class="clearfix" style="">
                                    <div class="col_half">
                                        <address class="nobottommargin">
                                            <abbr title="Headquarters" style="display: inline-block;margin-bottom: 7px;cursor: default;">
                                                <strong>Kontak Kami:</strong>
                                            </abbr><br>
                                            082258883050<br>
                                        </address>
                                    </div>
                                </div>

                                <address class="nobottommargin" style="margin-top: 10px;">
                                    <abbr title="Headquarters" style="display: inline-block;margin-bottom: 7px;cursor: default;">
                                        <strong>Follow Us:</strong>
                                    </abbr><br>
                                </address>

                                <div class="clearfix">
                                    <a href="{{ Helper::cfacebook() }}" target="blank" class="social-icon si-small si-rounded topmargin-sm si-facebook" title="Facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>

                                    <a href="{{ Helper::ctwitter() }}" target="blank" class="social-icon si-small si-rounded topmargin-sm si-twitter" title="Twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>

                                    <a href="{{ Helper::cinstagram() }}" target="blank" class="social-icon si-small si-rounded topmargin-sm si-instagram" title="Instagram">
                                        <i class="icon-instagram"></i>
                                        <i class="icon-instagram"></i>
                                    </a>

                                    <a href="{{ Helper::cwhatsapp() }}" target="blank" class="social-icon si-small si-rounded topmargin-sm si-whatsapp" title="Whatsapp">
                                        <i class="icon-whatsapp"></i>
                                        <i class="icon-whatsapp"></i>
                                    </a>

                                    <a href="{{ Helper::cemail() }}" target="blank" class="social-icon si-small si-rounded topmargin-sm si-email3" title="Mail">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email3"></i>
                                    </a>

                                    <a href="{{ Helper::cyoutube() }}" target="blank" class="social-icon si-small si-rounded topmargin-sm si-youtube" title="Youtube">
                                        <i class="icon-youtube"></i>
                                        <i class="icon-youtube"></i>
                                    </a>
                                </div>

                                <address class="nobottommargin" style="margin-top: 10px;">
                                    <abbr title="Headquarters" style="display: inline-block;margin-bottom: 7px;	cursor: default;">
                                        <strong>Online Store:</strong>
                                    </abbr><br>
                                </address>

                                <div class="clearfix">
									@foreach (Helper::online_store() as $row)
                                    <a href="{{$row->link}}" target="blank" class="social-icon si-small si-square topmargin-sm" title="{{$row->name}}" style="width: 50px; height: 50px; border: none;">
                                        <img src="{{ asset($row->icon) }}">
                                    </a>
									@endforeach
                                    <!-- <a href="https://shopee.co.id/dermaexpress?v=795&smtt=0.0.3" target="blank" class="social-icon si-small si-square topmargin-sm" title="Shopee" style="width: 50px; height: 50px; border: none;">
                                        <img src="{{ asset('assets/image/shopee.png') }}">
                                    </a>

                                    <a href="https://tokopedia.link/8WuUYJSWA7" target="blank" class="social-icon si-small si-square topmargin-sm" title="Tokopedia" style="width: 50px; height: 50px; border: none;">
                                        <img src="{{ asset('assets/image/tokopedia.png') }}">
                                    </a>

                                    <a href="https://s.lazada.co.id/s.b7283" target="blank" class="social-icon si-small si-square topmargin-sm" title="Lazada" style="width: 50px; height: 50px; border: none;">
                                        <img src="{{ asset('assets/image/lazada.png') }}">
                                    </a>

                                    <a href="https://www.bukalapak.com/u/dermaexpress" target="blank" class="social-icon si-small si-square topmargin-sm" title="Bukalapak" style="width: 50px; height: 50px; border: none;">
                                        <img src="{{ asset('assets/image/bukalapak.png') }}">
                                    </a>

                                    <a href="https://s.lazada.co.id/s.b7283" target="blank" class="social-icon si-small si-square topmargin-sm" title="ILotte" style="width: 50px; height: 50px; border: none;">
                                        <img src="{{ asset('assets/image/ilotte.jpg') }}">
                                    </a> -->
                                </div>
                            </div>

                        </div>

                        <div class="col_one_fourth">

                            <div class="widget clearfix">
                                <h4>Klinik Kami</h4>

                                <div id="post-list-footer">
								@foreach(Helper::profile_cabang() as $value)
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="{{ $value->link }}" target="blank">{{ $value->name }}</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>{{ $value->address }}</li>
                                            </ul>
                                        </div>
                                    </div>
								@endforeach
                                </div>

                            </div>

                        </div>

                        <div class="col_one_fourth col_last">

                            <div class="widget clearfix">
                                <h4>Jam Operasional</h4>

                                <div id="post-list-footer">
								@foreach(Helper::profile_cabang() as $value)
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="{{ $value->link }}" target="blank">{{ $value->name }}</a></h4>
                                            </div>
                                            <ul class="entry-meta">
											@foreach($value->detail as $detail)
												@if ($detail->type == 'operational')
													{{ $detail->value }}<br>
												@endif
											@endforeach
                                            </ul>
                                        </div>
                                    </div>
								@endforeach
                                </div>

                            </div>

                        </div>

                    </div>
					<center>
						<h5>Cakep Terjangkau #dermaexpressaja</h5>
					</center>
                </div>

                <div id="copyrights">

                    <div class="container clearfix">

                        <div class="col_full nobottommargin center">
                            <div class="copyrights-menu copyright-links clearfix">
                                <a href="https://derma-express.com">Home</a>/
                                <a href="https://derma-express.com/profile">About</a>/
                                <a href="https://derma-express.com/kontak">Contact</a>
                            </div>
                            Copyrights &copy; 2020 All Rights Reserved by Derma Express.
                        </div>

                    </div>

                </div>

            </div>
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
        <script src="{{asset('assets/js/notify.min.js')}}"></script>
        <script src="{{asset('assets/js/lazyload.min.js')}}"></script>


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

		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '809881186313498');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=809881186313498&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		
       <!--  <script type="text/javascript">
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
        </script> -->

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        	(function(){
        		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        		s1.async=true;
        		s1.src='https://embed.tawk.to/5f7ae677f0e7167d00163720/default';
        		s1.charset='UTF-8';
        		s1.setAttribute('crossorigin','*');
        		s0.parentNode.insertBefore(s1,s0);
        	})();
        </script>
        <!--End of Tawk.to Script-->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179474592-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-179474592-1');
      </script> -->


      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TK5BKMT"
      	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      	<!-- End Google Tag Manager (noscript) -->

      	<!-- Global site tag (gtag.js) - Google Analytics -->
      	<script async src="https://www.googletagmanager.com/gtag/js?id=G-112H1YC1N4"></script>
      	<script>
      		window.dataLayer = window.dataLayer || [];
      		function gtag(){dataLayer.push(arguments);}
      		gtag('js', new Date());

      		gtag('config', 'G-112H1YC1N4');
      	</script>

      	<!-- End gtag -->

      	<script>
            // When the user scrolls down 50px from the top of the document, resize the header's font size
            window.onscroll = function() {scrollFunction()};

			// indicator for detail-submenu
			var latest_pointer = "";
			var latest_sm_index = 0;
			var latest_smt_index = 0;
			var latest_smts_index = 0;


            function scrollFunction() {
            	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            		$(".menu-drop-new").css('margin-top', '59px');
            	} else {
            		$(".menu-drop-new").css('margin-top', '80px');
            	}
            }  
			
			function hide_detail_submenu() {
				$('#detail-submenu' + latest_sm_index).css('display', 'none');
				$('#detail-submenut' + latest_smt_index).css('display', 'none');
				$('#detail-submenuts' + latest_smts_index).css('display', 'none');
			}

			function goToLink(link) {
				// console.log(link);
				window.location = link;
			}

            $(document).ready(function () {
            	$(".pop-container").hide();
            	setTimeout(function () {
					hide_detail_submenu()
            		$(".pop-container").show();
            		// console.log('show');
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


			$('.menu-header').hover(function(){
				
			}, function(){
				hide_detail_submenu()
			})
			$('.menu-drop-new').hover(function(){
				if (latest_pointer == "sm") {
					$('#detail-submenu2').css('display', 'none');
					$('#detail-submenu' + latest_sm_index).css('display', 'flex');
				} else if (latest_pointer == "smt") {
					$('#detail-submenut' + latest_smt_index).css('display', 'flex');
				} else if (latest_pointer == "smts") {
					$('#detail-submenuts' + latest_smts_index).css('display', 'flex');
				}
			})

			$('.menu-header.menu-non-hover').hover(function(){
				hide_detail_submenu()
			})
			$('.logo-desktop').hover(function(){
				hide_detail_submenu()
			})

            $('.menu-header.produk').hover(function(){
				hide_detail_submenu()
				latest_pointer = "sm";
				latest_sm_index = 0;
            	$('#detail-submenu0').css('display', 'flex');
            }, function(){
            	// $('#detail-submenu6').css('display', 'none');
            })

            $('.menu-header.treatment').hover(function(){
            	$('#menu-drop-new2').show();
            	$('.submenu.submenut-two-hair-care').css('display', 'flex');
            	$('.submenu.submenut-two-face-care').css('display', 'none');    
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');

            	$('#detail-submenut-hair-removal').css('display', 'flex');

				hide_detail_submenu()
				latest_pointer = "smt";
				latest_smt_index = 0;
            	$('#detail-submenut0').css('display', 'flex');
            }, function(){
            	$('#menu-drop-new2').show();
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');

            	$('#detail-submenut-hair-removal').css('display', 'none');

            	// $('#detail-submenut0').css('display', 'none');
            })

            $('.menu-header.jurnal').hover(function(){
				hide_detail_submenu()
				latest_pointer = "smts";
				latest_smts_index = 0;
            	$('#detail-submenuts0').css('display', 'flex');
            }, function(){
            	// $('#detail-submenuts0').css('display', 'none');

            })


			// hover leave header
			$(".menu-drop-new").hover(function(){

			}, function(){
				hide_detail_submenu();
			});
			
			$("#top-bar").hover(function(){
				hide_detail_submenu();
			});

            $(function () {
            	$.ajax({
            		url: '{{ url("ajax-produk") }}',
            		// url: '{{ url("ajax-kategori-produk") }}',
            		type: 'GET',
            		dataType: 'Json',
            	})
            	.done(function (res) {


            		$.each(res, function (index, val) {
            			$("#submenu"+index).hover(function(){
							// hide hovered before
            				$('#detail-submenu' + latest_sm_index).css('display', 'none');
							latest_pointer = "sm";
							latest_sm_index = index;

            				$('#detail-submenu2').css('display', 'none');
            				$('#detail-submenu' + index).css('display', 'flex');
            			}, function(){
            				// $('#detail-submenu' + index).css('display', 'none');
            			});
            		});
            	});
            });

            $(function () {
            	$.ajax({
            		url: '{{ url("ajax-treatment") }}',
            		type: 'GET',
            		dataType: 'Json',
            	})
            	.done(function (res) {
            		$.each(res, function (index, val) {
            			$('#submenut' + index).hover(function () {
							// hide hovered before
            				$('#detail-submenut' + latest_smt_index).css('display', 'none');
							latest_pointer = "smt";
							latest_smt_index = index;

            				$('#detail-submenut' + index).css('display', 'flex');
            			}, function () {
            				// $('#detail-submenut' + index).css('display', 'none');
            			});
            		});
            	});
            });

            $(function () {
            	$.ajax({
            		url: '{{ url("ajax-jurnal") }}',
            		type: 'GET',
            		dataType: 'Json',
            	})
            	.done(function (res) {
            		$.each(res, function (index, val) {
            			$('#submenuts' + index).hover(function () {
							// hide hovered before
            				$('#detail-submenuts' + latest_smts_index).css('display', 'none');
							latest_pointer = "smts";
							latest_smts_index = index;

            				$('#detail-submenuts' + index).css('display', 'flex');
            			}, function () {
            				// $('#detail-submenuts' + index).css('display', 'none');
            			});
            		});
            	});
            });

            $(function () {
            	$.ajax({
            		url: '{{ url("ajax-sub-menu") }}',
            		type: 'GET',
            		dataType: 'Json',
            	})
            	.done(function (res) {
            		$.each(res, function (index, val) {
            			var url = val.url.split('/');
            			$('#submenu-'+url[1]).hover(function() {
            				$('.submenu.submenut-two-'+url[1]).css('display', 'flex');
            				$('#detail-submenut-'+url[1]).css('display', 'flex');
            			}, function() {
            				$('#detail-submenut-'+url[1]).css('display', 'none');
            				$('.submenu.submenut-two-'+url[1]).css('display', 'none');
            			});
            		});
            	});
            });

            $('#submenut-hair-care').hover(function () {
            	$('.submenu.submenut-two-hair-care').css('display', 'flex');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');                
            }, function () {
            	$('#menu-drop-new2').show();
            	$('.submenu.submenut-two-hair-care').css('display', 'block');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            });

            $('#submenut-face-care').hover(function () {
            	$('.submenu.submenut-two-face-care').css('display', 'flex');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            }, function () {
            	$('#menu-drop-new2').show();
            	$('.submenu.submenut-two-face-care').css('display', 'block');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            });

            $('#submenut-threadlift').hover(function () {
            	$('.submenu.submenut-two-threadlift').css('display', 'flex');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            }, function () {
            	$('#menu-drop-new2').show();
            	$('.submenu.submenut-two-threadlift').css('display', 'block');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            });

            $('#submenut-countouring').hover(function () {
            	$('.submenu.submenut-two-countouring').css('display', 'flex');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            }, function () {
            	$('#menu-drop-new2').show();
            	$('.submenu.submenut-two-countouring').css('display', 'block');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            });

            $('#submenut-infusion').hover(function () {
            	$('.submenu.submenut-two-infusion').css('display', 'flex');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            }, function () {
            	$('#menu-drop-new2').show();
            	$('.submenu.submenut-two-infusion').css('display', 'block');
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'none');
            });

            $('#submenut-body-care').hover(function () {
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'flex');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
            }, function () {
            	$('#menu-drop-new2').show();                
            	$('.submenu.submenut-two-countouring').css('display', 'none');
            	$('.submenu.submenut-two-infusion').css('display', 'none');
            	$('.submenu.submenut-two-body-care').css('display', 'block');
            	$('.submenu.submenut-two-threadlift').css('display', 'none');
            	$('.submenu.submenut-two-face-care').css('display', 'none');
            	$('.submenu.submenut-two-hair-care').css('display', 'none');
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

            $('#carousel-product').owlCarousel({
                loop: true,
                nav: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            })
			
        </script>
        @yield('js')

    </body>

    </html>
