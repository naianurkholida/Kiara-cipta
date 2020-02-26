@extends('component.layouts.master')

@section('button')
	<a href="{{Route('donatur.index')}}" class="btn btn-info">
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
		<form action="{{Route('donatur.update', $donatur->id)}}" method="POST" id="form_menu" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-6">
					<label>Donaturname</label>
					<input type="text" name="username" class="form-control" value="{{$donatur->username}}" id="username">
				</div>
				<div class="col-lg-6">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="" placeholder="Password" id="password">
					<span class="m-form__help" style="color: red; font-size: 10px;">Kosongkan Jika Anda Tidak Akan Mengubahnya !</span><br>
				</div>
				<div class="col-lg-6">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="{{$donatur->name}}" id="nama">
				</div>
				<div class="col-lg-6">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="{{$donatur->email}}" id="email"><br>
				</div>
				<div class="col-lg-6">
					<label>No Telepon</label>
					<input type="number" name="no_telp" class="form-control" value="{{$donatur->no_telp}}" id="no_telp"><br>
				</div>
				<div class="col-lg-6">
					<label>Role</label>
					<select class="form-control" name="role" id="role">
						<option selected="" disabled=""> - Role - </option>
						@foreach($role as $role)
						<?php if($donatur->role_id == $role->id){ 
							$selected = 'selected="selected"'; 
						}else{ 
							$selected = ''; 
						} 
						?>
						<option value="{{$role->id}}" <?= $selected ?> >{{$role->name}}</option>
						@endforeach
					</select><br>
				</div>
				<div class="col-lg-12">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" value="{{$donatur->alamat}}" id="alamat">
				</div>
				<div class="col-lg-12">
					<label>Foto</label><br>
					<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
						<div class="kt-avatar__holder" style="background-image: url({{asset('admin/assets/media/foto-users/300')}}/{{$donatur->foto}});"></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input type="file" name="foto" accept=".png, .jpg, .jpeg">
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
<script src="{{asset('admin/assets/js/demo5/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>
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