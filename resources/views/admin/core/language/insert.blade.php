@extends('component.layouts.master')

@section('button')
	<a href="{{Route('category.index')}}" class="btn btn-info">
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
        <form action="{{Route('language.post')}}" method="post" id="form">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <label>Language</label>
                    <input type="text" name="language" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <label>icon</label><br>
                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1">
                        <div class="kt-avatar__holder" style="width: 50px; height:50px; background-image: url({{ asset('public/image/default/placeholder.png') }})"></div>
                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                            <i class="fa fa-pen"></i>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
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

@endsection