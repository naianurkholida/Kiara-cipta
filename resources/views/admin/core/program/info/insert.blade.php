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
		<h4><i class="flaticon-plus"></i> {{ Helper::baseLabelPage() }}</h4>
	</div>
	<div class="card-body">
		<form action="{{Route('program.store_info')}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-12">
					<input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
					<input type="hidden" name="trigger" id="hasil_all_id">
					<input type="hidden" name="id_program" value="{{$id}}">
					<hr>
				</div>
			</div>
			@foreach($language as $key => $lang)
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
					<label for="">content</label>
					<textarea id="content[<?=$key?>]" name="content[]" class="summernote" id="kt_summernote_1"></textarea>
				</div>
			</div>
			<hr>
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