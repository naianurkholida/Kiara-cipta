@extends('component.layouts.master')

@section('button')
	<a href="{{Route('produk.spec.index',$id_produk)}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>Spesifikasi</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h4><i class="flaticon-plus"></i> Spesifikasi {{ $produk->getProdukLanguage->judul }}</h4>

        <div class="col-sm-12">
            <a href="#" class="btn btn-info" onclick="add_spec()" style="float: right; margin-top:-30px;">
                <i class="flaticon-plus"></i>
                <span>Add</span>
            </a>
        </div>
	</div>
	<div class="card-body">
	    <form action="{{Route('produk.spec.store',$id_produk)}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row" id="form_spec">

                <div class="col-sm-3" id="icon_0">
                    <label>Icon</label>
                    <input type="file" name="image[]" id="image[]" class="form-control" accept="image/*">
                </div>
                <div class="col-sm-4" id="spec_0">
                    <label>Specification</label>
                    <input type="text" name="specification[]" id="specification[]" class="form-control">
                </div>
                <div class="col-sm-4" id="status_0">
                    <label>Status</label>
                    <select id="status[]" name="status[]" class="form-control" required>
                    @foreach(config("enums.status_active") as $key => $value)
                        <option value="{{ $value }}">{{ $key }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-sm-1" id="action_0">
                    <label style="color: white;">Action</label>
                    <a href="#" class="btn btn-danger" onclick="remove_spec(0)">
                        <i class="flaticon-close"></i>
                    </a>
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

    function add_spec() {
        $('#form_spec').append(''+
            '<div class="col-sm-3" id="icon_'+detail_index+'">'+
                '<label>Icon</label>'+
                '<input type="file" name="image[]" id="image[]" class="form-control" accept="image/*">'+
            '</div>'+
            '<div class="col-sm-4" id="spec_'+detail_index+'">'+
                '<label>Specification</label>'+
                '<input type="text" name="specification[]" id="specification[]" class="form-control">'+
            '</div>'+
            '<div class="col-sm-4" id="status_'+detail_index+'">'+
                '<label>Status</label>'+
                '<select id="status[]" name="status[]" class="form-control" required>'+
                '@foreach(config("enums.status_active") as $key => $value)'+
                    '<option value="{{ $value }}">{{ $key }}</option>'+
                '@endforeach'+
                '</select>'+
            '</div>'+
            '<div class="col-sm-1" id="action_'+detail_index+'">'+
                '<label style="color: white;">Action</label>'+
                '<a href="#" class="btn btn-danger" onclick="remove_spec('+detail_index+')">'+
                    '<i class="flaticon-close"></i>'+
                '</a>'+
            '</div>'+
        '')

        detail_index++
    }

    function remove_spec(detail_index) {
        $("#icon_"+detail_index).remove()
        $("#spec_"+detail_index).remove()
        $("#status_"+detail_index).remove()
        $("#action_"+detail_index).remove()
    }
</script>
@endsection