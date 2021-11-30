@extends('component.layouts.master')

@section('button')
	<a href="{{Route('user.insert')}}" class="btn btn-info">
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
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($user as $user)
					<tr>
						<td class="text-center">{{$no}}</td>
						<td data-field="AgentName" class="kt-datatable__cell">
							<span style="width: 200px;">
								<div class="kt-user-card-v2">								
									<div class="kt-user-card-v2__pic">									
										<img src="{{ $user->getFirstMediaUrl('user') }}">						
									</div>								
									<div class="kt-user-card-v2__details">									
										<label class="kt-user-card-v2__name">{{$user->name}}</label>
									</div>
								</div>
							</span>
						</td>
						<td>{{$user->email}}</td>
						<td>{{$user->alamat}}</td>
						<td>{{$user->role_user}}</td>
						<td class="text-center">
							@if($validasi->update == 1)
							<a href="{{Route('user.edit',$user->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							@endif

							@if($validasi->delete == 1)
							<a href="{{Route('user.delete',$user->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
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