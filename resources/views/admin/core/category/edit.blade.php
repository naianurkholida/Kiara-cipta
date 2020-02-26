@extends('component.layouts.master')

@section('button')
	<a href="{{Route('category.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')

<script>
    function cek_simpan(){
        if($("#kategori").val() == ""){
            alert('Kategori Tidak Boleh Kosong')
        }else{
            $("#form").submit()
        }
    }
</script>

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
        <form action="{{Route('category.update', $category->id)}}" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <label for="">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="kategori" value="{{$category->category}}">
                </div>
                <div class="col-md-6">
                    <label>Order Num</label>
                    <input type="text" name="order_num" class="form-control" value="{{$category->order_num}}">
                </div>
                @if($cek_kat != null)
                <div class="col-md-12"><br>
                    <label>Icon</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="col-md-12">
                    <label>Deskripsi</label>
                    @if($gambar != null) 
                    <textarea class="form-control" name="deskripsi">
                        {{$gambar->deskripsi}}
                    </textarea>
                    @else
                    <textarea class="form-control" name="deskripsi"></textarea>
                    @endif
                </div>
                @endif
                <div class="col-md-12"><br>
                    <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('js')

@endsection