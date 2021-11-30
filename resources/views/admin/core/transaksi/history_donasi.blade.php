@extends('component.layouts.master')

@section('content')
<div class="card">
	<div class="card-header">
		<h3>{{ Helper::baseLabelPage() }}</h3>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<table class="table table-striped table-bordered table-hover" id="table-responsive">
				<thead class="m-datatable__head">
					<tr class="m-datatable__row text-center">
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>No Telepon</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>Jumlah Donasi</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
					<?php $no =1;?>
					@foreach($donatur as $don)
						<tr>
							<td>{{$no}}</td>
							@if($don->name != null)
								<td>{{$don->name}}</td>
								<td>{{$don->no_telp}}</td>
								<td>{{$don->email}}</td>
								<td>{{$don->alamat}}</td>
							@else
								<td>{{$don->nama_lengkap}}</td>
								<td>{{$don->no_telp_guest}}</td>
								<td>{{$don->email_guest}}</td>
								<td>{{$don->alamat_guest}}</td>
							@endif
							<td>{{'Rp. '.number_format($don->total)}}</td>
							<td>{{$don->status}}</td>
						</tr>

					<?php $no++?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$(document().ready(function(){
		location.reload();
	});
</script>
@endsection