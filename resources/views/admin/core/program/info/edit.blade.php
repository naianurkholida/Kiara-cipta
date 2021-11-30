@extends('component.layouts.master')

@section('button')
	<a href="{{Route('program.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h4><i class="flaticon-plus"></i> Program</h4>
	</div>
	<div class="card-body">
		<form action="{{Route('program.update_info',$info->id)}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-12">
					<input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
					<input type="hidden" name="trigger" id="hasil_all_id">
					<input type="hidden" name="id_program" value="{{$info->program_id}}">
					<hr>
				</div>
			</div>
			<?php $found = 0; $judul = ""; $content; $idl = "";?>
			@foreach($language as $key => $lang)
			@foreach($infolanguage as $key2 => $pl)
			@if($lang->id == $pl->id_language)
			<?php 
			$found   = 1; 
			$judul   = $pl->judul; 
			$content = $pl->content;
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
					<input type="text" id="judul[<?=$key?>]" name="judul[]" class="form-control" value="{{$judul}}">
				</div>
				<div class="col-md-12">
					<label for="">Content</label>
					<textarea id="content[<?=$key?>]" name="content[]" class="summernote" id="kt_summernote_1">{{$content}}</textarea>
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
					<input type="text" id="judul[<?=$key?>]" name="judul[]" class="form-control">
				</div>
				<div class="col-md-12">
					<label for="">Content</label>
					<textarea id="content[<?=$key?>]" name="content[]" class="summernote" id="kt_summernote_1"></textarea>
				</div>
			</div>
			@endif
			@endforeach
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-info">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">

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