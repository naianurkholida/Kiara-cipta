<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<title>Rekening Donasi | Mizan Amanah</title>

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
        					<h3 class="mb-4 nott">{{$content->judul_page}}</h3>
        				</div>
        				<div class="svg-line bottommargin-sm clearfix">
        					<hr style="background-color: red; height: 1px; width: 250px;">
        				</div>
        			</div>
        		</div>
        	</div>

        <!-- Content
        	============================================= -->
        	<section id="content" style="overflow: visible">
        		<div class="content-wrap p-0">
        			<!-- <div class="section" style="background: #FFF ; padding-top: 10px; "> -->
        				<div class="container clearfix">
        					<div class="row">
        						<div class="col-lg-12">
        							{!! $content->konten_page !!}
        							<br /><br /><br /><br /><br /><br />
        							<br /><br /><br /><br /><br /><br />
        						</div>
        					</div>
        				</div>

        				<div class="clear"></div>  
        			<!-- </div> -->
        		</div>
        	</section>
        <!-- Footer
        	============================================= -->
        	<footer id="footer" style="background-color: #002D40; bottom: 0">
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