@extends('component.layouts.master')

@section('button')
	<a href="{{Route('produk.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>Produk</span>
	</a>

	<a href="{{Route('produk.spec.insert', $id_produk)}}" class="btn btn-info">
		<i class="flaticon-plus"></i>
		<span>Spesifikasi</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3>Spesifikasi {{ $produk->getProdukLanguage->judul }}</h3>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<table class="table table-striped table-bordered table-hover" id="table-responsive">
				<thead class="m-datatable__head">
					<tr class="m-datatable__row text-center">
						<th>No</th>
						<th>Icon Light</th>
						<th>Icon Dark</th>
						<th>Specification</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $no=1?>
					@foreach($data as $row)
					<tr>
						<td><center>{{$no}}</center></td>
						<td class="list-icon">
							<center>
								<img src="{{ asset($img_path . '/' . $row->icon_light) }}" style="width: 50px; height: 50px; border: none;">
							</center>
						</td>
						<td>
							<center>
								<img src="{{ asset($img_path . '/' . $row->icon_dark) }}" style="width: 50px; height: 50px; border: none;">
							</center>
						</td>
						<td>{{ $row->specification }}</td>
						<td>{{ $row->is_active == 1 ? "Active" : "Inactive" }}</td>
						<td class="text-center">
							<a href="{{Route('produk.spec.edit',$row->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							<a href="{{Route('produk.spec.delete',$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
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
<script>
	$(".list-icon").hover(function(){
		$(".list-icon").css("background-color","rgba(0, 128, 128, 0.521)")
	}, function(){
		$(".list-icon").css("background-color","")
	});
	// background-color: rgba(0, 128, 128, 0.521);
</script>
@endsection