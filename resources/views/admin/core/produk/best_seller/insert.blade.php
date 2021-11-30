@extends('component.layouts.master')

@section('button')
<a href="{{Route('produk.best_seller')}}" class="btn btn-info">
	<i class="flaticon-reply"></i>
	<span>Best Seller</span>
</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h4><i class="flaticon-plus"></i> {{ Helper::baseLabelPage() }}</h4>
	</div>
	<div class="card-body">
		<form action="{{Route('produk.best_seller.store')}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<label>Best Seller</label>
					<select class="form-control" name="best_seller" required="">
						<?php foreach ($produk as $key => $value) { ?>
							<option value="{{ $value->id }}">{{ $value->getProdukLanguage->judul }}</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- <label>Icon</label><br>
					<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar" style="width: 100%;">
						<div class="kt-avatar__holder" style="width: 100%; background-image: url('{{ asset('assets/admin/assets/media/icons/')  }}/{{$value->icon}}')"></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input type="file" name="icon" id="icon" required="">
						</label>
						<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
							<i class="fa fa-times"></i>
						</span>
					</div> -->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<button type="submit" class="btn btn-success" style="margin-top: 5px; float: right;">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>	
@endsection