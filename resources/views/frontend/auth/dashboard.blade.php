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
				<h4 style="font-weight: 600;">BENEFITS</h4>
				<span>5 Keuntungan Ekslusif Member</span>
				<div class="flex-2" style="display: flex;">
					<div class="flex-benefits-items">
						<img src="{{ asset('assets/image/logo/bday_voucher.png') }}" class="img-benefits-items">
						<p>Birthday Voucher senilai Rp 100.000, akan diterima pada bulan ulang tahun, berlaku dengan minimal pembelian Rp500.000</p>
					</div>

					<div class="flex-benefits-items">
						<img src="{{ asset('assets/image/logo/hadiah.png') }}" class="img-benefits-items">
						<p>Reward spesial untuk anda yang sudah di Level Gold. Dapatkan merchandise Levi’s® yang dapat dibawa pulang secara gratis tanpa transaksi.</p>
					</div>

					<div class="flex-benefits-items">
						<img src="{{ asset('assets/image/logo/vip.png') }}" class="img-benefits-items">
						<p>Mendapatkan penawaran khusus untuk member, seperti Extra Diskon 10%, Surprise Voucher, dll.</p>
					</div>

					<div class="flex-benefits-items">
						<img src="{{ asset('assets/image/logo/poin.png') }}" class="img-benefits-items">
						<p>Poin anda dapat ditukar dengan voucher potongan harga.</p>
					</div>

					<div class="flex-benefits-items">
						<img src="{{ asset('assets/image/logo/promo.png') }}" class="img-benefits-items">
						<p>Anda dapat diundang ke acara khusus yang diadakan oleh Levi’s®</p>
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-lg-12">
				<h4 style="font-weight: 600">MEMBERSHIP LEVEL</h4>
				<span>Jadilah Member dan Dapatkan Keuntungannya</span>
				<div class="flex-2" style="display: flex; margin-top: 10px;">

					<div class="flex-membership-items">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/bronze.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<h5 class="card-title text-center">Turquoise</h5>
								<p class="card-text">Pada level ini, transaksi anda berarti 0 sampai 30 juta</p>
							</div>
						</div>
					</div>

					<div class="flex-membership-items">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/silver.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<h5 class="card-title text-center">Silver</h5>
								<p class="card-text">Pada level ini, transaksi anda berarti 30 juta sampai 60 juta </p>
							</div>
						</div>
					</div>

					<div class="flex-membership-items">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/gold.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<h5 class="card-title text-center">Gold</h5>
								<p class="card-text">Pada level ini, transaksi anda berarti 60 juta sampai 100 juta</p>
							</div>
						</div>
					</div>

					<div class="flex-membership-items">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/crown.png') }}" class="card-img-top" style="width: 200px; margin-left: 50px; margin-top: 50px;">
							<div class="card-body">
								<h5 class="card-title text-center" style="margin-top: 62px;">Solitaire</h5>
								<p class="card-text">Pada level ini, transaksi anda berarti diatas 100 juta</p>
							</div>
						</div>
					</div>

				</div>
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