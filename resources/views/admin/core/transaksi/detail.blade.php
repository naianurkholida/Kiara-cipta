@extends('component.layouts.master')

@section('content')
<div class="card">
	<div class="card-header">
		<h3>{{ Helper::baseLabelPage() }}</h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<label>Account Payment</label>
				<input type="text" name="account_payment" class="form-control" value="{{$bank->nama_bank}} ({{$bank->kode_bank}})">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label>Nama Program</label>
				<input type="text" name="nama_program" class="form-control" value="{{$program->judul}}">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label>Nama Pengirim</label>
				<input type="text" name="nama_pengirim" class="form-control" value="{{$pay->nama_pengirim}}">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label>Bank Pengirim</label>
				<input type="text" name="bank_pengirim" class="form-control" value="{{$pay->bank_pengirim}}">
			</div>
			<?php 
			$create = date_create($pay->tanggal_konfirmasi);
			$date = date_format($create, 'd F Y');
			?>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label>Tanggal Pembayaran</label>
				<input type="text" name="tgl_konfirmasi" class="form-control" value="{{$date}}">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label>Total</label>
				<input type="text" name="total" class="form-control" value="{{'Rp. '.number_format($pay->total)}}">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<label>Total Submit</label>
				<input type="text" name="total_submit" class="form-control" value="{{'Rp. '.number_format($pay->total_submit)}}">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<label>Bukti Pembayaran</label><br>
				<a href="{{asset('admin/assets/media/img')}}/{{$pay->berkas}}" target="blank"><img src="{{asset('admin/assets/media/img')}}/{{$pay->berkas}}" style="width: 50%;"></a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection