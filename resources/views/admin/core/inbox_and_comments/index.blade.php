@extends('component.layouts.master')

@section('content')
<div class="card">
	<div class="card-header">
		<h3>{{ Helper::baseLabelPage() }}</h3>
	</div>
	<div class="card-body">
	<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<table class="table table-striped table-bordered table-hover" id="table">
				<thead class="m-datatable__head">
					<tr class="m-datatable__row text-center">
                        <!-- <td>No</td> -->
						<td>Nama</td>
						<td>Email</td>
						<td>Posting</td>
						<td>Inbox And Comment</td>
						<td>Status</td>
						<td>Tanggal</td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;?>
					@foreach($inbox as $incom)
						<tr>
							<!-- <td>{{$no}}</td> -->
							<td>{{$incom->nama}}</td>
							<td>{{$incom->email}}</td>
							<td>Inbox</td>
							<td>{{substr($incom->inbox,0 ,15)}}</td>
							<td>Active</td>
							<td>
								<?php $date = date_create($incom->created_at); $date = date_format($date, 'd-M-Y h:i'); ?>
								{{$date}}
							</td>
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
	<script>
		$(document).ready(function() {
			$('#table').DataTable( {
				"order": [[ 4, "desc" ]]
			} );
		} );
	</script>
@endsection