<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!--css include from main_layouts-->
    @include('front_page.theme1.main_layouts.css')
    <!--end css-->
    <title>Home Page | Mizan Amanah</title>

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
                        <h2 class="mb-4 nott">Update</h2>
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
                                <div class="row missions-gloals">
                                    @foreach($posting as $post)
                                        <div class="col-md-4 mb-4">
                                            <div class="entry clearfix">
                                                <div class="entry-image">
                                                    <a href="{{asset('admin/assets/media/posting/'.$post->image)}}" data-lightbox="image">
                                                        <div class="img-fade" style="background-repeat: no-repeat; background-size: cover; width: 100%; height: 250px; background-image: url({{asset('admin/assets/media/posting/'.$post->image)}}); ">

                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="entry-title">
                                                    <h2>
                                                        <a href="{{Route('update.detail', $post->seo)}}">
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
                                                <br>
                                                <div class="entry-content">
                                                    {{substr(strip_tags($post->content), 0, 200)}}<br>
                                                    <a href="{{Route('update.detail', $post->seo)}}" class="more-link">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row  justify-content-center">
                        {{$posting->links()}}
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
    <!--css include from main_layouts-->
    @include('front_page.theme1.main_layouts.js')
    <!--end css-->

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