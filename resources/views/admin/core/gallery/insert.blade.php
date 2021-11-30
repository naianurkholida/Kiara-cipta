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
		<form action="{{Route('gallery.store')}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<label>Kategori Gallery</label>
					<select class="form-control" name="kategori_produk" required="">
						<option value="" selected="" disabled="">- Kategori -</option>
						@foreach($category as $key => $val)
						<option value="{{$val->id}}">{{$val->category}}</option>
						@endforeach
					</select>
				</div>

				<div class="col-lg-6" style="margin-top: 10px">
					<label>Type</label>
					<label class="kt-option">
						<span class="kt-option__control">
							<span class="kt-radio">
								<input type="radio" name="option" value="image" checked onclick="changeType('image')">
								<span></span>
							</span>
						</span>
						<span class="kt-option__label">
							<span class="kt-option__head">
								<span class="kt-option__title">
									Image
								</span>
								<span class="kt-option__focus">
									jpg, png, jpeg.
								</span>
							</span>
							<span class="kt-option__body">
								Select to add the image to the gallery. This type is the default type that is set by the system
							</span>
						</span>
					</label>
				</div>
				<div class="col-lg-6" style="margin-top: 10px">
					<label>&nbsp;</label>
					<label class="kt-option">
						<span class="kt-option__control">
							<span class="kt-radio">
								<input type="radio" name="option" value="video" onclick="changeType('video')">
								<span></span>
							</span>
						</span>
						<span class="kt-option__label">
							<span class="kt-option__head">
								<span class="kt-option__title">
									Video
								</span>
								<span class="kt-option__focus">
									link
								</span>
							</span>
							<span class="kt-option__body">
								Select to add the video to the gallery. the system will change the type to image if the link is not filled.
							</span>
						</span>
					</label>
				</div>

				<div class="col-lg-12" id="image">
					<label>Gambar</label><br>
					<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1" style="width: 100%; height: 300px;">
						<div class="kt-avatar__holder" style="width: 100%; height:300px; background-image: url({{ asset('public/image/default/placeholder.png') }})"></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input type="file" name="image" accept=".png, .jpg, .jpeg">
						</label>
						<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>

				<div class="col-lg-12" id="link">
					<div class="form-group">
						<label for="document">Link</label>
						<input type="text" class="form-control" placeholde="https://www.youtube.com/embed/....." name="link" required="">
					</div>
				</div>
			</div>

			<br>

			<div class="kt-portlet__foot">
				<div class="kt-form__actions">
					<button type="button" class="btn btn-info" onclick="simpan()">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">

	function simpan() {
		$('#form_menu').submit();
	}

	function cek_bahasa(){
		var trigger = $("#all_id:checked").length
		if (trigger > 0) {
			$("#hasil_all_id").val(1)
		}else{
			$("#hasil_all_id").val(0)
		}
	}
</script>
@endsection