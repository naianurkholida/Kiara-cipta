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
        <form action="{{Route('category.post')}}" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <label for="">Tipe</label>
                    <select name="tipe" id="tipe" class="form-control" required="">
                        <option value="0">Main Tipe</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="kategori" required="">
                </div>

                <div class="col-md-6">
                    <label>Order Num</label>
                    <input type="number" name="order_num" class="form-control" required="">
                </div>

                <div class="col-md-6">
                    <label>Banner (optional)</label>
                    <input type="file" name="banner" class="form-control" accept=".png, .jpg, .jpeg">
                </div>

                <div class="col-md-12">
                    <label for="">Deskripsi</label>
					<textarea class="form-control" name="description" id="description" required=""></textarea>
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