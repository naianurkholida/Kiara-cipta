<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<title>Program Detail | Mizan Amanah</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
    	============================================= -->
    	<div id="" class="clearfix">

        <!-- Header
        	============================================= -->
        	@include('front_page.theme1.main_layouts.header')<!-- #header end -->



        <!-- Content
        	============================================= -->
        	<section id="content" style="overflow: visible">

        		<div class="content-wrap p-0">
        			<!-- Search form -->
        			<img src="{{asset('admin/assets/media/foto-program')}}/{{$program->foto}}" alt="" style="width: 100%;">

        			<div class="section nobg mt-0 mb-4">
        				<?php
        				if($dana_terkumpul != null){
        					$total  = $dana_terkumpul->total;
        				}else{
        					$total = 0;
        				}
        				$target = $program->dana_target;

        				if ($target != null || $target != 0){
                            $persen = $target/100;
                            $hasil  = round($total/$persen);
                            if($hasil > 100){
                                $hasil = 100;
                            }
                        }else{
                            $persen = 100;

                            if($total != null || $total != 0){
                                $hasil  = 100; 
                            }else{
                                $hasil = 0;
                            }
                        }
                        ?>

                        <div class="container clearfix">
                           <h3>{!! $program->judul !!}</h3>
                           <ul class="skills mb-3" style="padding-top: 0px;">
                              <li data-percent="{{$hasil}}">
                                 <div class="progress">
        								<!-- <div class="progress-percent">
        									@if($dana_terkumpul != null)
        									<div class="counter counter-inherit">
        										Rp. <span data-refresh-interval="10"
        										data-speed="1100" data-comma="true" data-to="{{$dana_terkumpul->total}}"></span>
        									</div>
        									@else
        									<div class="counter counter-inherit">
        										Rp. <span data-refresh-interval="10"
        										data-speed="1100" data-comma="true" data-to="0"></span>
        									</div>
        									@endif
        								</div>-->
        							</div>
        						</li>
        					</ul>
        					<?php
        					if($program->tanggal != null){
        						$create = date_create($program->tanggal);
        						$date = date_format($create, 'd F Y');
        						echo "<h4>$date (Batas Waktu)</h4>";                               
        					}else{
        						$date = null;
        						echo "<h4>$date (Tanpa Batas Waktu)</h4>";
        					}
        					?>
        					@if($program->dana_target != null && $dana_terkumpul != null)
        					<label>Terkumpul {{'Rp. '.number_format($dana_terkumpul->total)}} dari {{'Rp. '.number_format($program->dana_target)}} ({{$hasil.'%'}})</label>
        					@elseif($dana_terkumpul != null)
        					<label>Terkumpul {{'Rp. '.number_format($dana_terkumpul->total)}} ({{$hasil.'%'}})</label>
        					@else
        					<label>Terkumpul {{'Rp. '.number_format(0)}} dari {{'Rp. '.number_format($program->dana_target)}} ({{$hasil.'%'}})</label>
        					@endif
        					<br>

        					<a href="{{Route('program.donasi',$seo)}}" class="button button-large button-rounded" style="width: 300px; text-align: center;">@lang('language.btn_donasi')</a>

        					<br>
        					<p class="profile-text">
        						{!! $program->deskripsi !!}
        					</p>
        					<div class="center">
        						<a href="{{Route('program.donasi',$seo)}}" class="button button-large button-rounded">@lang('language.btn_donasi')</a>
        					</div>
        					<div class="fancy-title title-center title-dotted-border topmargin">
        						<h3>@lang('language.donatur')</h3>
        					</div>

        					@if($count != 0)
        					<div id="oc-posts" class="owl-carousel posts-carousel carousel-widget" data-margin="20"
        					data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3"
        					data-items-lg="4">

        					@foreach($donatur as $don)
        					<div class="oc-item">
        						<div class="ipost clearfix">
        							<div class="entry-image">
        								<?php if($don->anonim == 0){?>
        									<?php if($don->foto != null){?>
        										<img src="{{asset('admin/assets/media/foto-users/245')}}/{{$don->foto}}" style="width: 300px;">
        										<div class="entry-title">
        											<h3>{{$don->name}}</h3>
        										</div>
        									<?php }else{ ?>
        										<img src="{{asset('admin/assets/media/icons/icon-people.png')}}" style="width: 300px;">
        										<div class="entry-title">
        											<h3>{{$don->nama_lengkap}}</h3>
        										</div>
        									<?php } ?>
        								<?php }else{ ?>
        									<img src="{{asset('admin/assets/media/icons/icon-people.png')}}" style="width: 300px;">
        									<div class="entry-title">
        										<h3>Hamba Allah</h3>
        									</div>
        								<?php } ?>
        							</div>
        							<ul class="entry-meta clearfix">
        								<li><i class="icon-calendar3"></i>{{$don->created_at}}</li>
        							</ul>
        							<div class="entry-content">
        								{{'Rp. '.number_format($don->nilai_donasi)}}<br>
        								{{$don->komentar}}
        							</div>
        						</div>
        					</div>
        					@endforeach 
        				</div>
        				@else
        				<div id="oc-posts" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="12"
        				data-items-lg="12">
        				<div style="text-align: center;">@lang('language.donatur_kosong')</div>
        			</div>
        			@endif
        			<br>
        			<div class="fancy-title title-center title-dotted-border topmargin">
        				<h3>@lang('language.informasi_program')</h3>
        			</div>
        			<br>
        			<div class="container clearfix">
        				@if($count_info != 0)
        				<div class="row">
        					@foreach($new_info as $info)
        					<?php $upload = date_create($info->created_at);
        					$date_upload = date_format($upload, 'd F Y H:i:s');
        					?>
        					<div class="col-md-12 nobottommargin" style="border: rgb(228, 228, 228) 3px solid; padding: 10px; border-radius:10px;">
        						<div class="feature-box media-box">
        							<div class="fbox-desc">
        								<h3>{{$info->judul}}</h3> 
        								<div class="row">
        									<div class="col-12" style="font-size: 10px;">Di Upload <b>{{$date_upload}}</b></div>
        								</div>
        								{!! $info->content !!}
        							</div>
        						</div>
        					</div>
        					@endforeach
        				</div>
        				@else
        				<div style="text-align: center;">@lang('language.info_kosong')</div>
        				@endif
        			</div>
        			<div class="center"><br>
        				<a href="{{Route('program.donasi',$seo)}}" class="button button-large button-rounded">@lang('language.btn_donasi1')</a>
        			</div><br>
        			<div class="donate-detail">
        				<a href="{{Route('program.donasi',$seo)}}" class="button button-medium button-rounded">@lang('language.btn_donasi')</a>
        			</div>

        			<div class="container clearfix">
        				<div class="row">
        					<div class="col-lg-12">
        						<p class="text-center">Mari berbagi informasi yang insha Allah bermanfaat kepada rekan dan saudara kita. Semoga menjadi amal soleh yang membawa keberkahan untuk anda. klik tombol share di bawah ini.</p>
        					</div>                            
        				</div>
        				<div class="row justify-content-center">
        					<div class="col-md-12">
        						<div class="share-content">

        							<a class="resp-sharing-button__link" href="https://www.facebook.com/sharer/sharer.php?u=https://mizanamanah.or.id/detailprogram/{{$seo}}" target="_blank" rel="noopener" aria-label="Share on Facebook">
        								<div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
        									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
        								</div>Facebook</div>
        							</a>
        							
        							<a class="resp-sharing-button__link" href="http://twitter.com/intent/tweet?url=https://mizanamanah.or.id/detailprogram/{{$seo}}" target="_blank" rel="noopener" aria-label="Share on Twitter">
        								<div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
        									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
        								</div>Twitter</div>
        							</a>
        							
        							<a class="resp-sharing-button__link" href="mailto:?Subject=&Body=https://mizanamanah.or.id/detailprogram/{{$seo}}" target="_self" rel="noopener" aria-label="Share by E-Mail">
        								<div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
        									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z"/></svg></div>E-Mail</div>
        								</a>

        								<a class="resp-sharing-button__link" href="https://api.whatsapp.com/send?text=https://mizanamanah.or.id/detailprogram/{{$seo}}" target="_blank" rel="noopener" aria-label="Share on WhatsApp">
        									<div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
        										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg>
        									</div>WhatsApp</div>
        								</a>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>

        	</div>
        </div>
    </div>


</section>
</div>

</section><!-- #content end -->

<footer id="footer" style="background-color: #002D40;">

	<div class="container">

            <!-- Footer Widgets
            	============================================= -->

            </div>
            @include('front_page.theme1.main_layouts.footer')
            @include('front_page.theme1.components.floating_contact')

        </footer>

    </div><!-- #wrapper end -->

    <!--css include from main_layouts-->
    @include('front_page.theme1.main_layouts.js')
    <!--end css-->
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
    	(function(d, s, id) {
    		var js, fjs = d.getElementsByTagName(s)[0];
    		if (d.getElementById(id)) return;
    		js = d.createElement(s); js.id = id;
    		js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    		fjs.parentNode.insertBefore(js, fjs);
    	}(document, 'script', 'facebook-jssdk'));
    </script>
    <script async="" src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <script>
    	$(window).scroll(function() {    

    		var scroll = $(window).scrollTop();

    		if (scroll >= 500) {
    			$('.donate-detail').fadeIn();
    		} else {
    			$('.donate-detail').fadeOut();    
    		}
    	});
    </script>

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

<!-- 
https://www.facebook.com/sharer.php?t=Operasi%20untuk%20Galang%20%7C%20Mizan%20Amanah&u=https%3A%2F%2Fwww.mizanamanah.or.id%2Fid%2Fcontent%2Foperasi-untuk-galang

https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&display=popup&ref=plugin&src=share_button -->

