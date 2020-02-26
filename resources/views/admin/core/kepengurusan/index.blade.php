@extends('component.layouts.master')

@section('button')
	<a href="{{Route('kepengurusan.insert')}}" class="btn btn-info">
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
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Foto</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no=1?>
					@foreach($kepengurusan as $val)
					<tr>
						<td>{{$no}}</td>
						<td>{{$val->nama}}</td>
						<td>{{$val->jabatan}}</td>
						<td class="text-center"><img src="{{asset('admin/assets/media/foto-kepengurusan/300')}}/{{$val->foto}}"></td>
						<td class="text-center">
							<a href="{{Route('kepengurusan.edit',$val->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							<a href="{{Route('kepengurusan.delete',$val->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
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