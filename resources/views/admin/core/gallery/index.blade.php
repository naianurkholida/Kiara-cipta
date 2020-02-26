@extends('component.layouts.master')

@section('button')
	<a href="{{Route('gallery.insert')}}" class="btn btn-info">
		<i class="flaticon-plus"></i>
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
						<th>Type</th>
						<th>URL</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no=1?>
					@foreach($data as $row)
					<tr>
						<td>{{$no}}</td>
						<td>{{ $row->getFirstMedia('gallery') != NULL || $row->embed == NULL ? 'image' : 'video' }}</td>
						<td>@if($row->embed != NULL) <a href="{{ $row->embed }}" target="blank">{{ $row->embed }}</a> @else <a href="{{ $row->getFirstMediaUrl('gallery') != NULL ? $row->getFirstMediaUrl('gallery') : '#' }}" target="{{ $row->getFirstMediaUrl('gallery') != NULL ? 'blank' : '_parent' }}">{{ $row->getFirstMediaUrl('gallery') != NULL ? $row->getFirstMediaUrl('gallery') : 'image not set' }}</a> @endif</td>
						<td class="text-center">
							<a href="{{Route('gallery.edit',$row->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							<a href="{{Route('gallery.delete',$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
								<i class="la la-trash"></i>
							</a>
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

@endsection