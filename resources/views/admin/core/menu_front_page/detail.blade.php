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
        // location.reload()
    });

    function cek_simpan(){
        if($("#kategori").val() == ""){
            alert('Kategori Tidak Boleh Kosong')
        }else if($("#sort_order").val() == ""){
            alert('Sort Order Tidak Boleh Kosong')
        }else if($("#jenis").val() == ""){
            alert('Jenis Tidak Boleh Kosong')
        }else if($("#judul1").val() == "" || $("#judul2").val() == ""){
            alert('Judul Tidak Boleh Kosong')
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
            <div class="col-md-6">
                <!-- <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button> -->
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<!-- <form action="{{Route('menu_front_page.update', $menu_front_page->id)}}" method="post" id="form">
            {{csrf_field()}} -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" disabled="">
                            <option value="" selected="">-- Pilih Kategori --</option>
                            @foreach($category as $category)
                                <option value="{{$category->id}}" <?php if($menu_front_page->id_category == $category->id){ ?> selected="selected" <?php } ?>>{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Parent</label>
                        <select name="parent" id="parent" class="form-control" disabled="">
                            <option value="0" <?php if($menu_front_page->id_sub_menu == 0){ ?> selected="selected" <?php } ?>>Parent</option>
                            @foreach($menu_front_page_language as $menu_front_page_language)
                                <option value="{{$menu_front_page_language->id_menu_front_page}}" <?php if($menu_front_page->id_sub_menu == $menu_front_page_language->id_menu_front_page){ ?> selected="selected" <?php } ?>>{{$menu_front_page_language->judul_menu}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Sort order</label>
                        <input type="number" class="form-control" name="sort_order" id="sort_order" value="{{$menu_front_page->sort_order}}" readonly="">
                    </div>

                    <div class="col-md-6">
                        <label for="">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" disabled="">
                            <option value="" selected="">-- pilih Jenis --</option>
                            <option value="Page" <?php if($menu_front_page->jenis == "Page"){ ?> selected="selected" <?php } ?>>Page</option>
                            <option value="Modul" <?php if($menu_front_page->jenis == "Modul"){ ?> selected="selected" <?php } ?>>Modul</option>
                        </select>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <center><h3>{{$language[0]->judul_language}}</h3></center>
                        <input type="hidden" id="language1" name="language[]" class="form-control" readonly="" value="{{$language[0]->id}}">
                        <input type="hidden" name="idml[]" value="{{$menu_front_page_lang[0]->id}}">
                    </div>
                    <div class="col-md-6">
                        <center><h3>{{$language[1]->judul_language}}</h3></center>
                        <input type="hidden" id="language2" name="language[]" class="form-control" readonly="" value="{{$language[1]->id}}">
                        <input type="hidden" name="idml[]" value="{{$menu_front_page_lang[1]->id}}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Judul</label>
                        <input type="text" id="judul1" name="judul[]" class="form-control" value="{{$menu_front_page_lang[0]->judul_menu}}" readonly="">
                    </div>
                    <div class="col-md-6">
                        <label for="">Title</label>
                        <input type="text" id="judul2" name="judul[]" class="form-control" value="{{$menu_front_page_lang[1]->judul_menu}}" readonly="">
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover" id="table-responsive">
                        <thead class="m-datatable__head">
                            <tr class="m-datatable__row text-center">
                                <td>No</td>
                                <td>judul Indonesia</td>
                                <td>judul Inggris</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; $next = 0; ?>
                            <?php foreach($child_menu as $key => $value){ ?>
                                <?php if($next == 1){
                                    $next = 0;
                                    continue;
                                } ?>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$value->judul_menu}}</td>
                                    <?php foreach($child_menu as $key2 => $value2){ ?>
                                        <?php if($value2->id != $value->id && $value2->id_menu_front_page == $value->id_menu_front_page){ ?>
                                            <td>{{$value2->judul_menu}}</td>
                                            <?php $next = 1; ?>
                                            <?php break; ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <td>
                                    <?php $url = str_replace('/', '%', Request::url()); ?>
                                    <a href="{{Route('menu_front_page.edit',$value->id_menu_front_page)}}" class="btn btn-sm btn-primary">
                                        <i class="la la-edit"></i>
                                    </a>
                                    
                                    <a href="{{Route('menu_front_page.delete',$value->id_menu_front_page)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
                                        <i class="la la-trash"></i>
                                    </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <!-- <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button> -->
                    </div>
                </div>
            <!-- </form> -->
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection