<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<title>Lembaga Amil Zakat Nasional | Mizan Amanah</title>

</head>
<!-- <div style="background-color: red; padding-bottom: 0px;">
	<h4 class="text-center" style="color: white;">Website Under Maintenance</h1>
</div> -->
<body class="stretched">
	<div id="" class="clearfix">
		@include('front_page.theme1.main_layouts.header')
		@include('front_page.theme1.components.slider')
		<section id="content" style="overflow: visible">
			<div class="content-wrap p-0">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1382 58" width="100%" height="60" preserveAspectRatio="none" style="position: absolute; top: -58px; left:0; z-index: 1">
					<path style="fill:#FFF;" d="M1.52.62s802.13,127,1380,0v56H.51Z" /></svg>

					@include('front_page.theme1.components.program_utama')

					@include('front_page.theme1.components.kisah_sukses')

					@include('front_page.theme1.components.program')

					@include('front_page.theme1.components.mitra_perusahaan')

					@include('front_page.theme1.components.update_artikel')

					<div class="clear"></div>  
				</div>
			</section>

			<footer id="footer" style="background-color: #002D40; ">
				<div class="container">
					@include('front_page.theme1.components.footer_widget')
				</div>
				@include('front_page.theme1.main_layouts.footer')
			</footer>

		</div>

		<div id="gotoTop" class="icon-angle-up"></div>
		<!-- @include('front_page.theme1.components.floating_contact') -->

		<!--Javscript include from main_layouts-->
		@include('front_page.theme1.main_layouts.js')
		<!--end js-->
	</body>

	</html>