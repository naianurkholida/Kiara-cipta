@extends('component.layouts.master')

@section('button')
	<a href="{{Route('promo.insert')}}" class="btn btn-info">
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
						<td>Judul</td>
                        <td>File</td>
                        <td>Date</td>
                        <td>Action</td>
					</tr>
				</thead>
				<tbody>	
					<?php
					$no = 1; 
					foreach($data as $row ){?>
						
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $row->judul }}</td>
							<td><input type="text" class="form-control" id="copy" value="{{ url('promosi') }}/{{$row->file}}" style="border: 0px; background-color: #f7f8fa;" readonly=""></td>
							<td>{{ Helper::tanggal_indonesia($row->date) }}</td>
							<td class="text-center">
								@if($validasi->update == 1)
								<a href="{{Route('promo.edit',$row->id)}}" class="btn btn-sm btn-primary" title="Edit">
									<i class="la la-edit"></i>
								</a>
								@endif

								<a href="javascript:0;" class="btn btn-sm btn-info" title="Copy Link" onclick="copyToClip()">
									<i class="la la-copy"></i>
								</a>

								@if($validasi->delete == 1)
								<a href="{{Route('promo.delete',$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')" title="Hapus">
									<i class="la la-trash"></i>
								</a>
								@endif
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	function copyToClip()
	{
		/* Get the text field */
		var copyText = document.getElementById("copy");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		/* Copy the text inside the text field */
		document.execCommand("copy");

		/* Alert the copied text */
		alert("Copied the text: " +copyText.value);
	}
</script>
@endsection