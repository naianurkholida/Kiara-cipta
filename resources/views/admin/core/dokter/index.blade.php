@extends('component.layouts.master')

@section('button')
	<a href="{{Route('dokter.insert')}}" class="btn btn-info">
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
						<th>Name</th>
						<th>Position</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no=1?>
					@foreach($data as $row)
					<tr>
						<td>{{$no}}</td>
						<td>{{ $row->name }}</td>
						<td>{!! $row->getCategory->category !!}</td>
						<td>
							@if($row->getFirstMediaUrl('dokter') != NULL)
								<a href="{{ $row->getFirstMediaUrl('dokter') }}" target="blank">
									{{ $row->getFirstMediaUrl('dokter') }}
								</a>
								@else
								image not set
							@endif
						</td>
						<td class="text-center">
							<a href="{{Route('dokter.edit',$row->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							<a href="{{Route('dokter.delete',$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
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