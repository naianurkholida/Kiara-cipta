@extends('component.layouts.master')

@section('button')
	<a href="{{Route('dashboard_customer.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h3>{{ Helper::baseLabelPage() }}</h3>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<form action="{{Route('dashboard_customer.update', $data->id)}}" method="post" id="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group row">
					<div class="col-md-6">
						<label>Title</label>
						<input type="text" name="title" class="form-control" value="{{ $data->name }}">
					</div>
					<div class="col-md-6">
						<label>Type</label>
						<select class="form-control" name="jenis">
							<option value="" selected>- Type -</option>
							<option value="1" <?php if($data->jenis == 1){ ?> selected <?php } ?> > Benefit</option>
							<option value="2" <?php if($data->jenis == 2){ ?> selected <?php } ?> >Membership</option>
							<option value="3" <?php if($data->jenis == 3){ ?> selected <?php } ?> >How To Get Point</option>
							<option value="4" <?php if($data->jenis == 4){ ?> selected <?php } ?> >Icon Menu</option>
							<option value="5" <?php if($data->jenis == 5){ ?> selected <?php } ?>>How to Redeem Points</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Url</label>
					<input type="text" name="url" class="form-control" value="{{ $data->url }}">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="4">{{ $data->description }}</textarea>
				</div>
				<div class="form-group">
					<label>Icon</label>
					<div style="width: 20%;">
						<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar" style="width: 180px; height: 180px;">
							<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset('assets/admin/assets/media/img/') }}/{{ $data->icon  }}');"></div>
							<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
								<i class="fa fa-pen"></i>
								<input type="file" name="file" id="file">
							</label>
							<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
								<i class="fa fa-times"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12"><br>
						<button type="submit" class="btn btn-primary pull-right">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>	

@endsection