@extends('frontend.component.master')

@section('header')
<meta name="description" content="Derma Express.">
<link rel="canonical" href="https://derma-express.com/dashboard-customer">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/dashboard-customer" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Dashboard Customer" />

<title>Customer Change Poin</title>
<style type="text/css">
	.dataTables_filter {
		float: right;
	}

	.pagination {
		float: right;
	}
</style>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">

	<div class="container clearfix">
		<div class="heading-block center noborder" data-heading="O">

			<h3 class="nott ls0">Tukar Poin</h3>

		</div>
	</div>

	<div class="container" style="width: 100%">
		
		<div class="row">
			<div class="col-lg-12">
				<p>Jumlah poin yang kamu miliki bisa di tukarkan dengan produk, untuk melakukan pertukaran produk kamu bisa menukarkan langsung di klinik cabang Derma Express.</p>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>ID</th>
							<th>Member</th>
							<th>Point</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="td_name"></td>
							<td id="td_id"></td>
							<td id="td_member"></td>
							<td id="td_point"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row" style="margin-top: 20px;">
			<div class="col-lg-12">
				<h4 style="font-weight: bold; text-align: center;">Produk</h4>
				<hr>
			</div>

			<div class="col-lg-12">
				<div class="box-bestseller">
					@foreach(Helper::produkListChangePoin() as $row)
					<div class="item-bestseller">
						<div class="img-bestseller" style="background-image: url({{ asset('assets/admin/assets/media/derma_produk/500') }}/{{$row->image}}); padding: 8px;" alt="{{ $row->getProdukLanguage->judul }}" class="lazyload">
							<p id="badge-product" style="
							border-radius: 4px; 
							background-color: #67b6ab; 
							color: white;
							padding: 8px;
							width: fit-content;">
							{{ number_format($row->poin) }}
						</p>
					</div>
					
					<div class="btn-bestseller" style="border-radius: 8px;">
						<a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: white; text-align:center;">{{$row->getProdukLanguage->judul}}
						</a>
					</div>

					<div class="overlay-bestseller" style="border: 3px solid #67b6ab; background-color: rgb(0 128 128 / 95%);">
						<div class="container-overlay">
							<div>
								<?php //$icon = Helper::iconProdukBestSeller($row->id); ?>
								@foreach($row->getSpec as $val)
								<img src="{{ asset('assets/admin/assets/media/derma_produk_spec') }}/{{ $val->icon_light }}" alt="" style="width: 15% !important; margin-left: 16%; margin-right: 15px;" class="lazyload">
								<span>{{ $val->specification }}</span>
								<br><br>
								@endforeach
							</div>
						</div>
						<div class="btn-bestseller-overlay" style="border-radius: 8px;">
							<a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: rgb(16, 158, 158) ; text-align:center;">{{$row->getProdukLanguage->judul}}
							</a>
						</div>
					</div>

					</div>
					@endforeach
				</div>
			</div>
		</div>

		<hr>

		@include('frontend.customer.menu')
	</div>

</div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>

	if (window.matchMedia('(max-width: 425px)'))
	{
		$( "#container_dalem" ).removeClass("container");
	} else {
		$( "#container_dalem" ).addClass("container");
	}

	$(document).ready(function() {
		getDataCustomer()
		getPointCustomer()
	});

	function getDataCustomer() {
		let no_telp = '{{ Session::get("customer_no_telp") }}'

		$.ajax({
			url: '{{ url("customer-profile") }}/'+no_telp,
			type: 'GET',
			dataType: 'json',
		})
		.done(function(res) {
			$('#id_customer').html(res.message[0].CUSTOMER_ID)
			$('#name_customer').html(res.message[0].CUSTOMER_NAME)
			
			$('#td_name').html(res.message[0].CUSTOMER_NAME)
			$('#td_id').html(res.message[0].CUSTOMER_ID)
		});
	}

	function getPointCustomer() {
		let id = '{{ Session::get("customer_no_telp") }}'

		$.ajax({
			url: '{{ url("customer/get-customer") }}',
			type: 'GET',
			dataType: 'json',
			data: { id: id },
		})
		.done(function(res) {
			$('#td_member').html(res.customer[3])
			$('#td_point').html(res.customer[2])
		});		
	}

</script>
@endsection