@extends('component.layouts.master')

@section('button')
	<a href="{{Route('menu_front_page.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')

<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.5/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.5/js/froala_editor.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script>
    $(document).ready(function(){
        var editor = new FroalaEditor('textarea')
    });

    function cek_bahasa(){
        var trigger = $("#all_id:checked").length
        if (trigger > 0) {
            $("#hasil_all_id").val(1)
        }else{
            $("#hasil_all_id").val(0)
        }
    }

    function cek_simpan(){
        if($("#kategori").val() == ""){
            alert('Kategori Tidak Boleh Kosong')
        }else if($("#sort_order").val() == ""){
            alert('Sort Order Tidak Boleh Kosong')
        }else if($("#jenis").val() == ""){
            alert('Jenis Tidak Boleh Kosong')
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
			<form action="{{Route('menu_front_page.post')}}" method="post" id="form">
            {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="" selected="">-- Pilih Kategori --</option>
                            @foreach($category as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Parent</label>
                        <select name="parent" id="parent" class="form-control">
                            <option value="0" selected="">Parent</option>
                            @foreach($menu_front_page_language as $menu_front_page_language)
                                <option value="{{$menu_front_page_language->id_menu_front_page}}">{{$menu_front_page_language->judul_menu}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Sort order</label>
                        <input type="number" class="form-control" name="sort_order" id="sort_order">
                    </div>

                    <div class="col-md-6">
                        <label for="">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="" selected="">-- pilih Jenis --</option>
                            <option value="Page">Page</option>
                            <option value="Modul">Modul</option>
                        </select>
                    </div>
                </div>

                <hr>
                <input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
                <input type="hidden" name="trigger" id="hasil_all_id">
                <hr>

                @foreach($language as $key => $lang)
                    <div class="row">
                        <div class="col-md-12">
                            <center><h3>{{$lang->judul_language}}</h3></center>
                            <input type="hidden" id="language1" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
                        </div>
                        <div class="col-md-12">
                            <label for="">Judul</label>
                            <input type="text" id="judul1" name="judul[]" class="form-control">
                        </div>
                    </div>
                    <hr>
                @endforeach

                <div class="row">
                    <div class="col-md-12">
                        <br>
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