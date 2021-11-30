@extends('component.layouts.master')

@section('button')
	<a href="{{Route('gallery.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h4><i class="flaticon-plus"></i> {{ Helper::baseLabelPage() }}</h4>
	</div>
	<div class="card-body">
	<form action="{{Route('gallery.update', $gallery->id)}}" method="POST" enctype="multipart/form-data" id="form_menu">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12">
					<label>Kategori Gallery</label>
					<select class="form-control" name="kategori_produk" required="">
						<option value="" selected="" disabled="">- Kategori -</option>
						@foreach($category as $key => $val)
							<option value="{{$val->id}}" {{ $gallery->id_category == $val->id ? 'selected' : '' }}>{{$val->category}}</option>
						@endforeach
					</select>
				</div>

				<div class="col-lg-6" style="margin-top: 10px">
				<label>Type</label>
					<label class="kt-option">
						<span class="kt-option__control">
							<span class="kt-radio">
								<input type="radio" name="option" value="image" {{ $gallery->embed == NULL ? 'checked' : '' }} onclick="changeType('image')">
								<span></span>
							</span>
						</span>
						<span class="kt-option__label">
							<span class="kt-option__head">
								<span class="kt-option__title">
									Image
								</span>
								<span class="kt-option__focus">
									jpg, png, jpeg.
								</span>
							</span>
							<span class="kt-option__body">
								Select to add the image to the gallery. This type is the default type that is set by the system
							</span>
						</span>
					</label>
				</div>
				<div class="col-lg-6" style="margin-top: 10px">
					<label>&nbsp;</label>
					<label class="kt-option">
						<span class="kt-option__control">
							<span class="kt-radio">
								<input type="radio" name="option" value="video" {{ $gallery->embed != NULL ? 'checked' : '' }} onclick="changeType('video')">
								<span></span>
							</span>
						</span>
						<span class="kt-option__label">
							<span class="kt-option__head">
								<span class="kt-option__title">
									Video
								</span>
								<span class="kt-option__focus">
									link
								</span>
							</span>
							<span class="kt-option__body">
								Select to add the video to the gallery. the system will change the type to image if the link is not filled.
							</span>
						</span>
					</label>
				</div>

				<div class="col-lg-12" id="image">
					<label>Gambar</label><br>
					<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1" style="width: 100%; height: 300px;">
						<div class="kt-avatar__holder" style="width: 100%; height:300px; background-image: url({{ asset('assets/admin/assets/media/derma_gallery') }}/{{ $gallery->image  }})"></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input type="file" name="image" accept=".png, .jpg, .jpeg">
						</label>
						<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>

				<div class="col-lg-12" id="link">
					<div class="form-group">
						<label for="document">Link</label>
						<input type="text" class="form-control" placeholde="https://www.youtube.com/embed/....." name="link" value="{{ $gallery->embed }}" required="">
					</div>
				</div>
			</div>

			<br>

			<div class="kt-portlet__foot">
				<div class="kt-form__actions">
				<button type="button" class="btn btn-info" onclick="simpan()">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">

	function simpan() {

		var validation = 0;
        var validationText = "";


        // if($("#penggagas").val()==''){ validation++; validationText = validationText + "Penggagas tidak boleh kosong\n"; }
        // if($("#gambar").val()==''){ validation++; validationText = validationText + "Gambar tidak boleh kosong\n"; }

        if(validation>0){
        	alert(validationText);
        }else{
        	$('#form_menu').submit();
        }
	}

	function cek_bahasa(){
		var trigger = $("#all_id:checked").length
		if (trigger > 0) {
			$("#hasil_all_id").val(1)
		}else{
			$("#hasil_all_id").val(0)
		}
	}

	var rupiah = document.getElementById('dana_target');
	rupiah.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value, 'Rp. ');
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

	var rupiah_1 = document.getElementById('dana_terkumpul');
	rupiah_1.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah_1.value = formatRupiah_1(this.value, 'Rp. ');
	});

	/* Fungsi formatRupiah */
	function formatRupiah_1(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>
@endsection