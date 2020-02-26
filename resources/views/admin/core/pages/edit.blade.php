@extends('component.layouts.master')

@section('button')
	<a href="{{Route('pages.index')}}" class="btn btn-info">
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
            <!-- <div class="col-md-6">
                <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button>
            </div> -->
        </div>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<form action="{{Route('pages.update', $pages->id)}}" method="post" id="form">
            {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="" selected="">-- Pilih Kategori --</option>
                            @foreach($category as $category)
                                <option value="{{$category->id}}" <?php if($pages->id_category == $category->id){ ?> selected="selected" <?php } ?>>{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr>
                <input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
                <input type="hidden" name="trigger" id="hasil_all_id">
                <hr>

                @foreach($language as $key => $lang)
                    <?php $found = 0; $judul = ""; $content; $idl = "";?>
                    @foreach($pageslang as $key2 => $pl)
                        @if($lang->id == $pl->id_language)
                            <?php $found = 1; $judul = $pl->judul_page; $content = $pl->konten_page; $idl = $pl->id;?>
                            @break
                        @endif
                    @endforeach

                    @if($found == 1)
                        <div class="row" id="field[<?=$key?>]">
                            <div class="col-md-12">
                                <center><h3>{{$lang->judul_language}}</h3></center>
                                <input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
                                <input type="hidden" name="idl[]" value="{{$idl}}">
                            </div>
                            <div class="col-md-12">
                                <label for="">Title</label>
                                <input type="text" id="judul[<?=$key?>]" name="judul[]" class="form-control" value="{{$judul}}">
                            </div>
                            <div class="col-md-12">
                                <label for="">content</label>
                                <textarea id="content[<?=$key?>]" name="content[]" class="summernote" id="kt_summernote_1">{{$content}}</textarea>
                            </div>
                        </div>
                        <hr>
                    @else
                        <div class="row" id="field[<?=$key?>]">
                            <div class="col-md-12">
                                <center><h3>{{$lang->judul_language}}</h3></center>
                                <input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
                            </div>
                            <div class="col-md-12">
                                <label for="">Title</label>
                                <input type="text" id="judul[<?=$key?>]" name="judul[]" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">content</label>
                                <textarea id="content[<?=$key?>]" name="content[]" class="summernote" id="kt_summernote_1"></textarea>
                            </div>
                        </div>
                    @endif
                @endforeach
                
                <div class="row">
                    <div class="col-md-12">
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