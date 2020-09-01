@extends('component.layouts.master')

@section('button')
	<a href="{{Route('promo.index')}}" class="btn btn-info">
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
        <form action="{{ Route('promo.update', $data->id) }}" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <label for="">Judul</label>
                    <input type="text" name="judul" value="{{ $data->judul }}" class="form-control" placeholder="Judul" required="">
                </div>

                <div class="col-md-6">
                    <label for="">File <span style="margin-left: 15px; color: black;">{{ $data->file }}</span></label>
                    <input type="hidden" name="file_before" value="{{ $data->file }}">
                    <input type="file" name="file" class="form-control" required="" id="file">
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