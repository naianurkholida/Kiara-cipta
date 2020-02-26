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
        <form action="{{Route('category.post')}}" method="post" id="form">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4">
                    <label for="">Tipe</label>
                    <select name="tipe" id="tipe" class="form-control">
                        <option value="0">Main Tipe</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="kategori">
                </div>

                <div class="col-md-4">
                    <label>Order Num</label>
                    <input type="number" name="order_num" class="form-control">
                </div>
            </div>
            <div class="row">
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