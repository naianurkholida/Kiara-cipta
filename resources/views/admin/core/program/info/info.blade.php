@extends('component.layouts.master')

@section('button')
	<a href="{{Route('program.insert_info',$id)}}" class="btn btn-info">
		<i class="flaticon-plus"></i>
		<span>Info Terbaru</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3>List Info Terbaru</h3>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<table class="table table-striped table-bordered table-hover" id="table-responsive">
				<thead class="m-datatable__head">
					<tr class="m-datatable__row text-center">
						<th>No</th>
						<th>Judul</th>
						<th>Konten</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no =1;?>
					@foreach($info as $info)
					<tr>
						<td>{{$no}}</td>
						<td>{{$info->judul}}</td>
						<td>{{strip_tags($info->content)}}</td>
						<td class="text-center">
							<a href="{{Route('program.edit_info',$info->info_terbaru_id)}}" class="btn btn-sm btn-primary" title="Edit">
								<i class="la la-edit"></i>
							</a>
							<a href="{{Route('program.delete_info',$info->info_terbaru_id)}}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
								<i class="la la-trash"></i>
							</a>
						</td>
					</tr>
					<?php $no++ ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$(document().ready(function(){
		location.reload();
	});
</script>
@endsection