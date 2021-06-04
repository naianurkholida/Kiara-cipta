<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px;background-color: #f9f9f9 !important;">
	<div class="container clearfix">

		<div class="owl-carousel owl-theme" id="carousel-product">
			@foreach(Helper::produkList() as $item)
			<div class="item">
				<p id="badge-product" style="border-radius: 4px; background-color: #65b5aa; color: white;padding: 8px;width: fit-content;">
					{{ $item->getCategory->category }}
				</p>
				<img src="{{ asset('assets/admin/assets/media/derma_produk') }}/{{ $item->banner }}" alt="{{ $item->getProdukLanguage->judul }}" style="padding: 5px; border-radius: 5%;">
			</div>
			@endforeach
		</div>

	</div>
</div>
