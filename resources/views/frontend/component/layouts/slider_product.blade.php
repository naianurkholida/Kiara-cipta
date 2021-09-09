<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px;background-color: #f9f9f9 !important;">
	<div class="container clearfix">

		<div class="owl-carousel owl-theme" id="carousel-product">
			@foreach(Helper::sliderProduk() as $item)
			<div class="item">
				<a href="{{ url('slider/produk/show') }}/{{ $item->seo }}" class="lazyload" alt="{{$item->descriptionJoin->title}}">
					<img src="{{ asset('assets/admin/assets/media/slider/500') }}/{{ $item->banner }}" alt="{{ $item->descriptionJoin->title }}" style="padding: 5px; border-radius: 5%;">
				</a>
			</div>
			@endforeach
		</div>

	</div>
</div>
