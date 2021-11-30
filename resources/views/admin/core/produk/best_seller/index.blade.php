@extends('component.layouts.master')

@section('button')
	<a href="{{ Route('produk.index') }}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>Produk</span>
	</a>
	<a href="{{ Route('produk.best_seller.insert') }}" class="btn btn-info">
		<i class="flaticon-plus"></i>
		<span>Best Seller</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3>Best Seller</h3>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<table class="table table-striped table-bordered table-hover" id="table-responsive">
				<thead class="m-datatable__head">
					<tr class="m-datatable__row text-center">
						<th>No</th>
						<th>Best Seller</th>
						<!-- <th>Icon</th> -->
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach($best_seller_icon as $key => $val)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $val->produk->getProdukLanguage->judul }}</td>
							<!-- <td>{{-- $val->icon --}}</td> -->
							<td>
								<a href="{{ Route('produk.best_seller.edit', $val->id) }}" class="btn btn-success btn-sm">
									<i class="la la-edit"></i>
								</a>
								<a href="{{ Route('produk.best_seller.delete', $val->id) }}" class="btn btn-danger btn-sm">
									<i class="la la-trash"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection