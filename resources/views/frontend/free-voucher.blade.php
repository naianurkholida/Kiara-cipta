@extends('frontend.component.master')
@section('header')
<meta name="description" content="Profil Derma Express - A Company by Dermaster Clinic.">
<link rel="canonical" href="https://derma-express.com/free-voucher">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/free-voucher" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Profile Derma di Sini." />

<title>Derma Express - A Company by Dermaster Clinic</title>
@endsection

@section('content')
<div class="breadcrumb-page"
    style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }});">
    <div class="overlay-breadcrumb"></div>
    <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Free Voucher</h2>
</div>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="font-size: 8px !important;"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" style="font-size: 8px !important;" aria-current="page">Free Voucher</li>
        </ol>
    </nav>
    <br /><br />
</div>

<div class="container" style="margin-top: 0;padding-left: 80px;padding-right: 90px;">
    <div>
        <h4>
            Thankyou for sharing your experience, please enjoy your free treatment as a form of our appreciation.
        </h4>
    </div>
    <div style="margin-top: 20px;">
        <center>
		    <div class="card card-responsive text-center" style="">
				<div class="card-body" style="background-image: url('/assets/image/unsatisfied-voucher-ok.jpg'); background-size: cover; border-radius: 10px;">   
                    @if($voucher)
					<h3 class="name-customer" id="name_customer" style="font-size: 12px !important;">{{ $voucher[0][0] }}</h3>
                    <?php 
                    $dateTrans = substr(str_replace('T', ' ', $voucher[0][1]), 0,19);
                    $date = date('d M Y', strtotime($dateTrans));
                    ?>
					<h3 class="id-customer" id="id_customer" style="font-size: 12px !important;">{{ $date }}</h3>
                    @endif
	    		</div>
			</div>
		</center>
    </div>
    <div style="margin-top: 20px;">
        <h5>Terms and Conditions</h5>
        <div>
            <ol style="margin-left: 19px;">
                <li>Voucher tidak dapat diuangkan</li>
                <li>Voucher hanya berlaku 2 bulan sejak melakukan pengisian form</li>
                <li>Voucher hanya berlaku satu kali</li>
                <li>Voucher tidak dapat digabungkan dengan promo lain</li>
                <li>Voucher tidak dapat digunakan bersamaan dengan voucher lain</li>
                <li>Tidak ada minimal transaksi untuk penggunaan voucher ini</li>
                <li>Voucher dapat digunakan di semua klinik</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    if (window.matchMedia('(max-width: 425px)')) {
        $("#container_dalem").removeClass("container");
        $("#container_luar").removeClass("container").addClass("container-fluid");
        $("#text-content").css("width", "100%");
        $("#img-content").css("width", "100%");
    } else {
        $("#container_dalem").addClass("container");
        $("#container_luar").removeClass("container-fluid").addClass("container");
    }
</script>
@endsection
