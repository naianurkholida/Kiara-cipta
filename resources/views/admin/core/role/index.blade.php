@extends('component.layouts.master')

@section('button')
	<a href="{{Route('role.insert')}}" class="btn btn-info">
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
						<th>Code</th>
						<th>Nama</th>
						<th>Deskripsi</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no=1?>
					@foreach($role as $role)
					<tr>
						<td>{{$no}}</td>
						<td>{{$role->code}}</td>
						<td>{{$role->name}}</td>
						<td>{{$role->description}}</td>
						<td class="text-center">
							@if($validasi->update == 1)
							<a href="{{Route('role.edit',$role->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							@endif

							@if($validasi->delete == 1)
							<a href="{{Route('role.delete',$role->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
								<i class="la la-trash"></i>
							</a>
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

@endsection