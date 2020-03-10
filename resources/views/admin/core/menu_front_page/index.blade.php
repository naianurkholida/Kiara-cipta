@extends('component.layouts.master')

@section('button')
	<a href="{{Route('menu_front_page.insert')}}" class="btn btn-info">
		<i class="flaticon-plus"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3>{{ Helper::baseLabelPage() }}</h3>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<table class="table table-striped table-bordered table-hover" id="table-responsive">
				<thead class="m-datatable__head">
					<tr class="m-datatable__row text-center">
                        <td>No</td>
						<td>judul</td>
						<td>Kategori</td>
						<td>Sort Order</td>
                        <td>Actions</td>
					</tr>
				</thead>
				<tbody>
                    <!-- Menu Header -->
                    <!-- <tr>
                        <td colspan="5"><b>Menu Header</b></td>
                    </tr> -->
					<?php $no = 1;?>
					@if(count($menu_front_page) != 0)
                        @foreach($menu_front_page as $menufp)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$menufp->judul_menu}}</td>
                            <td>{{$menufp->category}}</td>
                            <td>{{$menufp->sort_order}}</td>
                            <td>
                                @if($validasi->update == 1)
                                <a href="{{Route('menu_front_page.edit',$menufp->id_menu_front_page)}}" class="btn btn-sm btn-primary">
                                    <i class="la la-edit"></i>
                                </a>
                                @endif

                                @if($validasi->view == 1)
                                <a href="{{Route('menu_front_page.detail',$menufp->id_menu_front_page)}}" class="btn btn-sm btn-info">
                                    <i class="la la-eye"></i>
                                </a>
                                @endif

                                @if($validasi->delete == 1)
                                <a href="{{Route('menu_front_page.delete',$menufp->id_menu_front_page)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
                                    <i class="la la-trash"></i>
                                </a>
                                @endif

                                @if($menufp->is_active == 0)
                                <button type="button" class="btn btn-success btn-sm" title="active" onclick="nonactive('{{$menufp->id_menu_front_page}}')">
                                    <i class="la la-check"></i>
                                </button>
                                @else
                                <button type="button" class="btn btn-dark btn-sm" title="non active" onclick="active('{{$menufp->id_menu_front_page}}')">
                                    <i class="la la-close"></i>
                                </button>
                                @endif
                            </td>
                        </tr>
                        <?php $no++?>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" align="center">No Data</td>
                        </tr>
                    @endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    function active(id) {
        $.ajax({
            url: '{{Route("menu_front_page.active")}}',
            type: 'GET',
            dataType: 'json',
            data: {id: id},
            success: function(response){
                location.reload();
            }
        });
        
    }

    function nonactive(id) {
        $.ajax({
            url: '{{Route("menu_front_page.nonactive")}}',
            type: 'GET',
            dataType: 'json',
            data: {id: id},
            success: function(response){
                location.reload();
            }
        });
    }
</script>
@endsection