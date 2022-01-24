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

<style type="text/css">
	.flex-prog-poin{
		width: 100%;
		position: absolute;
		display: flex;
		justify-content: space-between;
	}
	.one, .two, .three, .fourth{
		/* position:absolute; */
		margin-top:-8px;
		z-index:1;
		height:30px;
		width:30px;
		border-radius:25px;	
	}
	.item-prog-point{
		width: 25%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: left;
	}
	.circle-point{
		margin-top:-8px;
		z-index:1;
		height:30px;
		width:30px;
		border-radius:25px;	
		margin-bottom: 10px;
	}
	.circle-nonactive{
		background-color: #e9ecef !important;
		border: 3px solid #17a2b854;
	}
	.progress{
		margin-bottom: 50px;
	}
	.txt-point{
		font-weight: 600;
		font-size: 15px;
	}
	.txt-point-nonactive{
		font-weight: 600;
		font-size: 15px;
		color: #bcbcbc;
	}
	@keyframes slideInFromLeft {
		0% {
			transform: translateX(-100%);
		}
		100% {
			transform: translateX(0);
		}
	}
	/*.progress-bar {
		animation: 2s ease-out 10s 1 slideInFromLeft;
	}*/
</style>
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

				<center>
					<div class="card card-responsive text-center" style="">
						<div class="card-body" style="background-image: url('/assets/admin/assets/media/bg/{{$settings->icon}}'); background-size: cover; border-radius: 10px;">
							<h2 class="card-title card-name">Derma Express Card</h2>
							<h3 class="card-text name-customer" id="name_customer">{{ $data[0][1] }}</h3>
							<h3 class="card-text id-customer" id="id_customer">{{ $data[0][0] }}</h3>
						</div>
					</div>
				</center>

			</div>
		</div>

		<div class="row" style="margin-top: 25px;">
			<div class="col-lg-12">
				<div class="table-responsive">
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

		</div>

		<div class="row" style="margin-top: 25px;">
			<div class="col-lg-12">
				<h4 style="font-weight: 600;">Info Member</h4>
				<div style="margin: 12px;">{!! $info_member->konten_page !!}</div>
			</div>
			

			<div class="col-lg-12">
				<div class="progress">
					<div class="flex-prog-poin">
						<div class="item-prog-point">
							<div class="circle-point bg-info"></div>
							<p class="txt-point">Turquoise</p>
						</div>
						<div class="item-prog-point">
							<div id="circle-point-silver" class="circle-point circle-nonactive bg-info"></div>
							<p id="circle-point-text-silver" class="txt-point-nonactive">Silver</p>
						</div>
						<div class="item-prog-point">
							<div class="circle-point circle-nonactive bg-info"></div>
							<p class="txt-point-nonactive">Gold</p>
						</div>
						<div class="item-prog-point">
							<div class="circle-point circle-nonactive bg-info"></div>
							<p class="txt-point-nonactive">Solitaire</p>
						</div>
					</div>
					
					<div class="progress-bar bg-info" id="progress"></div>
				</div>
				<p id="text-progress"></p>
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
		getDataCustomer()
	});

	function execProg(num) {

		$(".progress-bar").animate({
			width: num+'%'
		}, 5000 );

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
			// $('#id_customer').html(res.customer[0])
			// $('#name_customer').html(res.customer[1])
			
			$('#td_name').html(res.customer[1])
			$('#td_id').html(res.customer[0])

			$('#td_member').html(res.customer[3])
			$('#td_point').html(res.customer[2])
		});		
	}

	function getDataCustomer() {
		let no_telp = '{{ Session::get("customer_no_telp") }}'

		$.ajax({
			url: '{{ url("customer-profile") }}/'+no_telp,
			type: 'GET',
			dataType: 'json',
		})
		.done(function(res) {
			let last =  res.data.length - 1;
			let data = res.data[last][2];

			let amount  = parseInt(data.replace(/,/g, ''));

			let turquoise = 30000000;
			let silver = 60000000;
			let gold = 100000000;
			let solitaire = 100000000;

			var persen = 0;
			var sisa = 0;
			var text = '';

			if(amount <= turquoise){
				sisa = (turquoise-amount)+' untuk menuju level Silver.';
			}else if(amount >= turquoise && amount <= silver){
				sisa = (silver-amount)+' untuk menuju level Gold.';

				document.getElementById('circle-point-silver').classList.remove("circle-nonactive");
				document.getElementById('circle-point-text-silver').classList.remove("txt-point-nonactive");

			}else if(amount >= silver && amount <= gold){
				sisa = (gold-amount)+' untuk menuju level Solitaire.';

				document.getElementById('circle-point-gold').classList.remove("circle-nonactive");
				document.getElementById('circle-point-text-gold').classList.remove("txt-point-nonactive");
			}else{
				sisa = (solitaire-amount)+', selamat and sudah mencapai level Solitaire.';

				document.getElementById('circle-point-solitaire').classList.remove("circle-nonactive");
				document.getElementById('circle-point-text-solitaire').classList.remove("txt-point-nonactive");
			}

			persen = ((amount / solitaire) * 100).toFixed(2);
			$('#text-progress').html('Ayo tingkatin transaksi kamu sisa '+'Rp. '+sisa.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

			execProg(persen);
		});
	}
</script>
@endsection