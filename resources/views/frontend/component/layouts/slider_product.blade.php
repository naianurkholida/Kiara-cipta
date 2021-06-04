<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px;background-color: #f9f9f9 !important;">
	<div class="container clearfix">
		
		<div class="owl-carousel owl-theme" id="carousel-product" style="margin-top: 10px; margin-bottom: 10px;">
			@foreach(Helper::produkList() as $item)
			<div class="item">
				<img src="{{ asset('assets/admin/assets/media/derma_produk') }}/{{ $item->banner }}" alt="">
			</div>
			@endforeach
		</div>
		
	</div>
</div>
