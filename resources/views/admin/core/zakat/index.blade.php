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
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th>Jumlah Zakat</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($zakat as $zak)
					<tr>
						<td class="text-center">{{$no}}</td>
						<td data-field="AgentName" class="kt-datatable__cell">
							<span style="width: 200px;">
								<div class="kt-user-card-v2">								
									<div class="kt-user-card-v2__pic">									
										<div class="kt-badge kt-badge--xl kt-badge--warning"><img src="{{asset('admin/assets/media/foto-users/300')}}/{{$zak->foto}}"></div>								
									</div>								
									<div class="kt-user-card-v2__details">									
										<label class="kt-user-card-v2__name">{{$zak->name}}</label>
									</div>
								</div>
							</span>
						</td>
						<td>{{$zak->email}}</td>
						<td>{{$zak->alamat}}</td>
						<td>{{$zak->no_telp}}</td>
						<td>{{'Rp. '.number_format($zak->nilai_zakat)}}</td>
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