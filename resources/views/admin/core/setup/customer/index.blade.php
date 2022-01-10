@extends('component.layouts.master')

@section('button')
	<a href="{{Route('dashboard_customer.insert')}}" class="btn btn-info">
		<i class="flaticon-plus"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h4>Dashboard Customer</h4>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<table class="table table-striped table-bordered table-hover" id="table-responsive">
				<thead class="m-datatable__head">
					<tr class="m-datatable__row text-center">
						<th>No</th>
						<th>Title</th>
						<th>Description</th>
						<th>Type</th>
						<th>Icon</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no=1?>
					@foreach($data as $val)
					<tr>
						<td>{{$no}}</td>
						<td>{{$val->name}}</td>
						<td>{{$val->description}}</td>
						<td class="text-center">
							@if($val->jenis == 1)
								<span class="badge badge-success">Benefit</span>
							@elseif($val->jenis == 2)
								<span class="badge badge-info">Membership</span>
							@elseif($val->jenis == 3)
								<span class="badge badge-warning">Hot To Get Point</span>
							@else
								<span class="badge badge-danger">Icon Menu</span>
							@endif

						</td>
						<td class="text-center">
							<img src="{{ asset('assets/admin/assets/media/img') }}/{{$val->icon}}" style="width: 50px;">
						</td>
						<td class="text-center">
							<a href="{{Route('dashboard_customer.edit',$val->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							<a href="{{Route('dashboard_customer.delete',$val->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
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
<script src="{{asset('assets/admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>	
<script type="text/javascript">

</script>
@endsection