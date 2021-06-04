<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px;background-color: #f9f9f9 !important;">
    <div class="container clearfix">
        <div id="posts" class="post-grid grid-12 clearfix">
            
        	<div class="owl-carousel owl-theme" id="carousel-product" style="margin-top: 20px; margin-bottom: 20px;">
        		@foreach(Helper::produkList() as $item)
        		<div class="item">
        			<img src="{{ asset('assets/admin/assets/media/derma_produk') }}/{{ $item->banner }}" alt="">
        		</div>
        		@endforeach
        	</div>

        </div>
    </div>
</div>
