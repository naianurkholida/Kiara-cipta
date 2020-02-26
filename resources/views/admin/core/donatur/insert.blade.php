@extends('component.layouts.master')

@section('button')
	<a href="{{Route('donatur.index')}}" class="btn btn-info">
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
		<form action="{{Route('donatur.store')}}" method="POST" id="form_menu" enctype="multipart/form-data">
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
				<div class="col-lg-12"><hr></div>
				<div class="col-lg-6">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" id="nama">
				</div>
				<div class="col-lg-6">
					<label>Email</label>
					<input type="text" name="email" class="form-control" id="email"><br>
				</div>
				<div class="col-lg-6">
					<label>No Telepon</label>
					<input type="number" name="no_telp" class="form-control" id="no_telp"><br>
				</div>
				<div class="col-lg-6">
					<label>Role</label>
					<select class="form-control" name="role" id="role">
						<option selected="" disabled="">Pilih Role User</option>
						@foreach($role as $role)
						<option value="{{$role->id}}">{{$role->name}}</option>
						@endforeach
					</select><br>
				</div>
				<div class="col-lg-12">
					<label>Foto</label><br>
					<input type="file" name="foto" class="form-control" id="foto">
				</div>
				<div class="col-lg-12">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control" id="alamat"></textarea>
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
        if($("#no_telp").val()==''){ validation++; validationText = validationText + "No Telepon tidak boleh kosong\n"; }
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