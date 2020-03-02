@extends('component.layouts.master')

@section('content')
<div class="card">
	<div class="card-header">
		<h4>Settings</h4>
	</div>
	<div class="card-body">
		<form action="{{Route('setup.store_settings')}}" method="POST" id="form_menu" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-4">
					<label>Content Profile</label>
					<select class="form-control" name="content_profile">
						<option value="" selected="" disabled="">- Content profile -</option>
						@foreach($pages as $val)
						<?php 
						if($content_profile != null){
							if($content_profile->key_page == $val->key_page){
								$selected = 'selected';
							}else{
								$selected = '';
							}
						}else{
							$selected = '';
						}
						?>
						<option value="{{$val->key_page}}" <?=$selected?> >{{$val->judul_page}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4">
					<label>Video Home</label>
					<input type="text" name="video" class="form-control" placeholder="Link Youtube" value="{{$youtube->value}}">
				</div>
				<div class="col-lg-4">
					<label>Ketentuan Privacy</label>
					<select class="form-control" name="ketentuan_privacy">
					<option value="" selected="" disabled="">- Ketentuan Privacy -</option>
						@foreach($pages as $val)
						<?php
						if($content_privacy != null){
							if($content_privacy->key_page == $val->key_page){
								$selected = 'selected';
							}else{
								$selected = '';
							}
						}else{
							$selected = '';
						}
						?>
						<option value="{{$val->key_page}}" <?=$selected?> >{{$val->judul_page}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				
				<div class="col-lg-4">
					<label>Syarat Ketentuan</label>
					<select class="form-control" name="syarat_ketentuan">
					<option value="" selected="" disabled="">- Syarat Ketentuan -</option>
						@foreach($pages as $val)
						<?php
						if($content_syarat != null){
							if($content_syarat->key_page == $val->key_page){
								$selected = 'selected';
							}else{
								$selected = '';
							}
						}else{
							$selected = '';
						}
						?>
						<option value="{{$val->key_page}}" <?=$selected?> >{{$val->judul_page}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4">
					<label>Kantor Cabang</label>
					<select class="form-control" name="kantor_cabang">
					<option value="" selected="" disabled="">- Kantor Cabang -</option>
						@foreach($pages as $val)
						<?php
						if($content_kantor != null){
							if($content_kantor->key_page == $val->key_page){
								$selected = 'selected';
							}else{
								$selected = '';
							}
						}else{
							$selected = '';
						}
						?>
						<option value="{{$val->key_page}}" <?=$selected?> >{{$val->judul_page}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4">
					<label>Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email" value="{{$email->value}}">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-4">
					<label>Facebook</label>
					<input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{$facebook->value}}">
				</div>
				<div class="col-lg-4">
					<label>Instagram</label>
					<input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{$instagram->value}}">
				</div>
				<div class="col-lg-4">
					<label>Twitter</label>
					<input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{$twitter->value}}">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<label>Kontak</label>
					<select class="form-control" name="kontak">
					@foreach($pages as $val)
						<?php
						if($content_kontak != null){
							if($content_kontak->key_page == $val->key_page){
								$selected = 'selected';
							}else{
								$selected = '';
							}
						}else{
							$selected = '';
						}
						?>
						<option value="{{$val->key_page}}" <?=$selected?> >{{$val->judul_page}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<label>Whatsapp</label>
					<textarea class="form-control" name="whatsapp">{{$whatsapp->value}}</textarea>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12"><br>
					<button type="submit" class="btn btn-info pull-right">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>
<script type="text/javascript">

</script>
@endsection