@extends('component.layouts.master')

@section('button')
	<a href="{{Route('posting.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<script>

    function cek_bahasa(){
        var trigger = $("#all_id:checked").length
        if (trigger > 0) {
            $("#hasil_all_id").val(1)
        }else{
            $("#hasil_all_id").val(0)
        }
    }


    function cek_simpan(){
        console.log($("#kategori").val())
        if($("#kategori").val() == ""){
            alert('kategori harus diisi')
        }else {
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
       <form action="{{Route('posting.update', $posting->id)}}" method="post" id="form" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-lg-12">
                <label>Gambar</label><br>
                <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1" style="width: 100%; height: 300px;">
                    <div class="kt-avatar__holder" style="width: 100%; height:300px; background-image: url({{ asset('assets/admin/assets/media/posting/') }}/{{$posting->image}})"></div>
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
            <div class="col-md-6">
                <label for="">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required="">
                    <option value="" selected="selected">-- Pilih Kategori--</option>
                    @foreach($category as $category)
                    <option value="{{$category->id}}" <?php if($posting->id_category == $category->id){ ?> selected="selected" <?php } ?>>{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Status</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if($posting->status == '1'){ ?> selected="selected" <?php } ?>>Active</option>
                    <option value="0" <?php if($posting->status == '0'){ ?> selected="selected" <?php } ?>>Non Active</option>
                </select>
            </div>
        </div>

        <hr>
        <input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
        <input type="hidden" name="trigger" id="hasil_all_id">
        <hr>
        @foreach($language as $key => $lang)
        <?php $found = 0; $judul = ""; $content; $idl = "";?>
        @foreach($postingl as $key2 => $pl)
        @if($lang->id == $pl->id_language)
        <?php $found = 1; $judul = $pl->judul; $content = $pl->content; $idl = $pl->id;?>
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