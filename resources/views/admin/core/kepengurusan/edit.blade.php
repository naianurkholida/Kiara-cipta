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
		<form action="{{Route('kepengurusan.update', $kepengurusan->id)}}" method="POST" id="form_menu" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="{{$kepengurusan->nama}}" id="nama">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<label>Jabatan</label>
					<input type="text" name="jabatan" class="form-control" value="{{$kepengurusan->jabatan}}" id="jabatan">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<label>Foto</label><br>
					<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
						<div class="kt-avatar__holder" style="width: 300px; height:300px; background-image: url({{asset('admin/assets/media/foto-kepengurusan/300')}}/{{$kepengurusan->foto}});"></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input type="file" name="foto" accept=".png, .jpg, .jpeg" id="foto">
						</label>
						<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
							<i class="fa fa-times"></i>
						</span>
					</div>
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
<script src="{{asset('admin/assets/js/demo5/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>
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