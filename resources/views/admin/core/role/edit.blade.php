@extends('component.layouts.master')

@section('button')
	<a href="{{Route('role.index')}}" class="btn btn-info">
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
		<form action="{{Route('role.update', $role->id)}}" method="POST" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-3">
					<label>Code</label>
					<input type="text" name="code" class="form-control" id="code" value="{{$role->code}}">
				</div>
				<div class="col-lg-3">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" id="nama" value="{{$role->name}}">
				</div>
				<div class="col-lg-6">
					<label>Description</label>
					<input type="text" name="description" class="form-control" id="description" value="{{$role->description}}"><br>
				</div>
				<div class="col-lg-3">
					<!-- <label>Created By</label> -->
					<input type="hidden" name="created_by" class="form-control" value="{{session::get('id')}}" id="created_by" readonly="true"><br>
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

        if($("#code").val()==''){ validation++; validationText = validationText + "Code tidak boleh kosong\n"; }
        if($("#nama").val()==''){ validation++; validationText = validationText + "Nama tidak boleh kosong\n"; }
        if($("#description").val()==''){ validation++; validationText = validationText + "Description tidak boleh kosong\n"; }

        if(validation>0){
        	alert(validationText);
        }else{
        	alert('Berhasil Menyimpan')
        	$('#form_menu').submit();
        }
	}
</script>
@endsection