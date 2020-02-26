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

        <!-- Content
		============================================= -->
        <section id="content" style="overflow: visible">

            <div class="content-wrap p-0">
                <!-- Search form -->
                <img src="{{asset('admin/assets/media/posting/'.$posting_detail->image)}}" alt="" style="width: 100%;">

                <div class="section nobg mt-0 mb-4">
                    <div class="container clearfix">
                        <div class="row justify-content-center">
                            <div class="col-6"></div>
                            <?php
                                $create = date_create($posting_detail->created_at);
                                $date = date_format($create, 'd-F-Y');
                            ?>
                            <div class="col-6" style="text-align: right">{{$date}}</div>
                            <div class="col-12" style="margin-top: 10px;">
                                <h3>
                                    {{$posting_detail->judul}}
                                </h3>
                            </div>
                            <div class="col-md-12">
                                <p class="profile-text">
                                    {!!$posting_detail->content!!}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mb-2">Update Lainnya</h4>
                                
                                <div class="row missions-gloals">
                                    @foreach($posting as $post)
                                    <div class="col-md-6 mb-4">
                                        <div class="feature-box fbox-plain d-flex bg-white">
                                            <div class="fbox-media position-relative col-auto p-0 mr-4">
                                                <img src="{{asset('admin/assets/media/posting/50/'.$post->image)}}" alt="Featured Icon 1"
                                                    width="50">
                                            </div>
                                            <div class="fbox-desc">
                                                <h3 class="nott ls0"><a href="{{Route('update.detail', $post->seo)}}" class="text-dark">{{$post->judul}}</a></h3>
                                                <p>{{substr(strip_tags($post->content), 0, 25)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row justify-content-center">
                                    {{$posting->links()}}
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-12">
                                <h3 class="center">Komentar</h3>

                                <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget"
                                    data-margin="20" data-items-sm="1" data-items-md="2" data-items-xl="3">
                                    @foreach($comment as $com)
                                        <div class="oc-item">
                                            <div class="testimonial">
                                                <div class="testi-image">
                                                    <a href="#"><img src="{{asset('admin\assets\media\foto-users\user.png')}}"
                                                            alt="Customer Testimonails"></a>
                                                </div>
                                                <div class="testi-content">
                                                    <p>{{$com->comment}}</p>
                                                    <div class="testi-meta">
                                                        {{$com->nama}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    

                                </div>
                            </div>

                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-12">
                                <form class="row" id="form" action="{{Route('comment.post')}}" method="post"
                                    enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-process"></div>
                                    
                                    <div class="col-12 form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control required" value=""
                                            placeholder="Masukan Nama Lengkap" name="nama" id="nama">
                                    </div>
                                   
                                    <div class="col-12 form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control required" value=""
                                            placeholder="Masukan Alamat Email" name="email" id="email">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Komentar</label>
                                            <textarea class="form-control required" cols="30" rows="5" name="comment" id="comment"></textarea>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12 hidden">
                                        <input type="text" id="event-registration-botcheck"  value="" />
                                    </div>
                                    <div class="col-12 center">
                                    <input type="hidden" name="id_posting" value="{{$posting_detail->id}}">
                                        <button type="button" onclick="cek_simpan()" data-lightbox="inline" class="button btn-program">Kirim Komentar</button>
                                    </div>

                                    <!-- <input type="hidden" name="prefix" value="event-registration-"> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

        function cek_simpan(){
            if($("#nama").val() == ""){
                alert('Nama Tidak Boleh Kosong')
            }else if($("#email").val() == ""){
                alert('Email Tidak Boleh Kosong')
            }else if($("#comment").val() == ""){
                alert('Comment Tidak Boleh Kosong')
            }else{
                alert('Komentar Terkirim')
                $("#form").submit();
                location.reload()
            }
        }

    </script>


</body>

</html>