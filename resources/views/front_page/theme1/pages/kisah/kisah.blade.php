<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!--css include from main_layouts-->
    @include('front_page.theme1.main_layouts.css')
    <!--end css-->
    <title>Kisah Sukses | Mizan Amanah</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="" class="clearfix">

        <!-- Header
		============================================= -->
        @include('front_page.theme1.main_layouts.header')
        <!-- #header end -->

        <!-- Slider
		============================================= -->
        <div class="container clearfix">
            <div class="row justify-content-center" style="margin-top: 50px;">
                <div class="col-md-7 center">
                    <div class="heading-block nobottomborder mb-4">
                        <h2 class="mb-4 nott">@lang('language.kisah_sukses')</h2>
                    </div>
                    <div class="svg-line bottommargin-sm clearfix">
                        <hr style="background-color: red; height: 1px; width: 200px;">
                    </div>
                </div>
            </div>
        </div>

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
                                <img src="{{asset('admin/assets/media/posting')}}/{{$kisah_sukses->image}}"
                                class="alignleft img-square img-thumbnail notopmargin nobottommargin" alt="Avatar"
                                style="max-width: 150px;">
                            </div>
                            <div class="col-lg-12">
                                <h2>{{$kisah_sukses->judul}}</h2><hr>
                                {!! $kisah_sukses->content !!}
                            </div>
                        </div>
                        <div class="row justify-content-center">

                        </div>
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
            @include('front_page.theme1.main_layouts.footer')
            <!-- #copyrights end -->
        </footer><!-- #footer end -->
        <!-- Floating Contact
		============================================= -->
        @include('front_page.theme1.components.floating_contact')

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!--Javscript include from main_layouts-->
    @include('front_page.theme1.main_layouts.js')
    <!--end js-->

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