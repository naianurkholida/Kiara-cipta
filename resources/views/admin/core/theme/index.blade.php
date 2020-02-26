@extends('component.layouts.master')

@section('content')
<div class="card">
	<div class="card-header">
		<h3>List Theme</h3>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<table class="table table-striped table-bordered table-hover" id="table-responsive">
				<thead class="m-datatable__head">
					<tr class="m-datatable__row text-center">
                        <td>No</td>
						<td>Nama</td>
						<td>Status</td>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($theme as $thm)
					<tr>
						<td>{{$no}}</td>
                        <td>{{$thm->nama}}</td>
                        <td align="center">
							@if($thm->status == 1)
                                <button class="btn btn-sm btn-success" disabled>
                                    Active
                                </button>
							@else
                                <a href="{{Route('theme.actived',$thm->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Mengaktifkan Tema Ini ? ')">
                                    Non-Active
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