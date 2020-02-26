@extends('component.layouts.master')

@section('button')
	<a href="{{Route('user.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
@if($pesan != null)
<div class="alert alert-dark" role="alert">
	<div class="alert-text">{{$pesan}}</div>
</div>
@endif
<div class="card">
	<div class="card-header">
		<h4><i class="flaticon-plus"></i> {{ Helper::baseLabelPage() }}</h4>
	</div>
	<div class="card-body">
		<form action="{{Route('user.store')}}" method="POST" id="form_menu" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-6">
					<label>Username</label>
					<input type="text" name="username" class="form-control" id="username">
				</div>
				<div class="col-lg-6">
					<label>Password</label>
					<input type="password" name="password" class="form-control" id="password"><br>
				</div>
				<div class="col-lg-6">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" id="nama">
				</div>
				<div class="col-lg-6">
					<label>Email</label>
					<input type="text" name="email" class="form-control" id="email"><br>
				</div>
				<div class="col-lg-6">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" id="alamat">
				</div>
				<div class="col-lg-6">
					<label>Role</label>
					<select class="form-control" name="role" id="role">
						<option selected="" disabled="" value="">Pilih Role User</option>
						@foreach($role as $role)
						<option value="{{$role->id}}">{{$role->code}}</option>
						@endforeach
					</select><br>
				</div>
				<div class="col-lg-12">
					<label>Foto</label><br>
					<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
						<div class="kt-avatar__holder" style="background-image: url('')"></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input type="file" name="foto" id="foto">
						</label>
						<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				<div class="col-lg-12"><br>
					<button type="button" class="btn btn-info" onclick="simpan()">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>
<script type="text/javascript">
	function simpan() {
		var validation = 0;
        var validationText = "";

        if($("#username").val()==''){ validation++; validationText = validationText + "Username tidak boleh kosong\n"; }
        if($("#password").val()==''){ validation++; validationText = validationText + "Password tidak boleh kosong\n"; }
        if($("#nama").val()==''){ validation++; validationText = validationText + "Nama tidak boleh kosong\n"; }
        if($("#email").val()==''){ validation++; validationText = validationText + "Email tidak boleh kosong\n"; }
        if($("#alamat").val()==''){ validation++; validationText = validationText + "Alamat tidak boleh kosong\n"; }
        if($("#role").val()==''){ validation++; validationText = validationText + "Role tidak boleh kosong\n"; }
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