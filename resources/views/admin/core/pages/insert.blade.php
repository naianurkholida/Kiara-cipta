@extends('component.layouts.master')

@section('button')
<a href="{{Route('pages.index')}}" class="btn btn-info">
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
        <form action="{{Route('pages.post')}}" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12">
                    <label>Image <small>( Optional )</small></label><br>
                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1" style="width: 100%; height: 300px;">
                        <div class="kt-avatar__holder" style="width: 100%; height:300px; background-image: url({{ asset('assets/admin/assets/media/pages') }})"></div>
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
                <div class="col-md-12">
                    <label for="">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required="">
                        <option value="" selected="">-- Pilih Kategori --</option>
                        @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>
            <input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
            <input type="hidden" name="trigger" id="hasil_all_id">
            <hr>

            @foreach($language as $key => $lang)
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
            <hr>
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
<script src="{{asset('assets/admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>  

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