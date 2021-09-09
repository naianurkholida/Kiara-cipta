@extends('frontend.component.master')

@section('header')
<link rel="canonical" href="https://derma-express.com/">
<meta name="description" content="Derma Express, klinik kecantikan dengan dokter dan layanan estetika terbaik di Indonesia.">
<meta name="facebook-domain-verification" content="7gok7ljicai2ven06osijpt0ide58a" />
<title>Klinik Kecantikan dengan Dokter dan Layanan Estetika Terbaik di Indonesia.</title>
@endsection

@section('content')

@include('frontend.component.layouts.slider')

@include('frontend.component.layouts.welcome')

@include('frontend.component.layouts.treatment')

@include('frontend.component.layouts.bestseller')

@include('frontend.component.layouts.slider_product')

<div class="pop-container">
    <div class="box-pop">
        <div class="close-pop">X</div>
        <img src="{{ Helper::iklan() }}" style="border-radius: 20px;">
        <!-- <div class="img-pop" style="background-image: url({{ Helper::iklan() }})"></div> -->
    </div>
</div>

@endsection