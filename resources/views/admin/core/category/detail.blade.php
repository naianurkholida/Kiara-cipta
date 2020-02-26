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
            <div class="col-md-6">
                <!-- <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button> -->
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
            <div class="row">
                <div class="col-md-4">
                    <h3>Kategori : {{$head_category->category}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    sub-Kategory
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover" id="table-responsive">
                        <thead class="m-datatable__head">
                            <tr class="m-datatable__row text-center">
                                <td>No</td>
                                <td>Sub-Kategori</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;?>
                            @foreach($detail_category as $category)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$category->category}}</td>
                                <td>
                                    <a href="{{Route('category.edit',$category->id)}}" class="btn btn-sm btn-primary">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="{{Route('category.delete',$category->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
                                        <i class="la la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection