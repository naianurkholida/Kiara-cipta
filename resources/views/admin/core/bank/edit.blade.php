@extends('component.layouts.master')

@section('button')
	<a href="{{Route('bank.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')

<script>
	function cek_simpan(){
		var validation = 0;
		var validationText = "";

		if($("#kode_bank").val()==''){ validation++; validationText = validationText + "Kode Bank tidak boleh kosong\n"; }
		if($("#nama_bank").val()==''){ validation++; validationText = validationText + "Nama Bank tidak boleh kosong\n"; }
		if($("#atas_nama").val()==''){ validation++; validationText = validationText + "Atas Nama tidak boleh kosong\n"; }
		if($("#no_rekening").val()==''){ validation++; validationText = validationText + "No Rekening tidak boleh kosong\n"; }
		if($("#alamat").val()==''){ validation++; validationText = validationText + "Alamat tidak boleh kosong\n"; }

		if(validation>0){
			alert(validationText);
		}else{
			alert('Berhasil Menyimpan')
			$('#form').submit();
		}
	}
</script>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h3>{{ Helper::baseLabelPage() }}</h3>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<form action="{{Route('bank.update',$bank->id)}}" method="post" id="form">
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-6">
						<label for="">Kode Bank</label>
						<input type="text" class="form-control" name="kode_bank" id="kode_bank" value="{{$bank->kode_bank}}">
					</div>

					<div class="col-md-6">
						<label>Nama Bank</label>
						<input type="text" name="nama_bank" id="nama_bank" class="form-control" value="{{$bank->nama_bank}}">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<label>Atas Nama</label>
						<input type="text" name="atas_nama" id="atas_nama" class="form-control" value="{{$bank->atas_nama}}">
					</div>
					<div class="col-md-6">
						<label>No Rekening</label>
						<input type="number" name="no_rekening" id="no_rekening" class="form-control" value="{{$bank->no_rekening}}">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" id="alamat">{{$bank->alamat}}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12"><br>
						<button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection