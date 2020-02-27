@extends('component.layouts.master')

@section('button')
	<a href="{{Route('sosmed.index')}}" class="btn btn-info">
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
	<form action="{{Route('sosmed.store')}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<label>Kategori Sosmed</label>
					<select class="form-control" name="kategori_sosmed">
						<option value="" selected="" disabled="">- Kategori -</option>
						@foreach($category as $key => $val)
							<option value="{{$val->id}}">{{$val->category}}</option>
						@endforeach
					</select>
				</div>

				<div class="col-lg-12">
					<div class="form-group">
						<label for="document">Link</label>
						<input type="text" class="form-control" placeholde="https://....." name="link">
					</div>
				</div>
			</div>

			<br>

			<div class="kt-portlet__foot">
				<div class="kt-form__actions">
				<button type="submit" class="btn btn-info">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection