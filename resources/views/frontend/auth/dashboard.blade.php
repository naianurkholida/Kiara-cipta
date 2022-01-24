@extends('frontend.component.master')

@section('header')
<meta name="description" content="Derma Express.">
<link rel="canonical" href="https://derma-express.com/dashboard-customer">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/dashboard-customer" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Dashboard Customer" />

<title>Customer Profile</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
	<div class="container clearfix">
		<div class="heading-block center noborder" data-heading="O">

			<h3 class="nott ls0">Selamat Datang Kembali</h3>

		</div>
	</div>
	<div class="container">

		<div class="row">
			<div class="col-lg-12">
				<h4 style="font-weight: 600;">Hai, <span id="name_customer"></span></h4>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-lg-12">
				<div class="container clearfix">
					<div class="heading-block center noborder" data-heading="O">
						<h3 class="nott ls0">BENEFITS</h3>
						<span>5 Keuntungan Ekslusif Member</span>
					</div>
				</div>

				<div class="flex-2" style="display: flex;">
					
					@foreach(Helper::benefit() as $item)

						<div class="flex-benefits-items">
							<img src="{{ asset('assets/admin/assets/media/img') }}/{{ $item->icon }}" class="img-benefits-items">
							<p>{{ $item->description }}</p>
						</div>

					@endforeach

				</div>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-lg-12">
				<div class="container clearfix">
					<div class="heading-block center noborder" data-heading="O">
						<h3 class="nott ls0">MEMBERSHIP LEVEL</h3>
						<span>Jadilah Member dan Dapatkan Keuntungannya</span>
					</div>
				</div>
				
				@foreach(Helper::membership() as $key => $item)
					@if(($key%2 == 0))
						<div class="benefit-item">
							<img src="{{ asset('assets/admin/assets/media/img') }}/{{ $item->icon }}" class="img-benefit">
							<div class="card-body">
								<h5 class="benefit-title">{{ $item->name }}</h5>
								<p class="card-text">{{ $item->description }}</p>
							</div>
						</div>
					@else
						<div class="benefit-item benefit-rtl">
							<img src="{{ asset('assets/admin/assets/media/img') }}/{{ $item->icon }}" class="img-benefit">
							<div class="card-body">
								<h5 class="benefit-title">{{ $item->name }}</h5>
								<p class="card-text">{{ $item->description }}</p>
							</div>
						</div>
					@endif
				@endforeach

			</div>
		</div>

		<hr>

		@include('frontend.customer.cara_mendapatkan_poin')

		<hr>

		@include('frontend.customer.menu')
	</div>

</div>
@endsection

@section('js')
<script>

	if (window.matchMedia('(max-width: 425px)'))
	{
		$( "#container_dalem" ).removeClass("container");
	} else {
		$( "#container_dalem" ).addClass("container");
	}

	$(document).ready(function() {
		getDataCustomer()
	});

	function getDataCustomer() {
		let no_telp = '{{ Session::get("customer_no_telp") }}'

		$.ajax({
			url: '{{ url("customer-profile") }}/'+no_telp,
			type: 'GET',
			dataType: 'json',
		})
		.done(function(res) {
			$('#name_customer').html(res.message[0].CUSTOMER_NAME)
		});
	}
</script>
@endsection