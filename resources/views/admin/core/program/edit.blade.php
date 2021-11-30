@extends('component.layouts.master')

@section('button')
	<a href="{{Route('program.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')

<div class="card">
	<div class="card-header">
		<h4>Edit {{ Helper::baseLabelPage() }}</h4>
	</div>
	<div class="card-body">
		<form action="{{Route('program.update', $program->id)}}" method="POST" id="form_menu" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-6">
					<label>Penggagas</label>
					<input type="text" name="penggagas" class="form-control" value="{{$program->penggagas}}" id="penggagas">
				</div>
				<div class="col-lg-6">
					<label>Tanggal</label>
					<input type="text" name="tanggal" class="form-control" value="{{$program->tanggal}}" id="tanggal" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Kosongkan Jika Program Tidak Ada Waktu Batasan"><br>
				</div>
				<div class="col-lg-6">
					<label>Dana Target</label>
					<input type="text" name="dana_target" class="form-control" id="dana_target" value="{{'Rp. '.number_format($program->dana_target,0,',','.')}}" placeholder="Kosongkan Jika Dana Tidak Ada Batasan">
				</div>
				<div class="col-lg-6">
					<label>Kategori Program</label>
					<select class="form-control" name="kategori_program">
						<option value="" selected="" disabled="">- Kategori -</option>
						@foreach($category as $key => $val)

						<?php if($val->id == $program->id_category){ 
							$selected = 'selected="selected"'; 
						}else{ 
							$selected = ''; 
						} 
						?>

						<option value="{{$val->id}}" <?= $selected ?>>{{$val->category}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-12">
					<label>Gambar</label><br>
					<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
						<div class="kt-avatar__holder" style="width: 300px; height:300px; background-image: url({{asset('admin/assets/media/foto-program/500')}}/{{$program->foto}});"></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input type="file" name="foto" accept=".png, .jpg, .jpeg">
						</label>
						<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
							<i class="fa fa-times"></i>
						</span>
					</div>
				</div>
				<div class="col-md-12">
					<hr>
					<input type="checkbox" onchange="cek_bahasa()" id="all_id"> <label style="font-weight: bold;">Bahasa Indonesia Semua</label>
					<input type="hidden" name="trigger" id="hasil_all_id">
					<hr>
				</div>
			</div>
			<?php $found = 0; $judul = ""; $content; $idl = "";?>
			@foreach($language as $key => $lang)
			@foreach($produk_language as $key2 => $pl)
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
					<textarea id="content[<?=$key?>]" name="deskripsi[]" id="" class="summernote" id="kt_summernote_1">{{$content}}</textarea>
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
					<textarea id="content[<?=$key?>]" name="deskripsi[]" id="" class="summernote" id="kt_summernote_1"></textarea>
				</div>
			</div>
			@endif
			@endforeach
			<div class="row">
				<div class="col-lg-12">
					<button type="submit" class="btn btn-info" id="simpan">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('admin/assets/js/demo5/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>
<script type="text/javascript">

	function simpan() {
		var validation = 0;
        var validationText = "";

        if($("#penggagas").val()==''){ validation++; validationText = validationText + "Penggagas tidak boleh kosong\n"; }
        if($("#tanggal").val()==''){ validation++; validationText = validationText + "Tanggal tidak boleh kosong\n"; }
        if($("#gambar").val()==''){ validation++; validationText = validationText + "Email tidak boleh kosong\n"; }\        if(validation>0){
        	alert(validationText);
        }else{
        	alert('Berhasil Menyimpan')
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