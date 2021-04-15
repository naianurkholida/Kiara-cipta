@extends('component.layouts.master')

@section('button')
	<a href="{{Route('profile_cabang.index')}}" class="btn btn-info">
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
	    <form action="{{Route('profile_cabang.update', $data->id)}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-4">
					<label>Name</label>
					<input type="text" id="pc_name" name="pc_name" class="form-control" value="{{ $data->name }}" required>
				</div>
				<div class="col-lg-4">
					<label>Link</label>
					<input type="text" id="pc_link" name="pc_link" class="form-control" value="{{ $data->link }}" required>
				</div>
				<div class="col-lg-4">
					<label>Status</label>
					<select id="pc_status" name="pc_status" class="form-control" required>
                    @foreach(config("enums.status_active") as $key => $value)
                        @if ($value == $data->is_active)
                        <option value="{{ $value }}" selected>
                        @else
                        <option value="{{ $value }}" >
                        @endif

                            {{ $key }}
                        </option>
                    @endforeach
                    </select>
				</div>
				<div class="col-lg-12">
					<label>Address</label>
					<textarea id="pc_address" name="pc_address" class="form-control" rows=6 required>{{ $data->address }}</textarea>
				</div>

                <div class=col-lg-12>
                    <br><hr>
                </div>

                <div class="col-sm-6">
                    <h4>Detail</h4>
                </div>
                <div class="col-sm-6">
                    <a href="#" class="btn btn-info" onclick="add_detail()" style="float: right;">
                        <i class="flaticon-plus"></i>
                        <span>Add</span>
                    </a>
                </div>

                <div class=col-lg-12>
                    <br>
                </div>

                <div class="col-lg-12 row" id="form_detail">
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
    var detail_index = 0;
    setTimeout(function(){
        setDetail(); 
    }, 500);

	function simpan() {
		$('#form_menu').submit();
	}

    function setDetail() {
        var detail = JSON.parse($('<textarea />').html("{{ $data->detail }}").text())
        detail.forEach(element => {
            $('#form_detail').append(''+
                '<div class="col-sm-4" id="fd_type_'+detail_index+'">'+
                    '<label>Type</label>'+
                    '<select id="pc_detail_type[]" name="pc_detail_type[]" class="form-control" required>'+
                    '@foreach(config("enums.profile_cabang_types") as $key => $value)'+
                        '@if ($value == '+element.type+')'+
                        '<option value="{{ $value }}" selected>'+
                        '@else'+
                        '<option value="{{ $value }}" >'+
                        '@endif'+
                        '{{ $key }}</option>'+
                    '@endforeach'+
                    '</select>'+
                '</div>'+
                '<div class="col-sm-7" id="fd_value_'+detail_index+'">'+
                    '<label>Value</label>'+
                    '<input type="text" name="pc_detail_value[]" id="pc_detail_value[]" class="form-control" value="'+element.value+'">'+
                '</div>'+
                '<div class="col-sm-1" id="fd_action_'+detail_index+'">'+
                    '<label style="color: white;">Action</label>'+
                    '<a href="#" class="btn btn-danger" onclick="remove_detail('+detail_index+')">'+
                        '<i class="flaticon-close"></i>'+
                    '</a>'+
                '</div>'+
            '')

            detail_index++
        });
    }

    function add_detail() {
        $('#form_detail').append(''+
            '<div class="col-sm-4" id="fd_type_'+detail_index+'">'+
                '<label>Type</label>'+
                '<select id="pc_detail_type[]" name="pc_detail_type[]" class="form-control" required>'+
                '@foreach(config("enums.profile_cabang_types") as $key => $value)'+
                    '<option value="{{ $value }}">{{ $key }}</option>'+
                '@endforeach'+
                '</select>'+
            '</div>'+
            '<div class="col-sm-7" id="fd_value_'+detail_index+'">'+
                '<label>Value</label>'+
                '<input type="text" name="pc_detail_value[]" id="pc_detail_value[]" class="form-control">'+
            '</div>'+
            '<div class="col-sm-1" id="fd_action_'+detail_index+'">'+
                '<label style="color: white;">Action</label>'+
                '<a href="#" class="btn btn-danger" onclick="remove_detail('+detail_index+')">'+
                    '<i class="flaticon-close"></i>'+
                '</a>'+
            '</div>'+
        '')

        detail_index++
    }

    function remove_detail(detail_index) {
        $("#fd_type_"+detail_index).remove()
        $("#fd_value_"+detail_index).remove()
        $("#fd_action_"+detail_index).remove()
    }
</script>
@endsection