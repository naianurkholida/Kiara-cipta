@extends('component.layouts.master')

@section('button')
	<a href="{{Route('donatur.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

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
						<th>Nama</th>
						<th>Program</th>
						<th>Jumlah</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($history as $his)
					<tr>
						<td class="text-center">{{$no}}</td>
						<td>{{$his->name}}</td>
						<td>{{$his->judul}}</td>
						<td>{{'Rp. '.number_format($his->total)}}</td>
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

@endsection