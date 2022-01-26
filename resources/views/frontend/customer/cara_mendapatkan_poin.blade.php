<div class="row">
	<div class="col-lg-12">

		<div class="container clearfix">
			<div class="heading-block center noborder" data-heading="O">
				<h3 class="nott ls0">CARA MENDAPATKAN POIN</h3>
				<span>Kumpulkan Poinmu dan Nikmati Keuntungannya</span>
			</div>
		</div>

		<div class="flex-poin">

			@foreach(Helper::how_to_get() as $item)
			
				<div class="flex-poin-items">
					<img src="{{ asset('assets/admin/assets/media/img') }}/{{ $item->icon }}" class="img-poin-items">
					<p class="card-text">
						{{ $item->description }}
					</p>
				</div>

			@endforeach

		</div>
	</div>
</div>