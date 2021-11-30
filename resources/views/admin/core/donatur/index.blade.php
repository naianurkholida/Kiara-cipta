@extends('component.layouts.master')

@section('button')
	<a href="{{Route('donatur.insert')}}" class="btn btn-info">
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
						<th>Email</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($donatur as $don)
					<tr>
						<td class="text-center">{{$no}}</td>
						<td data-field="AgentName" class="kt-datatable__cell">
							<span style="width: 200px;">
								<div class="kt-user-card-v2">								
									<div class="kt-user-card-v2__pic">									
										<div class="kt-badge kt-badge--xl kt-badge--warning"><img src="{{asset('admin/assets/media/foto-users/300')}}/{{$don->foto}}"></div>								
									</div>								
									<div class="kt-user-card-v2__details">									
										<label class="kt-user-card-v2__name">{{$don->name}}</label>
									</div>
								</div>
							</span>
						</td>
						<td>{{$don->email}}</td>
						<td>{{$don->alamat}}</td>
						<td>{{$don->no_telp}}</td>
						<td class="text-center">
							@if($validasi->update == 1)
							<a href="{{Route('donatur.edit',$don->id)}}" class="btn btn-sm btn-primary" title="Edit">
								<i class="la la-edit"></i>
							</a>
							@endif

							@if($validasi->delete == 1)
							<a href="{{Route('donatur.delete',$don->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')" title="Delete">
								<i class="la la-trash"></i>
							</a>
							@endif

							@if($validasi->view == 1)
							<a href="{{Route('donatur.history',$don->id)}}" class="btn btn-sm btn-warning" title="History">
								<i class="la la-eye"></i>
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