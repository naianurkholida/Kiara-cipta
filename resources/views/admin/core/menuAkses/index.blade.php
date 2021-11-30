@extends('component.layouts.master')

@section('content')
<div class="card">
	<div class="card-header">
		<h4>Menu Akses Management</h4>
	</div>
	<div class="card-body">
		<form action="{{Route('menuaccess.store')}}" method="post">
			{{csrf_field()}}
			<input type="submit" class="btn btn-primary btn-sm pull-right" value="Simpan">
			<br><br>
			<div class="card">
				<div class="card-body">
					<select class="custom-select" name="role" onchange="get_akses(this.value)">
						<option selected disabled>- Pilih Role -</option>
						@foreach($role as $role)
						<option value="{{$role->id}}">{{$role->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<br>
			<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
				<table class="table table-striped table-bordered table-hover">
					<thead class="m-datatable__head">
						<tr class="m-datatable__row text-center">
							<th>No</th>
							<th>Label</th>
							<th>Url</th>
							<th>Show</th>
							<th>Create</th>
							<th>Read</th>
							<th>Update</th>
							<th>Delete</th>
							<th>View</th>
							<th>Print</th>
							<th>Download</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="menu_akses">
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	function get_akses(role_id){
		console.log(role_id);
		$.ajax({
			type : 'GET',
			dataType : 'json',
			url : '{{url("/menuaccess/list_akses")}}/'+role_id,
			success : function(data){
				$("#menu_akses").html("")

				if(data['menuakses'].length == 0){
					var no = 1;
					$.each(data['menu'], function (key, value){
						$("#menu_akses").append(
							'<tr class="text-center">'+
							'<input type="hidden" name="menu_id_'+value.id+'" value="'+value.id+'">'+
							'<td>'+no+'</td>'+
							'<td>'+value.label+'</td>'+
							'<td>'+value.url+'</td>'+
							'<td><input type="checkbox" name"show_'+value.id+'" id="show_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="create_'+value.id+'" id="create_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="read_'+value.id+'" id="read_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="update_'+value.id+'" id="update_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="delete_'+value.id+'" id="delete_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="view_'+value.id+'" id="view_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="print_'+value.id+'" id="print_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="download_'+value.id+'" id="download_'+value.id+'"></td>'+
							'<td>'+
							'<button type="button" class="btn btn-success btn-sm" title="Active" onclick="active_all('+value.id+')">'+
							'<i class="la la-check"></i>'+
							'</button>'+
							'&nbsp;'+
							'<button type="button" class="btn btn-danger btn-sm" title="Non Active" onclick="non_active_all('+value.id+')">'+
							'<i class="la la-close"></i>'+
							'</button>'+
							'</td>'+
							'</tr>'
							);
						no++;
					});
				}else{
					$.each(data['menu'], function (key, value){
						var show = '';
						var create ='';
						var read = '';
						var update = '';
						var hapus = '';
						var view = '';
						var print = '';
						var download = '';
						var no = key+1;

						$.each(data['menuakses'], function(k, v){
							if(value.id == v.menu_id){
								show 		= (v.show == '1') ? 'checked' : '';
								create 		= (v.create == '1') ? 'checked' : '';
								read 		= (v.read == '1') ? 'checked' : '';
								update 		= (v.update == '1') ? 'checked' : '';
								hapus 		= (v.delete == '1') ? 'checked' : '';
								view  		= (v.view == '1') ? 'checked' : '';
								print 		= (v.print == '1') ? 'checked' : '';
								download 	= (v.download == '1') ? 'checked' : '';
							}
						});

						$("#menu_akses").append(
							'<tr class="text-center">'+
							'<input type="hidden" name="menu_id_'+value.id+'" value="'+value.id+'">'+
							'<td>'+no+'</td>'+
							'<td>'+value.label+'</td>'+
							'<td>'+value.url+'</td>'+
							'<td><input type="checkbox" name="show_'+value.id+'" '+show+' id="show_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="create_'+value.id+'" '+create+' id="create_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="read_'+value.id+'" '+read+' id="read_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="update_'+value.id+'" '+update+' id="update_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="delete_'+value.id+'" '+hapus+' id="delete_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="view_'+value.id+'" '+view+' id="view_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="print_'+value.id+'" '+print+' id="print_'+value.id+'"></td>'+
							'<td><input type="checkbox" name="download_'+value.id+'" '+download+' id="download_'+value.id+'"></td>'+
							'<td>'+
							'<button type="button" class="btn btn-success btn-sm" title="Active" onclick="active_all('+value.id+')">'+
							'<i class="la la-check"></i>'+
							'</button>'+
							'&nbsp;'+
							'<button type="button" class="btn btn-danger btn-sm" title="Non Active" onclick="non_active_all('+value.id+')">'+
							'<i class="la la-close"></i>'+
							'</button>'+
							'</td>'+
							'</tr>'
							);
					});
				}
			}

		});
	}

	function active_all(id) {
		let show  	 = document.getElementById('show_'+id).checked = true;
		let create 	 = document.getElementById('create_'+id).checked = true;
		let read 	 = document.getElementById('read_'+id).checked = true;
		let update 	 = document.getElementById('update_'+id).checked = true;
		let destroy  = document.getElementById('delete_'+id).checked = true;
		let view     = document.getElementById('view_'+id).checked = true;
		let print    = document.getElementById('print_'+id).checked = true;
		let download = document.getElementById('download_'+id).checked = true;
	}

	function non_active_all(id) {
		let show  	 = document.getElementById('show_'+id).checked = false;
		let create 	 = document.getElementById('create_'+id).checked = false;
		let read 	 = document.getElementById('read_'+id).checked = false;
		let update 	 = document.getElementById('update_'+id).checked = false;
		let destroy  = document.getElementById('delete_'+id).checked = false;
		let view     = document.getElementById('view_'+id).checked = false;
		let print    = document.getElementById('print_'+id).checked = false;
		let download = document.getElementById('download_'+id).checked = false;
	}
</script>
@endsection