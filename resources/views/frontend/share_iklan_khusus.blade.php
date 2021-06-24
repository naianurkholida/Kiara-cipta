@extends('frontend.component.master')

<meta name="description" content="Promo Derma Express">
<link rel="canonical" href="https://derma-express.com/share/update/iklan/diskon">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/share/update/iklan/diskon" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Promo Iklan Apa Aja Nih yang Ada di Derma Express." />
<!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
<style type="text/css">
.modal-dialog {
	width: 80% !important;
	height: 50% !important;
	margin: 0;
	padding: 0;
	max-width: 80% !important;
	padding: 0px !important;
	margin-top: 10% !important;
}

.modal-content {
	height: auto;
	min-height: 50% !important;
	border-radius: 0;
}

@media (max-width: 576px){
	.modal-show {
		padding: 0px !important;
	}

	.modal-dialog {
		margin-left: auto !important;
		margin-right: auto !important;
		margin-bottom: 50px !important;
		margin-top: 50px !important;
	}

	.img-set {
		height: auto !important;
	}

	.text-set {
		font-size: 12px !important;
	}
}
</style>

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0px; padding-top: 10px;">

	<div class="container">
		<div class="container" id="container_dalem">
			<div class="row">
				<div class="col-lg-12">
					<img src="{{ asset('assets/admin/assets/media/posting/') }}/{{$info_desc->image}}" id="popup_iklan">
				</div>
			</div>
		</div>
	</div>

	<div class="modal" tabindex="-1" id="iklan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<img src="{{ asset('assets/admin/assets/media/posting/') }}/{{$info_desc->image}}" style="width: 100%; height: 380px;" class="img-set">
						</div>

						<div class="col-lg-6">
							<h2 class="text-center" style="margin: 30px;">{{ $info_desc->judul }}</h2>
							<div class="text-set" style="text-align: center; margin: 30px;"> {!! $info_desc->content !!} </div>

							<div class="input-group mb-3" style="margin-top: 20px; height: 50px;">
								<input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" style="height: 50px; margin-left: 30px;" required="" id="email">
								<div class="input-group-append">
									<button onclick="sendEmail()" class="btn btn-outline-success" type="button" style="margin-right: 30px;">Send</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>

	if (window.matchMedia('(max-width: 425px)'))
	{
		$( "#container_dalem" ).removeClass("container");
	} else {
		$( "#container_dalem" ).addClass("container");
	}

	$(document).ready(function() {
		setTimeout(function(){ 
			$('#iklan').modal('show')
		}, 3000);

		$('#popup_iklan').click(function(){
			$('#iklan').modal('show')
		})
	});

	function sendEmail() {
		var email = $('#email').val();

		if(email == null || email == ''){
			$.notify("Email is Required", 'error');
		}else{

			$.ajax({
				url: 'http://103.11.135.246:1506/subscribe?email='+email,
				type: 'POST',
				dataType: 'json',
			})
			.done(function(res) {
				$.notify("Email Berhasil di Kirim", 'success');
			});
		}
	}
</script>
@endsection