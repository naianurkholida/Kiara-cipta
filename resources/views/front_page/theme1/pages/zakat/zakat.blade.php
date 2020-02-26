<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<title>Zakat | Mizan Amanah</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
    	============================================= -->
    	<div id="" class="clearfix">

        <!-- Header
        	============================================= -->
        	@include('front_page.theme1.main_layouts.header')
        	<!-- #header end -->



        <!-- Content
        	============================================= -->
        	<section id="content" style="overflow: visible">

        		<div class="content-wrap p-0">
        			<!-- Search form -->
        			<img src="images/slider/full/1.jpg" alt="">

        			<div class="section nobg mt-0 mb-4">
        				<div class="container clearfix">
        					<div class="row justify-content-center">
        						<div class="col-md-7 ">
        							<div class="heading-block nobottomborder mb-4">
        								<h2 class="mb-4 nott" style="text-align: center;">Ayo Tunaikan Zakat Sekarang</h2>
        							</div>
        							<div class="svg-line bottommargin-sm clearfix">
        								<center>
        									<hr style="background-color: red; height: 1px; width: 50%;">
        								</center>
        							</div>
        							<p class="profile-text">        								
                                        <!-- Assalamualaikum Sahabat Dermawan.
                                        Di bulan yang mulia ini saatnya kita bersihkan harta dan lengkapi ibadah kita dengan berzakat.
                                        Zakat merupakan ibadah wajib bagi seorang muslim, merupakan ibadah rukun islam ke 3.
                                        Jangan sampai zakat ini terlewat, agar tak menyesal di akhirat. -->
                                        {!! $content_zakat->konten_page !!}
                                    </p>
                                    <div class="row">
                                    	<div class="col-lg-6 col-sm-12">
                                    		<a href="{{Route('zakat.form')}}" class="button btn-program">Tunaikan Zakat</a>
                                    	</div>
                                    	<div class="col-lg-6 col-sm-12">
                                    		<a href="{{Route('zakat.kalkulator')}}" class="button btn-program">Hitung Zakat Anda</a>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--   -->
                        <div class="container clearfix">
                        	@foreach($program_zakat as $prog)
                        	<?php 
                        	$total  = $prog->total;
                        	$target = $prog->dana_target;

                        	$persen = $target/100;
                        	if($persen != null){
                        		$hasil  = round($total/$persen);
                        		if($hasil > 100){
                        			$hasil = 100;
                        		}
                        	}else{
                        		$hasil = 0;
                        	}

                        	$create = date_create($prog->tanggal);
                        	$date = date_format($create, 'd F Y');
                        	?>
                        	<div class="col-md-4" style="float: left;">
                        		<div class="feature-box media-box">
                        			<div class="fbox-media">
                        				<a href="{{Route('program.detailprogram', $prog->seo)}}"><img src="{{asset('admin/assets/media/foto-program')}}/{{$prog->foto}}"></a>
                        			</div>
                        			<div class="fbox-desc">
                        				<div class="badge alert-danger">{{$prog->category}}</div>
                        				<a href="{{Route('program.detailprogram', $prog->id)}}"><h3>{{$prog->judul}}</h3></a>
                        				<ul class="skills mb-3">
                        					<li data-percent="{{$hasil}}">
                        						<div class="progress">
                        							<div class="progress-percent">
                        								<div class="counter counter-inherit">
                        									Rp. <span data-from="0" data-comma="true" data-to="{{$prog->total}}"
                        										data-refresh-interval="10" data-speed="1100"></span>
                        									</div>
                        								</div>
                        							</div>
                        						</li>
                        					</ul>
                        					{{substr(strip_tags($prog->deskripsi), 0,250). ". . . . . . . ."}}
                        					<a href="{{Route('program.detailprogram', $prog->seo)}}" class="more-link">
                        						Read More
                        					</a>
                        					<a href="{{Route('program.donasi', $prog->seo)}}" class="button btn-program">Donasi</a>
                        				</div>
                        			</div>
                        		</div>
                        		@endforeach
                        	</div>
                        </div>
                        <div class="container clearfix">
                        	<div class="clear"></div>
                        	<div class="row  justify-content-center">
                        		{{$program_zakat->links()}}
                        	</div>
                        </div>
                    </div>
                </div>


            </section>
        </div>




    </section><!-- #content end -->

    <!-- Footer
    	============================================= -->
    	<footer id="footer" style="background-color: #002D40;">
    		@include('front_page.theme1.main_layouts.footer')
    		@include('front_page.theme1.components.floating_contact')
    	</footer><!-- #footer end -->


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