@extends('component.layouts.master')

@section('button')
	<a href="{{Route('menu.index')}}" class="btn btn-info">
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
		<form action="{{Route('menu.update', $menu->id)}}" method="POST" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-2">
					<label>Parent ID</label>
					<select class="form-control" name="parent_id" required="">
						<option value="0">Main Menu</option>
						@foreach($menus as $menus)
						<?php 
							$selected = '';
							if ($menu->parent_id == $menus->id) {
								$selected = 'selected="selected"';
							}else{
								$selected = '';
							}
						?>

						<option value="{{$menus->id}}" <?= $selected ?> >{{$menus->label}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-5">
					<label>Label</label>
					<input type="text" name="label" class="form-control" value="{{$menu->label}}" id="label" required="">
				</div>
				<div class="col-lg-5">
					<label>Url</label>
					<input type="text" name="url" class="form-control" value="{{$menu->url}}" id="url" required=""><br>
				</div>
				<div class="col-lg-2">
					<label>Icon</label>
					<input type="text" name="icon" class="form-control" value="{{$menu->icon}}" id="icon" required="">
				</div>
				<div class="col-lg-5">
					<label>Status</label>
					<select class="form-control" name="status" id="status" required="">
						<option value="1" <?php ($menu->status == 1) ? 'selected' : '' ?> >Aktif</option>
						<option value="0" <?php ($menu->status == 0) ? 'selected' : '' ?> >Non Aktif</option>
					</select>
				</div>
				<div class="col-lg-5">
					<label>Order Num</label>
					<input type="text" name="order_num" class="form-control" value="{{$menu->order_num}}" id="order_num" required=""><br>
				</div>
				<div class="col-lg-12">
					<input type="hidden" name="created_by" class="form-control" value="{{session::get('id')}}" id="created_by" readonly="true" required=""><br>
				</div>
				<div class="col-lg-12">
					<button type="button" class="btn btn-info" onclick="simpan()">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	function simpan() {
		var validation = 0;
        var validationText = "";

        if($("#label").val()==''){ validation++; validationText = validationText + "Label tidak boleh kosong\n"; }
        if($("#url").val()==''){ validation++; validationText = validationText + "Url tidak boleh kosong\n"; }

        if(validation>0){
        	alert(validationText);
        }else{
        	alert('Berhasil Menyimpan')
        	$('#form_menu').submit();
        }
	}
</script>
@endsection