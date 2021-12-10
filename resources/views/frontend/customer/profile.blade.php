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

			<h3 class="nott ls0">Profile</h3>

		</div>
	</div>

	<div class="container">

		<div class="row">
			<div class="col-lg-12">

				<div class="card text-center" style="height: 350px; width: 700px; border-radius: 50px; margin-left: 20%;">
					<div class="card-body" style="background-image: url('/assets/admin/assets/media/bg/Artboard 1_alt.jpg'); background-size: cover; border-radius: 10px;">
						<h2 class="card-title card-name">Derma Express Card</h2>
						<h3 class="card-text name-customer" id="name_customer">Nama Customer</h3>
						<h3 class="card-text id-customer" id="id_customer">ID Customer</h3>
					</div>
				</div>

			</div>
		</div>

		<div class="row" style="margin-top: 25px;">
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

		<div class="row" style="margin-top: 25px;">
			<div class="col-lg-12">
				<h4 style="font-weight: 600;">Info Member</h4>
				<div style="margin: 12px;">{!! $info_member->konten_page !!}</div>
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
		getPointCustomer()
	});

	function getPointCustomer() {
		let id = '{{ Session::get("customer_no_telp") }}'

		$.ajax({
			url: '{{ url("customer/get-customer") }}',
			type: 'GET',
			dataType: 'json',
			data: { id: id },
		})
		.done(function(res) {
			$('#id_customer').html(res.customer[0])
			$('#name_customer').html(res.customer[1])
			
			$('#td_name').html(res.customer[1])
			$('#td_id').html(res.customer[0])

			$('#td_member').html(res.customer[3])
			$('#td_point').html(res.customer[2])
		});		
	}
</script>
@endsection