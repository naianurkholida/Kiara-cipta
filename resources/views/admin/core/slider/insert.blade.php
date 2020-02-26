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
		<form action="{{Route('slider.post')}}" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                    <div class="col-lg-12">
                        <label>Cover</label><br>
                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="width: 1000px; height:450px; background-image: url({{ asset('public/image/default/placeholder.png') }})"></div>
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
                    <input type="text" name="link" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="">Title Button</label>
                    <input type="text" name="title_button" class="form-control"><br>
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
                @foreach($language as $key => $lang)
                <div class="col-md-12">
                    <center><h3>{{$lang->judul_language}}</h3></center><br>
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
                @endforeach

                <div class="col-md-12">
                    <br>
                    <button class="btn btn-primary pull-right" type="button" onclick="cek_simpan()">Simpan</button>
                </div>
            </div>
        </form>
        <!-- <form action="#">
        	<div class="image-editor">
        		<input type="file" class="cropit-image-input">
        		<div class="cropit-preview" style="width:1000px; height:667px;"></div>
        		<div class="image-size-label">
        			Resize image
        		</div>
        		<input type="range" class="cropit-image-zoom-input">
        		<input type="hidden" name="image-data" class="hidden-image-data" />
        		<button type="submit">Submit</button>
        	</div>
        </form>

        <div id="result">
        	<code>$form.serialize() =</code>
        	<code id="result-data"></code>
        </div> -->
    </div>
</div>
@endsection

@section('js')

<!-- cropit -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
        var jquery = jQuery.noConflict(true);
    </script> -->
    <script src="{{asset('js/cropit.js')}}"></script>
    <!-- end cropit -->

    <script>
    	
    	$(function() {
    		$('.image-editor').cropit({'minZoom' : 2});

    		$('form').submit(function() {
            // Move cropped image data to hidden input
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);

            // Print HTTP request params
            var formValue = $(this).serialize();
            $('#result-data').text(formValue);

            // Prevent the form from actually submitting
            return false;
        });
    	});

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