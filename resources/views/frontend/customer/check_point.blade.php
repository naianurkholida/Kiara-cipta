@extends('frontend.component.master')

@section('header')
<meta name="description" content="Derma Express.">
<link rel="canonical" href="https://derma-express.com/dashboard-customer">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/dashboard-customer" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Dashboard Customer" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

<title>Customer Profile</title>
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

			<h3 class="nott ls0">Riwayat Transaksi</h3>

		</div>
	</div>

	<div class="container" style="width: 100%">
		
		<div class="row">
			<div class="col-lg-12">
				<a href="javascript:0;" onclick="export_pdf()" class="btn btn-info btn-sm" style="float: right;">Export</a>
			</div>
		</div>

		<input type="hidden" id="id_customer">
		<input type="hidden" id="no_telp">

		<table class="table table-bordered table-striped dt-responsive nowrap" id="datatablesHistory" style="width:100%">
			<thead>
				<tr class="text-center">
					<th>No</th>
					<th>Date</th>
					<th>Trx No</th>
					<th>Amount</th>
					<th>Point</th>
				</tr>
			</thead>
			<tbody>
				<?php $no =1; foreach($data as $item): ?>
				<tr>
					<td>{{ $no++ }}
						<td>{{ $item[0] }}</td>
						<td>{{ $item[1] }}</td>
						<td>{{ $item[2] }}</td>
						<td>{{ $item[3] }}</td>
					</td>
				</tr>
				<?php endforeach;  ?>
			</tbody>
		</table>

		<hr>

		@include('frontend.customer.menu')
	</div>

</div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>

	if (window.matchMedia('(max-width: 425px)'))
	{
		$( "#container_dalem" ).removeClass("container");
	} else {
		$( "#container_dalem" ).addClass("container");
	}

	$(document).ready(function() {
		$('#datatablesHistory').dataTable();

		getDataCustomer()
		getPointCustomer()

	});

	function export_pdf() {
		var idTrx = $('#id_customer').val()
		var no_telp = $('#no_telp').val()

		window.open("{{ url('checkpoint-report') }}/"+idTrx+"/report_customer_"+no_telp);
	}

	function getDataCustomer() {
		let no_telp = '{{ Session::get("customer_no_telp") }}'

		$.ajax({
			url: '{{ url("customer-profile") }}/'+no_telp,
			type: 'GET',
			dataType: 'json',
		})
		.done(function(res) {
			$('#id_customer').val(res.message[0].CUSTOMER_ID)
			$('#no_telp').val(res.message[0].TELEPHON)
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