@extends('component.layouts.master')

@section('button')
	<a href="{{Route('kepengurusan.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h4><i class="flaticon-plus"></i>{{ Helper::baseLabelPage() }}</h4>
	</div>
	<div class="card-body">
		<form action="{{Route('kepengurusan.store')}}" method="POST" id="form_menu" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" id="nama">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<label>Jabatan</label>
					<input type="text" name="jabatan" class="form-control" id="jabatan">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<label>Foto</label>
					<input type="file" name="foto" class="form-control" id="foto">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12"><br>
					<button type="button" class="btn btn-info" onclick="cek()">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	function cek() {
		var validation = 0;
        var validationText = "";

        if($("#nama").val()==''){ validation++; validationText = validationText + "Nama tidak boleh kosong\n"; }
        if($("#jabatan").val()==''){ validation++; validationText = validationText + "Jabatan tidak boleh kosong\n"; }
        if($("#foto").val()==''){ validation++; validationText = validationText + "Foto tidak boleh kosong\n"; }

        if(validation>0){
        	alert(validationText);
        }else{
        	alert('Berhasil Menyimpan')
        	$('#form_menu').submit();
        }
	}
</script>
@endsection