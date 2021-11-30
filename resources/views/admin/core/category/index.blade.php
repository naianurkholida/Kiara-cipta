@extends('component.layouts.master')

@section('button')
	<a href="{{Route('category.insert')}}" class="btn btn-info">
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
                        <td>No</td>
						<td>Kategori</td>
                        <td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($categories as $category)
					<tr>
						<td>{{$no}}</td>
                        <td>{{$category->category}}</td>
                        <td>
                        	@if($validasi->update == 1)
                            <a href="{{Route('category.edit',$category->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							@endif

							@if($validasi->view == 1)
                            <a href="{{Route('category.detail',$category->id)}}" class="btn btn-sm btn-info">
								<i class="la la-eye"></i>
							</a>
							@endif

							@if($validasi->delete == 1)
							<a href="{{Route('category.delete',$category->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
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