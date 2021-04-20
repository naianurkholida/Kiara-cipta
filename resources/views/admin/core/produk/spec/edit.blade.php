@extends('component.layouts.master')

@section('button')
	<a href="{{Route('produk.spec.index',$data->id_produk)}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>Spesifikasi</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h4><i class="flaticon-plus"></i> Spesifikasi {{ $produk->getProdukLanguage->judul }}</h4>
	</div>
	<div class="card-body">
	    <form action="{{Route('produk.spec.update',$data->id)}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row" id="form_spec">

                <div class="col-sm-4" id="icon_0">
                    <label>Icon</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>
                <div class="col-sm-4" id="spec_0">
                    <label>Specification</label>
                    <input type="text" name="specification" id="specification" class="form-control" value="{{ $data->specification }}">
                </div>
                <div class="col-sm-4" id="status_0">
                    <label>Status</label>
                    <select id="status" name="status" class="form-control" required>
                    @foreach(config("enums.status_active") as $key => $value)
                        @if ($value == $data->is_active)
                        <option value="{{ $value }}" selected>
                        @else
                        <option value="{{ $value }}" >
                        @endif
                        {{ $key }}</option>
                    @endforeach
                    </select>
                </div>
			</div>

			<hr>
			<button type="button" class="btn btn-info" onclick="simpan()">Simpan</button>
		</form>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>	
<script type="text/javascript">
    var detail_index = 1;

	function simpan() {
		$('#form_menu').submit();
	}
</script>
@endsection