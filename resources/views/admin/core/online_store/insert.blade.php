@extends('component.layouts.master')

@section('button')
	<a href="{{Route('produk.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h4><i class="flaticon-plus"></i> {{ Helper::baseLabelPage() }}</h4>
	</div>
	<div class="card-body">
	<form action="{{Route('online_store.store')}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-6">
					<label>Name</label>
					<input type="text" id="os_name" name="os_name" class="form-control">
				</div>
				<div class="col-lg-6">
					<label>Link</label>
					<input type="text" id="os_link" name="os_link" class="form-control">
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label for="document">Icon</label>
						<!-- <div class="needsclick dropzone" id="document-dropzone"></div> -->
						<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar" style="width: 100%;">
							<div class="kt-avatar__holder" style="width: 100%; background-image: url('')"></div>
							<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
								<i class="fa fa-pen"></i>
								<input type="file" name="image" id="image" required="">
							</label>
							<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
								<i class="fa fa-times"></i>
							</span>
						</div>
					</div>
				</div>
			</div>

			<hr>
			<button type="button" class="btn btn-info" onclick="simpan()">Simpan</button>
		</form>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>	
<script type="text/javascript">

	function simpan() {
		$('#form_menu').submit();
	}
</script>
@endsection