@extends('frontend.component.master')

@section('header')
<meta name="description" content="Check Point Derma Express.">
<link rel="canonical" href="https://derma-express.com/checkpoint">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/checkpoint" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Point Derma Kamu di Sini" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<title>Check Point</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
	<div class="container" id="container_luar">
		<div class="container" id="container_dalem" style="display: flex;justify-content: center;">
			<!-- <iframe style="border:0px #ffffff none;" width="100%" height="1000px;" src="http://103.11.135.109:1717/apex/f?p=889:1" scrolling="no" frameborder="1" allowfullscreen=""></iframe> -->
			<!-- <iframe style="border:0px #ffffff none;" width="100%" height="1000px;" src="http://103.11.135.109:1717/apex/f?p=889:3" scrolling="no" frameborder="1" allowfullscreen=""></iframe> -->

			<div class="card card-kemitraan card-checkpoint" style="border-radius: 10px;">
				<div class="card-body">
					<h2>
						<center>Cek Poin</center>
					</h2>
					<br>
					@if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
					@endif
					<form action="{{ Route('dermaster.check-point') }}" method="get">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" name="no_hp" class="form-control" required="" placeholder="No.Handphone*" value="{{ $no_hp }}"><br>
							</div>
							<br>
							<div class="col-lg-12">
								<button type="submit" class="btn btn-info" style="width: 100%;">Cek Poin</button>
							</div>
						</div>
					</form>
					@if($no_hp)
					
					<div class="row">
						<div class="col-lg-12">
							<label>Info Member</label>
							<div style="margin-left: 20px;"> {!! $info_member->konten_page !!}</div>
						</div>
						@if (!$data)
						<div class="col-lg-12">
							<label>Data Customer</label>
							<p>⚠️ &nbsp;&nbsp; Nomor Handphone belum terdaftar.&nbsp; ⚠️</p>
						</div>
						@else
						<div class="col-lg-12">
							<label>Data Customer</label><br>
							<span>Total Trx dari <?=Helper::tanggal_indonesia(date('Y-m-d', strtotime('-1 year')));?> s/d <?=Helper::tanggal_indonesia(date('Y-m-d'))?>: <b>{{ number_format($data[4]) }}</b></span>
							<table class="table table-striped">
								<tr class="text-center">
									<th>ID</th>
									<th>Name</th>
									<th>Point</th>
									<th>Member</th>
								</tr>
								<tr>
									<td>{{ $data[0] }}</td>
									<td>{{ $data[1] }}</td>
									<td style="text-align: right;">{{ $data[2] }}</td>
									<td>{{ $data[3] }}</td>
								</tr>
							</table>
						</div>						
						<hr>

						<div class="col-lg-6"><br>
							<label>Report History Customer</label>
						</div>

						<div class="col-lg-6"><br>
							<a href="{{ Route('dermaster.checkpoint.report', [$data[0], 'report_customer_'.$no_hp]) }}" class="btn btn-info btn-sm" target="blank" style="float: right;">Export</a>
						</div>

						<div class="col-lg-12" style="overflow-x: scroll;"><br>
							<table class="table table-bordered table-striped" id="datatablesHistory">
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
									<?php $no = 1; ?>
									@foreach($history as $val)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $val[0] }}</td>
										<td>{{ $val[1] }}</td>
										<td style="text-align: right;">{{ $val[2] }}</td>
										<td style="text-align: right;">{{ $val[3] }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
					</div>
					@endif
				</div>
			</div>
		</div>
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
		$( "#container_luar" ).removeClass("container").addClass("container-fluid");
	} else {
		$( "#container_dalem" ).addClass("container");
		$( "#container_luar" ).removeClass("container-fluid").addClass("container");
	}

	$(document).ready(function() {
		$('#datatablesHistory').dataTable();
	});
</script>
@endsection