@extends('component.layouts.master')

@section('button')
	<a href="{{Route('bank.insert')}}" class="btn btn-info">
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
						<td>Kode Bank</td>
                        <td>Nama Bank</td>
                        <td>Atas Nama</td>
                        <td>No Rekening</td>
                        <td>Alamat</td>
                        <td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($bank as $bank)
					<tr>
						<td>{{$no}}</td>
                        <td>{{$bank->kode_bank}}</td>
                        <td>{{$bank->nama_bank}}</td>
                        <td>{{$bank->atas_nama}}</td>
                        <td>{{$bank->no_rekening}}</td>
                        <td>{{$bank->alamat}}</td>
                        <td>
                        	@if($validasi->update == 1)
                            <a href="{{Route('bank.edit',$bank->id)}}" class="btn btn-sm btn-primary">
								<i class="la la-edit"></i>
							</a>
							@endif

							@if($validasi->delete == 1)
							<a href="{{Route('bank.delete',$bank->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
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
@endsection

@section('js')

@endsection