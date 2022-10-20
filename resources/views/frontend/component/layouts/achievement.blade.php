<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px; background-color: #f9f9f9 !important;">
	<div class="container clearfix">
		<center>
			<h2>
				Awards
			</h2>
			<span>Dipercaya dengan pencapaian</span> 
		</center>
		<div style="margin-top: 70px;">
			<div class="owl-carousel owl-theme" id="carousel-awards">
			@foreach(Helper::awardsHome() as $item)
				<div class="item">
					<img src="{{ asset('assets/admin/assets/media/pages') }}/{{ $item->image }}" alt="{{ $item->judul_page }}" style="padding: 5px; border-radius: 5%;" class="lazyload">
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>