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
						<td>Posting</td>
						<td>Inbox And Comment</td>
						<td>Status</td>
						<td>Tanggal</td>
                        <td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;?>
					@foreach($inbox as $incom)
						<tr>
							<!-- <td>{{$no}}</td> -->
							<td>{{$incom->nama}}</td>
							<td>Inbox</td>
							<td>{{substr($incom->inbox,0 ,15)}}</td>
							<td>Active</td>
							<td>
								<?php $date = date_create($incom->created_at); $date = date_format($date, 'd-M-Y h:i'); ?>
								{{$date}}
							</td>
							<td>
								action ny guys
							</td>
						</tr>
						<?php $no++?>
					@endforeach

					@foreach($comments as $com)
						<tr>
							<!-- <td>{{$no}}</td> -->
							<td>{{$com->nama}}</td>
							<td>{{$com->judul}}</td>
							<td>{{substr($com->comment,0 ,15)}}</td>
							<td>
								@if($com->status == 1)
									Active
								@else
									Non-Active
								@endif
							</td>
							<td>
								<?php $date = date_create($com->created_at); $date = date_format($date, 'd-M-Y h:i'); ?>
								{{$date}}
							</td>
							<td>
								@if($com->status == 1)
									<a href="{{Route('comments.actived', $com->id)}}" class="btn btn-sm btn-danger">Non-active</a>
								@else
									<a href="{{Route('comments.actived', $com->id)}}" class="btn btn-sm btn-success">Active</a>
								@endif
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