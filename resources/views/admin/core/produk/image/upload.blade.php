@extends('component.layouts.master')

@section('button')
<a href="{{Route('produk.index')}}" class="btn btn-info">
	<i class="flaticon-reply"></i>
	<span>{{ Helper::baseLabelPage() }}</span>
</a>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4><i class="flaticon-plus"></i> Image {{ Helper::baseLabelPage() }}</h4>
			</div>
			<div class="card-body">
				<form action="{{Route('produk.upload_image.store', $id_produk)}}" method="POST" enctype="multipart/form-data" id="form_menu">
					{{csrf_field()}}
					<div class="row">
						<div class="col-lg-12">
							<div class="input-group control-group increment" >
								<input type="file" name="filename[]" class="form-control">
								<div class="input-group-btn"> 
									<button class="btn btn-success" type="button">Add</button>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="clone hide">
								<div class="control-group input-group" style="margin-top:10px">
									<input type="file" name="filename[]" class="form-control">
									<div class="input-group-btn"> 
										<button class="btn btn-danger" type="button">Remove</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<button type="submit" class="btn btn-info pull-right" style="margin-top: 10px;">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4><i class="flaticon-plus"></i> List Image {{ Helper::baseLabelPage() }}</h4>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Image</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $key => $item) { ?>
							<tr>
								<td>{{ $key+1 }}</td>
								<td>
									<a href="{{ asset('assets/admin/assets/media/derma_produk') }}/{{ $item->image }}" target="_blank">{{ $item->image }}</a>
								</td>
								<td align="center">
									<a href="{{ Route('produk.upload_image.delete', $item->id) }}" class="btn btn-sm btn-danger" title="Hapus">
										<i class="la la-trash"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>	
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-success").click(function(){ 
			var html = $(".clone").html();
			$(".increment").after(html);
		});

		$("body").on("click",".btn-danger",function(){ 
			$(this).parents(".control-group").remove();
		});
	});
</script>
@endsection