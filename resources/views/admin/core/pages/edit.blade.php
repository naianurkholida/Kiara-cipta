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
                        <select name="kategori" id="kategori" class="form-control" required="">
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
                                <textarea id="content[<?=$key?>]" name="content[]" class="summernote1">{{$content}}</textarea>
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
                                <textarea id="content[<?=$key?>]" name="content[]" class="summernote1"></textarea>
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
<script type="text/javascript">
    $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.summernote1').summernote({
                height: "300px",
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    },
                    onMediaDelete : function(target) {
                        deleteImage(target[0].src);
                    }
                }
            });

            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: "{{url('uploadimagewysywig')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('.summernote1').summernote("insertImage", url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function deleteImage(src) {
                $.ajax({
                    data: {src : src},
                    type: "POST",
                    url: "{{url('deleteimagewysywig')}}",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        });
</script>
@endsection