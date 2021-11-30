@extends('index')

@section('header_kiri', "Modul Profile")
@section('header_kanan')

@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3>Modul Profile</h3>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<form action="{{Route('modul_profile.post')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="row">
					<div class="col-md-6">
						<label for="">Bahasa</label>
					</div>
					<div class="col-md-6">
						<label for="">Bagian</label>
					</div>


					<div class="col-md-6">
						<select name="" id="bahasa" class="form-control" onchange="ganti_bahasa()">
							@foreach($language as $lang)
							<option value="{{$lang->judul_language}}">{{$lang->judul_language}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						<select name="" id="switcher" class="form-control" onchange="ganti()">
							<option value="0">Semua</option>
							<option value="1">Definisi & Visi Misi</option>
							<!-- <option value="2"></option> -->
							<option value="3">Legalitas</option>
							<option value="4">Kepengurusan</option>
							<option value="5">Sejarah</option>
							<option value="6">Management</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
						<input type="hidden" name="trigger" id="hasil_all_id">
					</div>
				</div>


				<br>

				<div id="definisi">
					@foreach($language as $key => $lang)
					<?php $found = 0; $definisi = ""; $id_definisi = ""; $visi = ""; $id_visi = ""; $misi = ""; $id_misi = ""; ?>
					@if(count($get_definisi) > 0)
					@foreach($get_definisi as $key2 => $def)
					@if($lang->id == $def->id_language)
					<?php $found = 1; $definisi = $def->isi; $id_definisi = $def->id; ?>
					@break							
					@endif
					@endforeach

					@foreach($get_visi as $key3 => $vs)
					@if($lang->id == $vs->id_language)
					<?php $visi = $vs->isi; $id_visi = $vs->id; ?>
					@break							
					@endif
					@endforeach

					@foreach($get_misi as $key4 => $ms)
					@if($lang->id == $ms->id_language)
					<?php $misi = $ms->isi; $id_misi = $ms->id; ?>
					@break							
					@endif
					@endforeach

					@if($found == 1)
					<div id="{{$lang->judul_language}}">
						<div class="row">
							<div class="col-md-12">
								<center><h2>{{$lang->judul_language}}</h2></center>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<center><h4>Kami Mizan Amanah</h4></center>
							</div>
							<div class="col-md-12">
								<table width="100%">
									<tr>
										<td align="center"><b>Definisi</b></td>
									</tr>
									<tr>
										<td>
											<textarea name="definisi[]" id="definisi" cols="30" rows="10" class="form-control" placeholder="Definisi">{{$definisi}}</textarea>
											<input type="hidden" name="id_language[]" value="{{$lang->id}}">
											<input type="hidden" name="id_definisi[]" value="{{$id_definisi}}">
										</td>
									</tr>
								</table>					
							</div>
						</div>

						<br>

						<div class="row" id="visi_misi">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<center><h4>Visi Misi</h4></center>
									</div>
									<div class="col-md-12">
										<label for="">Visi</label>
										<input type="text" class="form-control" name="visi[]" placeholder="Visi" value="{{$visi}}">
										<input type="hidden" name="id_language_visi[]" value="{{$lang->id}}">
										<input type="hidden" name="id_visi[]" value="{{$id_visi}}">
									</div>
								</div>

								<br>

								<div class="row">
									<div class="col-md-6">
										<label for="">Misi</label>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_misi()">
											<i class="flaticon-plus"></i>
										</button>
									</div>
								</div>

								<br>
								
								<div class="row" id="misi">
									<div class="col-md-11">
										<input type="text" name="misi[]" class="form-control" placeholder="Misi" value="{{$misi}}">
										<input type="hidden" name="id_language_misi[]" value="{{$lang->id}}">
										<input type="hidden" name="id_misi[]" value="{{$id_misi}}">
									</div>
									<div class="col-md-1">
										<!-- <button type="button" class="btn btn-sm btn-danger">hapus</button> -->
										<a href="{{Route('modul_profile.delete_misi', $id_misi)}}" class="btn btn-sm btn-danger pull-right" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					@else
					<div id="{{$lang->judul_language}}">
						<div class="row">
							<div class="col-md-12">
								<center><h2>{{$lang->judul_language}}</h2></center>
							</div>
						</div>

						<div class="row" id="definisi">
							<div class="col-md-12">
								<center><h4>Kami Mizan Amanah</h4></center>
							</div>
							<div class="col-md-12">
								<table width="100%">
									<tr>
										<td align="center"><b>Definisi</b></td>
									</tr>
									<tr>
										<td>
											<textarea name="definisi[]" id="definisi" cols="30" rows="10" class="form-control" placeholder="Definisi"></textarea>
											<input type="hidden" name="id_language[]" value="{{$lang->id}}">
										</td>
									</tr>
								</table>					
							</div>
						</div>

						<br>

						<div class="row" id="visi_misi">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<center><h4>Visi Misi</h4></center>
									</div>
									<div class="col-md-12">
										<label for="">Visi</label>
										<input type="text" class="form-control" name="visi[]" placeholder="Visi">
										<input type="hidden" name="id_language_visi[]" value="{{$lang->id}}">
									</div>
								</div>

								<br>

								<div class="row">
									<div class="col-md-6">
										<label for="">Misi</label>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_misi()">
											<i class="flaticon-plus"></i>
										</button>
									</div>
								</div>

								<br>

								<div class="row" id="misi">
									<div class="col-md-11">
										<input type="text" name="misi[]" class="form-control" placeholder="Misi">
										<input type="hidden" name="id_language_misi[]" value="{{$lang->id}}">
									</div>
									<div class="col-md-1">
										<button type="button" class="btn btn-sm btn-danger pull-right">hapus</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>

				<br>
				<center><h3>Komponen Lainya</h3></center>
				<br>

				<div class="row" id="legalitas">
					<div class="col-md-12">
						<center><h4>Legalitas</h4></center>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<label for="">Legalitas</label>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_legalitas()">
									<i class="flaticon-plus"></i>
								</button>
							</div>
						</div>

						<br>

						<div class="row" id="legalitas">
							@if(count($legalitas) > 0)
							@foreach($legalitas as $key => $value)
							<div class="col-md-11">
								<input type="text" name="legalitas[]" class="form-control" placeholder="Legalitas" value="{{$value->isi}}">
								<input type="hidden" name="id_legalitas[]" value="{{$value->id}}">
							</div>
							<div class="col-md-1">
								<a href="{{Route('modul_profile.delete_legalitas', $value->id)}}" class="btn btn-sm btn-danger pull-right" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
							</div>
							@endforeach
							@else
							<div class="col-md-11">
								<input type="text" name="legalitas[]" class="form-control" placeholder="Legalitas">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-sm btn-danger pull-right">hapus</button>
							</div>
							@endif
						</div>
					</div>
				</div>

				<br>

				<div class="row" id="kepengurusan">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<center><h4>Kepengurusan</h4></center>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="">Dewan Pembina</label>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_dewan_pembina()">
									<i class="flaticon-plus"></i>
								</button>
							</div>
						</div>
						
						<br>

						<div class="row" id="dewan_pembina">
							@if(count($dewan_pembina) > 0)
							@foreach($dewan_pembina as $key => $value)
							<div class="col-md-11">
								<input type="text" name="dewan_pembina[]" class="form-control" placeholder="Dewan Pembina" value="{{$value->nama}}">
								<input type="hidden" name="id_dewan_pembina[]" value="{{$value->id}}">
							</div>
							<div class="col-md-1">
								<!-- <button type="button" class="btn btn-sm btn-danger">hapus</button> -->
								<a href="{{Route('modul_profile.delete_dewan_pembina', $value->id)}}" class="btn btn-sm btn-danger pull-right" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
							</div>
							@endforeach
							@else
							<div class="col-md-11">
								<input type="text" name="dewan_pembina[]" class="form-control" placeholder="Dewan Pembina">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-sm btn-danger pull-right">hapus</button>
							</div>
							@endif
						</div>

						<br>

						<div class="row">
							<div class="col-md-6">
								<label for="">Pengawas Syariah</label>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_pengawas_syariah()">
									<i class="flaticon-plus"></i>
								</button>
							</div>
						</div>

						<br>

						<div class="row" id="pengawas_syariah">
							@if(count($pengawas_syariah) > 0)
							@foreach($pengawas_syariah as $key => $value)
							<div class="col-md-11">
								<input type="text" name="pengawas_syariah[]" class="form-control" placeholder="Dewan Pembina" value="{{$value->nama}}">
								<input type="hidden" name="id_pengawas_syariah[]" value="{{$value->id}}">
							</div>
							<div class="col-md-1">
								<!-- <button type="button" class="btn btn-sm btn-danger">hapus</button> -->
								<a href="{{Route('modul_profile.delete_pengawas_syariah', $value->id)}}" class="btn btn-sm btn-danger pull-right" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
							</div>
							@endforeach
							@else
							<div class="col-md-11">
								<input type="text" name="pengawas_syariah[]" class="form-control" placeholder="Pengawas Syariah">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-sm btn-danger pull-right">hapus</button>
							</div>
							@endif
						</div>

						<br>

						<div class="row">
							<div class="col-md-6">
								<label for="">Pengawas</label>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_pengawas()">
									<i class="flaticon-plus"></i>

								</button>
							</div>
						</div>

						<div class="row" id="pengawas">
							@if(count($pengawas) > 0)
							@foreach($pengawas as $key => $value)
							<div class="col-md-11">
								<input type="text" name="pengawas[]" class="form-control" placeholder="Dewan Pembina" value="{{$value->nama}}">
								<input type="hidden" name="id_pengawas[]" value="{{$value->id}}">
							</div>
							<div class="col-md-1">
								<!-- <button type="button" class="btn btn-sm btn-danger">hapus</button> -->

								<a href="{{Route('modul_profile.delete_pengawas', $value->id)}}" class="btn btn-sm btn-danger pull-right" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
							</div>
							@endforeach
							@else
							<div class="col-md-11">
								<input type="text" name="pengawas[]" class="form-control" placeholder="Pengawas">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-sm btn-danger pull-right">hapus</button>
							</div>
							@endif
						</div>

						<br>

						<div class="row">
							<div class="col-md-6">
								<label for="">Direksi</label>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_direksi()">
									<i class="flaticon-plus"></i>
								</button>
							</div>
						</div>

						<br>

						<div class="row" id="direksi">
							@if(count($direksi) > 0)
							@foreach($direksi as $key => $value)
							<div class="col-md-11">
								<input type="text" name="direksi[]" class="form-control" placeholder="Dewan Pembina" value="{{$value->nama}}">
								<input type="hidden" name="id_direksi[]" value="{{$value->id}}">
							</div>
							<div class="col-md-1">
								<!-- <button type="button" class="btn btn-sm btn-danger">hapus</button> -->

								<a href="{{Route('modul_profile.delete_direksi', $value->id)}}" class="btn btn-sm btn-danger pull-right" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
							</div>
							@endforeach
							@else
							<div class="col-md-11">
								<input type="text" name="direksi[]" class="form-control" placeholder="Direksi">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-sm btn-danger pull-right">hapus</button>
							</div>
							@endif
						</div>
					</div>
				</div>

				<br>

				<div class="row" id="sejarah">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<center><h4>Sejarah</h4></center>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="">Sejarah</label>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_sejarah()">
									<i class="flaticon-plus"></i>
								</button>
							</div>
						</div>

						<br>

						<div class="row" id="sejarah_field">
							@if(count($sejarah) > 0)
							@foreach($sejarah as $key => $value)
							<div class="col-md-9">
								<input type="text" name="sejarah[]" class="form-control" placeholder="Sejarah" value="{{$value->sejarah}}">
								<input type="hidden" name="id_sejarah[]" value="{{$value->id}}">
							</div>
							<div class="col-md-2">
								<input type="text" name="tahun_sejarah[]" class="form-control" placeholder="Tahun" value="{{$value->tahun}}">
							</div>
							<div class="col-md-1">
								<!-- <button type="button" class="btn btn-sm btn-danger">hapus</button> -->
								
								<a href="{{Route('modul_profile.delete_sejarah', $value->id)}}" class="btn btn-sm btn-danger pull-right" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
							</div>
							@endforeach
							@else
							<div class="col-md-9">
								<input type="text" name="sejarah[]" class="form-control" placeholder="Sejarah">
							</div>
							<div class="col-md-2">
								<input type="text" name="tahun_sejarah[]" class="form-control" placeholder="Tahun">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-sm btn-danger pull-right">hapus</button>
							</div>
							@endif
						</div>
					</div>
				</div>

				<br>

				<div class="row" id="management">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<center><h4>Management</h4></center>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="">Management</label>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn btn-sm btn-success pull-right" onclick="tambah_management()">
									<i class="flaticon-plus"></i>
								</button>
							</div>
						</div>

						<br>
						
						<div class="row">
							<div class="col-md-12" id="management">
								@if(count($kepengurusan) > 0)
								@foreach($kepengurusan as $key => $value)
								<table width="100%">
									<tr>
										<td width="40%">
											<input type="text" name="nama[]" class="form-control" placeholder="Nama" value="{{$value->nama}}">
											<input type="hidden" name="id_kepengurusan[]" value="{{$value->id}}">
										</td>
										<td width="25%">
											<input type="text" name="jabatan_management[]" class="form-control" placeholder="Jabatan" value="{{$value->jabatan}}">
										</td>
										<td width="25%">
											<input type="file" name="foto[]" class="form-control" placeholder="foto">
										</td>
										<td width="10%" align="center">
											<!-- <button type="button" class="btn btn-sm btn-danger">hapus</button> -->

											<a href="{{Route('modul_profile.delete_kepengurusan', $value->id)}}" class="btn btn-sm btn-danger pull-right" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
										</td>
									</tr>
								</table>
								@endforeach
								@else
								<table width="100%">
									<tr>
										<td width="40%">
											<input type="text" name="nama[]" class="form-control" placeholder="Nama">
										</td>
										<td width="25%">
											<input type="text" name="jabatan_management[]" class="form-control" placeholder="Jabatan">
										</td>
										<td width="25%">
											<input type="file" name="foto[]" class="form-control" placeholder="foto">
										</td>
										<td width="10%" align="center">
											<button type="button" class="btn btn-sm btn-danger pull-right">hapus</button>
										</td>
									</tr>
								</table>
								@endif
							</div>
						</div>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.5/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.5/js/froala_editor.pkgd.min.js"></script>

<script>
	$(document).ready(function(){
		var editor = new FroalaEditor('textarea', {
			height: 300
		})
	});

	function cek_bahasa(){
		var trigger = $("#all_id:checked").length
		if (trigger > 0) {
			$("#hasil_all_id").val(1)
		}else{
			$("#hasil_all_id").val(0)
		}
	}

	function ganti_bahasa(){
		var bahasa = $("#bahasa").val()
		console.log(bahasa)
		var lang = <?=$language?>;
		lang.forEach(function (item, index){
			$("#"+item.judul_language).hide()
			console.log(bahasa == item.judul_language, $("#"+item.judul_language).html())
			if(bahasa == item.judul_language){
				$("#"+item.judul_language).show()
			}else{
				$("#"+item.judul_language).hide()
			}
		})
	}

	function ganti(){
		var switcher = $("#switcher").val()

		if(switcher == 1){
			$("#definisi").show()
			$("#visi_misi").hide()
			$("#legalitas").hide()
			$("#kepengurusan").hide()
			$("#sejarah").hide()
			$("#management").hide()
		}else if(switcher == 2){
			$("#definisi").hide()
			$("#visi_misi").show()
			$("#legalitas").hide()
			$("#kepengurusan").hide()
			$("#sejarah").hide()
			$("#management").hide()
		}else if(switcher == 3){
			$("#definisi").hide()
			$("#visi_misi").hide()
			$("#legalitas").show()
			$("#kepengurusan").hide()
			$("#sejarah").hide()
			$("#management").hide()
		}else if(switcher == 4){
			$("#definisi").hide()
			$("#visi_misi").hide()
			$("#legalitas").hide()
			$("#kepengurusan").show()
			$("#sejarah").hide()
			$("#management").hide()
		}else if(switcher == 5){
			$("#definisi").hide()
			$("#visi_misi").hide()
			$("#legalitas").hide()
			$("#kepengurusan").hide()
			$("#sejarah").show()
			$("#management").hide()
		}else if(switcher == 6){
			$("#definisi").hide()
			$("#visi_misi").hide()
			$("#legalitas").hide()
			$("#kepengurusan").hide()
			$("#sejarah").hide()
			$("#management").show()
		}else if(switcher == 0){
			$("#definisi").show()
			$("#visi_misi").show()
			$("#legalitas").show()
			$("#kepengurusan").show()
			$("#sejarah").show()
			$("#management").show()
		}
	}

	function tambah_misi(){
		$("#misi").append(`
			<div class="col-md-11">
			<input type="text" name="misi[]" class="form-control" placeholder="Misi">
			</div>
			<div class="col-md-1">
			<button type="button" class="btn btn-sm btn-danger">hapus</button>
			</div>
			`)
	}

	function tambah_legalitas(){
		$("#legalitas").append(`
			<div class="col-md-11">
			<input type="text" name="legalitas[]" class="form-control" placeholder="Legalitas">
			</div>
			<div class="col-md-1">
			<button type="button" class="btn btn-sm btn-danger">hapus</button>
			</div>
			`)
	}

	function tambah_dewan_pembina(){
		$("#dewan_pembina").append(`
			<div class="col-md-11">
			<input type="text" name="dewan_pembina[]" class="form-control" placeholder="Dewan Pembina">
			</div>
			<div class="col-md-1">
			<button type="button" class="btn btn-sm btn-danger">hapus</button>
			</div>
			`)
	}

	function tambah_pengawas_syariah(){
		$("#pengawas_syariah").append(`
			<div class="col-md-11">
			<input type="text" name="pengawas_syariah[]" class="form-control" placeholder="Pengawas Syariah">
			</div>
			<div class="col-md-1">
			<button type="button" class="btn btn-sm btn-danger">hapus</button>
			</div>
			`)
	}

	function tambah_pengawas(){
		$("#pengawas").append(`
			<div class="col-md-11">
			<input type="text" name="pengawas[]" class="form-control" placeholder="Pengawas">
			</div>
			<div class="col-md-1">
			<button type="button" class="btn btn-sm btn-danger">hapus</button>
			</div>
			`)
	}

	function tambah_direksi(){
		$("#direksi").append(`
			<div class="col-md-11">
			<input type="text" name="direksi[]" class="form-control" placeholder="Direksi">
			</div>
			<div class="col-md-1">
			<button type="button" class="btn btn-sm btn-danger">hapus</button>
			</div>
			`)
	}

	function tambah_sejarah(){
		$("#sejarah_field").append(`
			<div class="col-md-9">
			<input type="text" name="sejarah[]" class="form-control" placeholder="Sejarah">
			</div>
			<div class="col-md-2">
			<input type="text" name="tahun_sejarah[]" class="form-control" placeholder="Tahun">
			</div>
			<div class="col-md-1">
			<button type="button" class="btn btn-sm btn-danger">hapus</button>
			</div>
			`)
	}

	function tambah_management(){
		$("#management").append(`
			<table width="100%">
			<tr>
			<td width="40%">
			<input type="text" name="nama[]" class="form-control" placeholder="Nama">
			</td>
			<td width="25%">
			<input type="text" name="jabatan_management[]" class="form-control" placeholder="Jabatan">
			</td>
			<td width="25%">
			<input type="file" name="foto[]" class="form-control" placeholder="foto">
			</td>
			<td width="10%" align="center">
			<button type="button" class="btn btn-sm btn-danger">hapus</button>
			</td>
			</tr>
			</table>
			`)
	}
</script>
@endsection