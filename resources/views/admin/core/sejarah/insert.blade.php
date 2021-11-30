@extends('component.layouts.master')

@section('button')
	<a href="{{Route('sejarah.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-body">
		<form action="{{Route('sejarah.store')}}" method="POST" id="form_menu" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<label>Tahun</label>
					<input type="text" name="tahun" class="form-control">
				</div>
			</div>
			<hr>
			<input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
			<input type="hidden" name="trigger" id="hasil_all_id">
			<hr>
			@foreach($language as $key => $lang)
			<div class="row" id="field[<?=$key?>]">
				<div class="col-md-12">
					<center><h3>{{$lang->judul_language}}</h3></center>
					<input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
				</div>
				<div class="col-md-12">
					<label for="">Sejarah</label>
					<textarea id="content[<?=$key?>]" name="sejarah[]" cols="30" rows="10" class="summernote" id="kt_summernote_1"></textarea>
				</div>
			</div>
			<hr>
			@endforeach
			<div class="row">
				<div class="col-lg-12"><br>
					<button type="submit" class="btn btn-info" id="simpan">Simpan</button>
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