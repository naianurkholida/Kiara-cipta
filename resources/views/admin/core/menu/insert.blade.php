@extends('component.layouts.master')

@section('button')
	<a href="{{Route('pages.index')}}" class="btn btn-info">
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
		<form action="{{Route('menu.store')}}" method="POST" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-2">
					<label>Parent Menu</label>
					<select class="form-control" name="parent_id" required="">
						<option value="0">Main Menu</option>
						@foreach($menu as $menu)
							<option value="{{$menu->id}}">{{$menu->label}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-5">
					<label>Label</label>
					<input type="text" name="label" class="form-control" id="label" required="">
				</div>
				<div class="col-lg-5">
					<label>Url</label>
					<input type="text" name="url" class="form-control" id="url" required=""><br>
				</div>
				<div class="col-lg-2">
					<label>Icon</label>
					<input type="text" name="icon" class="form-control" id="icon" required="">
				</div>
				<div class="col-lg-5">
					<label>Status</label>
					<select class="form-control" name="status" id="status" required="">
						<option value="1">Aktif</option>
						<option value="0">Non Aktif</option>
					</select>
				</div>
				<div class="col-lg-5">
					<label>Order Num</label>
					<input type="text" name="order_num" class="form-control" id="order_num" required=""><br>
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