@extends('component.layouts.master')

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
						<td>Nama Pengirim</td>
                        <td>Bank Pengirim</td>
                        <td>Tanggal Pembayaran</td>
                        <td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;?>
					@foreach($konfirmasi as $key => $pay)
					<?php 
						$create = date_create($pay->tanggal_konfirmasi);
						$date = date_format($create, 'd F Y');
					?>
						<tr>
							<td>{{$no}}</td>
							<td>{{$pay->nama_pengirim}}</td>
							<td>{{$pay->bank_pengirim}}</td>
							<td>{{$date}}</td>
							<td class="text-center">
								@if($pay->deleted_at == null)
								<a onclick="approve('{{$pay->id}}')" class="btn btn-sm btn-info" title="Approve Pembayaran"><i class="la la-check-circle"></i></a>
								@endif

								<a href="{{Route('transaksi.detail',$pay->id)}}" class="btn btn-sm btn-warning" title="Detail Pembayaran"><i class="la la-eye"></i></a>

								@if($validasi->delete == 1)
								<a href="{{Route('transaksi.delete',$pay->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
									<i class="la la-trash"></i>
								</a>
								@endif
							</td>
						</tr>
					<?php $no++?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('js')
<script type="text/javascript">
	function approve(id){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type : 'POST',
			dataType : 'json',
			url : '{{url("transaksi/approve")}}/'+id,
			success : function(data){}
		});

		alert('Approve Berhasil');
		location.reload();
	};
</script>
@endsection