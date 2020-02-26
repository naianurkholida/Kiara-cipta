<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900|Caveat+Brush" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/swiper.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('themes/theme1/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('themes/theme1/css/responsive.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/css/calendar.css')}}" type="text/css" />

    <!-- NonProfit Demo Specific Stylesheet -->
    <link rel="stylesheet" href="{{asset('themes/theme1/css/colors.php?color=C6C09C')}}" type="text/css" /> 
    <!-- Theme Color -->
    <link rel="stylesheet" href="{{asset('themes/theme1/demos/nonprofit/css/fonts.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes/theme1/demos/nonprofit/nonprofit.css')}}" type="text/css" />
    <!-- / -->

    <link rel="shortcut icon" href="{{asset('themes/theme1/images/mizan-bulat.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('themes/theme1/images/mizan-bulat.png')}}">

    <meta name='viewport' content='initial-scale=1, viewport-fit=cover'>

    <!-- Document Title
	============================================= -->
    <title>Home Page | Mizan Amanah</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
		============================================= -->
        @include('front_page.main_layouts.header')
        <!-- #header end -->

        <!-- Slider
		============================================= -->
        @include('front_page.components.slider')

        <!-- Content
		============================================= -->
        <section id="content" style="overflow: visible">
            <div class="content-wrap p-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1382 58" width="100%" height="60" preserveAspectRatio="none" style="position: absolute; top: -58px; left:0; z-index: 1">
                <path style="fill:#FFF;" d="M1.52.62s802.13,127,1380,0v56H.51Z" /></svg>

                <div class="section mt-3" style="background: #FFF ;">
                    <div class="container clearfix">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row missions-gloals">
                                    @foreach($posting as $post)
                                        <div class="col-md-4 mb-4">
                                            <div class="entry clearfix">
                                                <div class="entry-image">
                                                    <a href="{{asset('admin/assets/media/posting/'.$post->image)}}" data-lightbox="image">
                                                        <img class="image_fade" src="{{asset('admin/assets/media/posting/'.$post->image)}}" alt="Standard Post with Image">
                                                    </a>
                                                </div>
                                                <div class="entry-title">
                                                    <h2>
                                                        <a href="blog-single.html">
                                                            {{$post->judul}}
                                                        </a>
                                                    </h2>
                                                </div>
                                                <ul class="entry-meta clearfix">
                                                    <li>
                                                        <i class="icon-calendar3"></i>
                                                        {{$post->created_at}}
                                                    </li>
                                                </ul>
                                                <div class="entry-content">
                                                    {!! $post->content !!}
                                                    <a href="blog-single.html" class="more-link">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{$posting->links()}}
                    </div>
                </div>

                <div class="clear"></div>  
            </div>
        </section>

        <!-- Footer
		============================================= -->
        <footer id="footer" style="background-color: #002D40;">
            <div class="container">
                <!-- Footer Widgets
				============================================= -->
            </div>

            <!-- Copyrights
			============================================= -->
            @include('front_page.main_layouts.footer')
            <!-- #copyrights end -->
        </footer><!-- #footer end -->
        <!-- Floating Contact
		============================================= -->
        <div class="floating-contact-wrap">
            <div class="floating-contact-btn shadow">
                <i class="floating-contact-icon btn-unactive icon-envelope21"></i>
                <i class="floating-contact-icon btn-active icon-line-plus"></i>
            </div>
            <div class="floating-contact-box">
                <div id="q-contact" class="widget quick-contact-widget clearfix">
                    <div class="floating-contact-heading bgcolor p-4 rounded-top">
                        <h3 class="mb-0 font-secondary h2 ls0">Quick Contact 👋</h3>
                        <p class="mb-0">Get in Touch with Us</p>
                    </div>
                    <div class="form-widget" data-alert-type="false">
                        <div class="form-result"></div>
                        <div class="floating-contact-loader css3-spinner" style="position: absolute;">
                            <div class="css3-spinner-bounce1"></div>
                            <div class="css3-spinner-bounce2"></div>
                            <div class="css3-spinner-bounce3"></div>
                        </div>
                        <div id="floating-contact-submitted" class="p-5 center">
                            <i class="icon-line-mail h1 color"></i>
                            <h4 class="t400 mb-0 font-body">Thank You for Contact Us! Our Team will contact you asap on
                                your email Address.</h4>
                        </div>
                        <form class="mb-0" id="floating-contact" action="include/form.php" method="post"
                            enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text nobg"><i class="icon-user-alt"></i></span>
                                </div>
                                <input type="text" name="floating-contact-name" id="floating-contact-name"
                                    class="form-control required" value="" placeholder="Enter your Full Name">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text nobg"><i class="icon-at"></i></span>
                                </div>
                                <input type="email" name="floating-contact-email" id="floating-contact-email"
                                    class="form-control required" value="" placeholder="Enter your Email Address">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text nobg"><i class="icon-comment21"></i></span>
                                </div>
                                <textarea name="floating-contact-message" id="floating-contact-message"
                                    class="form-control required" cols="30" rows="4"></textarea>
                            </div>
                            <input type="hidden" id="floating-contact-botcheck" name="floating-contact-botcheck"
                                value="" />
                            <button type="submit" name="floating-contact-submit"
                                class="btn btn-dark btn-block py-2">Send Message</button>
                            <input type="hidden" name="prefix" value="floating-contact-">
                            <input type="hidden" name="subject" value="Messgae From Floating Contact">
                            <input type="hidden" name="html_title" value="Floating Contact Message">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
	============================================= -->
    <script src="{{asset('themes/theme1/js/jquery.js')}}"></script>
    <script src="{{asset('themes/theme1/js/plugins.js')}}"></script>
    <script src="{{asset('themes/theme1/js/jquery.calendario.js')}}"></script>
    <script src="{{asset('themes/theme1/demos/nonprofit/js/events.js')}}"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="{{asset('themes/theme1/js/functions.js')}}"></script>

    <script>
        jQuery(document).ready(function ($) {
            var elementParent = $('.floating-contact-wrap');
            $('.floating-contact-btn').off('click').on('click', function () {
                elementParent.toggleClass('active');
            });
        });

        var cal = $('#calendar').calendario({
            onDayClick: function ($el, $contentEl, dateProperties) {

                for (var key in dateProperties) {
                    console.log(key + ' = ' + dateProperties[key]);
                }

            },
            caldata: canvasEvents
        }),
            $month = $('#calendar-month').html(cal.getMonthName()),
            $year = $('#calendar-year').html(cal.getYear());

        $('#calendar-next').on('click', function () {
            cal.gotoNextMonth(updateMonthYear);
        });
        $('#calendar-prev').on('click', function () {
            cal.gotoPreviousMonth(updateMonthYear);
        });
        $('#calendar-current').on('click', function () {
            cal.gotoNow(updateMonthYear);
        });

        function updateMonthYear() {
            $month.html(cal.getMonthName());
            $year.html(cal.getYear());
        };

    </script>


</body>

</html>