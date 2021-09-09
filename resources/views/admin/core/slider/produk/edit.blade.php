@extends('component.layouts.master')

@section('button')
<a href="{{Route('slider.index')}}" class="btn btn-info">
  <i class="flaticon-reply"></i>
  <span>{{ Helper::baseLabelPage() }}</span>
</a>
@endsection

<style>
	.cropit-preview {
		background-color: #f8f8f8;
		background-size: cover;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-top: 7px;
		width: 250px;
		height: 250px;
	}

	.cropit-preview-image-container {
		cursor: move;
	}

	.image-size-label {
		margin-top: 10px;
	}

	input {
		display: block;
	}

	button[type="submit"] {
		margin-top: 10px;
	}

	#result {
		margin-top: 10px;
		width: 900px;
	}

	#result-data {
		display: block;
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
		word-wrap: break-word;
	}
</style>

@section('content')
<div class="card">
	<div class="card-header">
		<h3>{{ Helper::baseLabelPage() }}</h3>
	</div>
	<div class="card-body">
		<form action="{{Route('slider.produk.update', $slider->id)}}" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12">
                    <label>Banner</label><br>
                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1" style="width: 100%; height: 450px;">
                        <div class="kt-avatar__holder" style="width: 100%; height:450px; background-image: url({{ asset('assets/admin/assets/media/slider') }}/{{$slider->banner}})"></div>
                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                            <i class="fa fa-pen"></i>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
                        </label>
                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                            <i class="fa fa-times"></i>
                        </span>
                    </div>
                </div>
            </div><br>

            <div class="row">
            	<div class="col-lg-8">
					<label>Kategori Produk</label>
					<select class="form-control" name="kategori_produk">
						<option value="" selected="" disabled="">- Kategori -</option>
						@foreach($category as $key => $val)
							<option value="{{$val->id}}" <?php if($slider->category_id == $val->id){ ?> selected <?php } ?> >{{$val->category}}</option>
						@endforeach
					</select>
				</div>

				<div class="col-md-4">
            		<div class="form-group">
            			<label>Order Num</label>
            			<input type="number" name="order_num" class="form-control" required="" value="{{ $slider->order_num }}"><br>
            		</div>
            	</div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
                    <input type="hidden" name="trigger" id="hasil_all_id">
                    <hr>
                </div>
            </div>
            <div class="row"> 
            	<?php $found = 0; $judul = ""; $content; $idl = "";?>
                @foreach($language as $key => $lang)
                @foreach($slider_language as $key2 => $pl)
                @if($lang->id == $pl->id_language)
                <?php 
                $found   = 1; 
                $judul   = $pl->title; 
                $content = $pl->desc;
                $idl     = $pl->id;
                ?>
                @break
                @endif
                @endforeach
                <div class="col-md-12">
                    <center><h3>{{$lang->judul_language}}</h3></center><br>
                    <input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
                    <input type="hidden" name="idl[<?=$key?>]" value="{{ $idl }}">
                </div>
                <div class="col-md-12">
                    <label for="">Judul</label>
                    <input type="text" name="judul[]" id="judul[<?=$key?>]" class="form-control" value="{{ $judul }}"><br>
                </div>
                <div class="col-md-12">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi[]" id="deskripsi[<?=$key?>]" class="form-control" cols="30" rows="10">{{ $content }}</textarea><br>
                </div>
                @endforeach

                <div class="col-md-12">
                    <br>
                    <button class="btn btn-primary pull-right" type="button" onclick="cek_simpan()">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')

<script src="{{asset('js/cropit.js')}}"></script>
<script>
   function cek_simpan(){
      $("#form").submit()
  }

  function cek_bahasa(){
    var trigger = $("#all_id:checked").length
    if (trigger > 0) {
        $("#hasil_all_id").val(1)
    }else{
        $("#hasil_all_id").val(0)
    }
}
</script>
@endsection