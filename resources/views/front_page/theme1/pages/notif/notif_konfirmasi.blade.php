<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<title>Notifikasi | Mizan Amanah</title>

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
        					<h3 class="mb-4 nott">@lang('language.notifikasi_transaksi')</h3>
        				</div>
        				<div class="svg-line bottommargin-sm clearfix">
        					<hr style="background-color: red; height: 1px; width: 200px;">
        				</div>
        			</div>
        		</div>
        	</div>

        <!-- Content
        	============================================= -->
        	<section id="content">
        		<div class="row">
        			<div class="col-md-12">
        				<div class="feature-box fbox-center fbox-plain">
        					<div class="fbox-icon">
        						<a href="#"><i class="icon-bell2"></i></a>
        					</div>
        					<h3>@lang('language.notifikasi_pending_midtrans_judul')</h3>
        					<p>@lang('language.notifikasi_pending_midtrans_desc') <i class="icon-bell2"></i></p>
        					<p>Pembayaran Berhasil Setelah Admin Menyetujui ! Terimakasih ...</p>
                            <br><br><br><br><br>
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

    	<!--Javscript include from main_layouts-->
    	@include('front_page.theme1.main_layouts.js')
    	<!--end js-->


    </body>

    </html>