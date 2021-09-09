@extends('component.layouts.master')

@section('button')
	<a href="{{Route('slider.produk.insert')}}" class="btn btn-info">
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
						<th>Judul</th>
						<th>Banner</th>
						<th>Seo</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($slider as $slide)
					<tr>
						<td class="text-center">{{$no}}</td>
						<td>{{$slide->descriptionJoin->title}}</td>
						<td class="text-center">
							<a href="{{ asset('assets/admin/assets/media/slider') }}/{{$slide->banner}}" target="blank">{{$slide->banner}}</a>
						</td>
						<td>{{$slide->seo}}</td>
						<td class="text-center">
							<a href="{{Route('slider.produk.edit',$slide->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							<a href="{{Route('slider.produk.delete',$slide->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
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