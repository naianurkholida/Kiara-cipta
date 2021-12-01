@extends('frontend.component.master')

@section('header')
<meta name="description" content="Contact Derma Express.">
<link rel="canonical" href="https://derma-express.com/kontak">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/kontak" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Kamu Bisa Menghubungi Kami di Kontak Tercantum." />

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
				Lorem ipsum dolor sit amet consectetur adipisicing, elit. Aspernatur quasi molestiae recusandae doloribus ab, amet corporis magni ad neque perspiciatis harum veritatis exercitationem vitae optio laborum quisquam ratione cum sit?
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-lg-12">
				<h4 style="font-weight: 600;">BENEFITS</h4>
				<span>5 Keuntungan Ekslusif Member</span>
				<div style="display: flex; width: 100%;">
					<div style="width: 20%">
						<img src="{{ asset('assets/image/logo/bday_voucher.png') }}" style="width: 180px;">
						<p>Birthday Voucher senilai Rp 100.000, akan diterima pada bulan ulang tahun, berlaku dengan minimal pembelian Rp500.000</p>
					</div>

					<div style="width: 20%">
						<img src="{{ asset('assets/image/logo/hadiah.png') }}" style="width: 180px;">
						<p>Reward spesial untuk anda yang sudah di Level Gold. Dapatkan merchandise Levi’s® yang dapat dibawa pulang secara gratis tanpa transaksi.</p>
					</div>

					<div style="width: 20%">
						<img src="{{ asset('assets/image/logo/vip.png') }}" style="width: 180px;">
						<p>Mendapatkan penawaran khusus untuk member, seperti Extra Diskon 10%, Surprise Voucher, dll.</p>
					</div>

					<div style="width: 20%">
						<img src="{{ asset('assets/image/logo/poin.png') }}" style="width: 180px;">
						<p>Poin anda dapat ditukar dengan voucher potongan harga.</p>
					</div>

					<div style="width: 20%">
						<img src="{{ asset('assets/image/logo/promo.png') }}" style="width: 180px;">
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
				<div style="display: flex; width: 100%; margin-top: 10px;">
					<div style="width: 25%">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/bronze.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<h5 class="card-title text-center">Turquoise</h5>
								<p class="card-text">Pada level ini, transaksi anda berarti 0 sampai 30 juta</p>
							</div>
						</div>
					</div>

					<div style="width: 25%">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/silver.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<h5 class="card-title text-center">Silver</h5>
								<p class="card-text">Pada level ini, transaksi anda berarti 30 juta sampai 60 juta </p>
							</div>
						</div>
					</div>

					<div style="width: 25%">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/gold.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<h5 class="card-title text-center">Gold</h5>
								<p class="card-text">Pada level ini, transaksi anda berarti 60 juta sampai 100 juta</p>
							</div>
						</div>
					</div>

					<div style="width: 25%">
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

		<div class="row">
			<div class="col-lg-12">
				<h4 style="font-weight: 600;">CARA MENDAPATKAN POIN</h4>
				<span>Kumpulkan Poinmu dan Nikmati Keuntungannya</span>
				<div style="display: flex; width: 100%; margin-top: 10px;">
					<div style="width: 35%">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/transaction.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<p class="card-text">
									Poin diperoleh dari transaksi pembelanjaan produk Derma Express di Original Store, Shopee, Toko Pedia, Lazada, Bukalapak dan derma-express.com via whatsapp.
								</p>
							</div>
						</div>
					</div>

					<div style="width: 30%">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/get_point.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<p class="card-text">Setiap transaksi Rp 10.000 akan mendapatkan 1 poin.</p>
							</div>
						</div>
					</div>

					<div style="width: 35%">
						<div class="card" style="width: 18rem; border: none;">
							<img src="{{ asset('assets/image/logo/calendar.png') }}" class="card-img-top" style="width: 180px; margin-left: 50px;">
							<div class="card-body">
								<p class="card-text">Masa kadaluarsa poin adalah 1 tahun dihitung dari tanggal transaksi.</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-lg-12">
				<div style="display: flex; width: 100%;">
					<div style="width: 20%">Beranda</div>
					<div style="width: 20%">Profile</div>
					<div style="width: 20%">History Transactions</div>
					<div style="width: 20%">Change Password</div>
					<div style="width: 20%">Change Poin</div>
				</div>
			</div>
		</div>
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
		let no_telp = Cookies.get('username')

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