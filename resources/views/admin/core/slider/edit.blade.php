@extends('component.layouts.master')

@section('button')
	<a href="{{Route('slider.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3>{{ Helper::baseLabelPage() }}</h3>
	</div>
	<div class="card-body">
		<form action="{{Route('slider.update', $slider->id)}}" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">
                    <div class="col-lg-12">
                        <label>Cover</label><br>
                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="width: 100%; height:450px; background-image: url({{ asset($slider->getFirstMediaUrl('slider') == NULL ? 'public/image/default/placeholder.png' : $data) }})"></div>
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

            <br>

            <div class="row">
                <div class="col-md-12">
                    <label for="">Link</label>
                    <input type="text" name="link" class="form-control" required value="{{$slider->link}}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="">Title Button</label>
                    <input type="text" name="title_button" class="form-control" value="{{$slider->title_button}}"><br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="">Code Warna</label>
                    <input type="text" name="code_warna" class="form-control" value="{{$slider->code_warna}}">
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
                                $judul   = $pl->judul; 
                                $content = $pl->deskripsi;
                                $idl     = $pl->id;
                            ?>
                            @break
                        @endif
                    @endforeach

                    @if($found == 1)
                        <div class="col-md-12">
                            <center><h3>{{$lang->judul_language}}</h3></center>
                            <input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
                            <input type="hidden" name="idl[]" value="{{$idl}}">
                        </div>
                        <div class="col-md-12">
                            <label for="">Judul</label>
                            <input type="text" name="judul[]" id="judul[<?=$key?>]" class="form-control" value="{{$judul}}"><br>
                        </div>
                        <div class="col-md-12">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi[]" id="deskripsi[<?=$key?>]" class="form-control" cols="30" rows="10">{{$content}}</textarea><br>
                        </div>
                    @else
                        <div class="col-md-12">
                            <center><h3>{{$lang->judul_language}}</h3></center>
                            <input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
                        </div>
                        <div class="col-md-12">
                            <label for="">Judul</label>
                            <input type="text" name="judul[]" id="judul[<?=$key?>]" class="form-control"><br>
                        </div>
                        <div class="col-md-12">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi[]" id="deskripsi[<?=$key?>]" class="form-control" cols="30" rows="10"></textarea><br>
                        </div>
                    @endif
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
    <script>
        function cek_simpan(){
    		$("#form").submit()
    	}
    </script>
@endsection