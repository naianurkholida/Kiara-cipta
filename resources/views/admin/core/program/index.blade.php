@extends('component.layouts.master')

@section('button')
	<a href="{{Route('program.insert')}}" class="btn btn-info">
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
						<th>Penggagas</th>
						<th>Tanggal</th>
						<th>Judul</th>
						<th>Kategory</th>
						<th>Dana Terkumpul</th>
						<th>Foto</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no= 1;?>
					@foreach($program as $prog)
					<tr>
						<td>{{$no}}</td>
						<td>{{$prog->penggagas}}</td>
						<?php if($prog->tanggal != null){ ?>
							<td>{{$prog->tanggal}}</td>
						<?php } else { ?>
							<td><label>Tanpa Batas Waktu</label></td>
						<?php } ?>
						<td>{{$prog->judul}}</td>
						<td>{{$prog->category}}</td>
						<td>{{'Rp. '.Number_format($prog->total)}}</td>
						<td class="text-center"><img style="width: 100%;" src="{{asset('admin/assets/media/foto-program/245')}}/{{$prog->foto}}"></td>
						<td class="text-center">
							@if($validasi->update == 1)
							<a href="{{Route('program.edit',$prog->id)}}" class="btn btn-sm btn-primary" title="Edit">
								<i class="la la-edit"></i>
							</a>
							@endif

							@if($validasi->delete == 1)
							<a href="{{Route('program.delete',$prog->id)}}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
								<i class="la la-trash"></i>
							</a>
							@endif
							<a href="{{Route('program.info',$prog->id)}}" class="btn btn-sm btn-warning" title="Info Terbaru">
								<i class="la la-info-circle"></i>
							</a>
							<a href="{{Route('program.donatur',$prog->id)}}" class="btn btn-sm btn-info" title="List Donatur">
								<i class="la la-users"></i>
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