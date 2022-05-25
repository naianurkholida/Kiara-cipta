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
						<td>Product</td>
                        <td>Customer ID</td>
                        <td>Customer Name</td>
                        <td>Tanggal</td>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;?>
					@foreach($data as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->nama_product }}</td>
                            <td>{{ $item->customer_id }}</td>
                            <td>{{ $item->customer_name }}</td>
                            <td>{{ $item->tanggal }}</td>
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