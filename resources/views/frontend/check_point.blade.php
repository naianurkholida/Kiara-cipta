@extends('frontend.component.master')

@section('header')
<meta name="description" content="Check Point Derma Express.">

<link rel="canonical" href="http://derma-express.com/checkpoint">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<title>Check Point</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;padding-left: 300px;padding-right: 350px;">
	<div class="container" id="container_luar">
		<div class="container" id="container_dalem">
			<!-- <iframe style="border:0px #ffffff none;" width="100%" height="1000px;" src="http://103.11.135.109:1717/apex/f?p=889:1" scrolling="no" frameborder="1" allowfullscreen=""></iframe> -->
			<!-- <iframe style="border:0px #ffffff none;" width="100%" height="1000px;" src="http://103.11.135.109:1717/apex/f?p=889:3" scrolling="no" frameborder="1" allowfullscreen=""></iframe> -->

			<div class="card" style="border-radius: 10px;">
				<div class="card-body">
					<h2>Checkpoint</h2>
					@if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
					@endif
					<form action="{{ Route('dermaster.check-point') }}" method="get">
						<div class="row">
							<div class="col-lg-12">
								<label>No Handphone <span style="color: red;">*</span></label>
								<input type="text" name="no_hp" class="form-control" required="" placeholder="No Handphone"><br>
							</div>
							<br>
							<div class="col-lg-12">
								<button type="submit" class="btn btn-info" style="width: 100%;">Check Point</button>
							</div>
						</div>
					</form>
					@if($no_hp)
					<br><br>
					<div class="row">
						<div class="col-lg-12">
							<label>Data Customer</label>
							<table class="table table-bordered table-striped">
								<tr class="text-center">
									<th>ID</th>
									<th>Name</th>
									<th>Point</th>
								</tr>
								<tr>
									<td>{{ $data[0] }}</td>
									<td>{{ $data[1] }}</td>
									<td style="text-align: right;">{{ $data[2] }}</td>
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

						<div class="col-lg-12"><br>
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