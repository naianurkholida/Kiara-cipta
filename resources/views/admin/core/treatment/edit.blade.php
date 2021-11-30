@extends('component.layouts.master')

@section('button')
<a href="{{Route('treatment.index')}}" class="btn btn-info">
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
		<form action="{{Route('treatment.update', $treatment->id)}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<label>Kategori treatment</label>
					<select class="form-control" name="kategori_treatment" required="">
						<option value="" selected="" disabled="">- Kategori -</option>
						@foreach($category as $key => $val)
						<option value="{{$val->id}}" {{ $treatment->id_category == $val->id ? 'selected' : '' }}>{{$val->category}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label for="document">Image</label>
						<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar" style="width: 100%;">
							<div class="kt-avatar__holder" style="width: 100%; background-image: url('{{ asset('assets/admin/assets/media/derma_treatment') }}/{{$treatment->image}}')"></div>
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
			<input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
			<input type="hidden" name="trigger" id="hasil_all_id">
			<hr>
			<?php $found = 0; $judul = ""; $content; $idl = "";?>
			@foreach($language as $key => $lang)
			@foreach($treatment_language as $key2 => $pl)
			@if($lang->id == $pl->id_language)
			<?php 
			$found   = 1; 
			$judul   = $pl->judul; 
			$resume  = $pl->resume;
			$content = $pl->deskripsi;
			$idl     = $pl->id;
			?>
			@break
			@endif
			@endforeach
			@if($found == 1)
			<div class="row" id="field[<?=$key?>]">
				<div class="col-md-12">
					<center><h3>{{$lang->judul_language}}</h3></center>
					<input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
					<input type="hidden" name="idl[]" value="{{$idl}}">
				</div>
				<div class="col-md-12">
					<label for="">Title</label>
					<input type="text" id="judul[<?=$key?>]" name="judul[]" class="form-control" value="{{$judul}}" required="">
				</div>
				<div class="col-md-12">
					<label>Resume</label>
					<textarea class="form-control" id="resume[<?=$key?>]" name="resume[]" rows="5">{{ $resume }}</textarea>
				</div>
				<div class="col-md-12">
					<label for="">content</label>
					<textarea id="content[<?=$key?>]" name="deskripsi[]" id="" class="summernote" id="kt_summernote_1" required="">{{$content}}</textarea>
				</div>
			</div>
			<hr>
			@else
			<div class="row" id="field[<?=$key?>]">
				<div class="col-md-12">
					<center><h3>{{$lang->judul_language}}</h3></center>
					<input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
				</div>
				<div class="col-md-12">
					<label for="">Title</label>
					<input type="text" id="judul[<?=$key?>]" name="judul[]" class="form-control" required="">
				</div>
				<div class="col-md-12">
					<label>Resume</label>
					<textarea class="form-control" id="resume[<?=$key?>]" name="resume[]" rows="5"></textarea>
				</div>
				<div class="col-md-12">
					<label for="">content</label>
					<textarea id="content[<?=$key?>]" name="deskripsi[]" id="" class="summernote" id="kt_summernote_1" required=""></textarea>
				</div>
			</div>
			@endif
			@endforeach
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