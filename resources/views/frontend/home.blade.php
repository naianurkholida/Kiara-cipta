@extends('frontend.component.master')

@section('header')
<link rel="canonical" href="https://derma-express.com/">
<meta name="description" content="Derma Express, klinik kecantikan dengan dokter dan layanan estetika terbaik di Indonesia.">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="klinik kecantikan dengan dokter dan layanan estetika terbaik di Indonesia." />

<title>Derma Express , Klinik Kecantikan dengan Dokter dan Layanan Estetika Terbaik di Indonesia.</title>
@endsection

@section('content')

@include('frontend.component.layouts.slider')

@include('frontend.component.layouts.welcome')

@include('frontend.component.layouts.treatment')

@include('frontend.component.layouts.bestseller')

<div class="pop-container">
    <div class="box-pop">
        <div class="close-pop">X</div>
        <img src="{{ Helper::iklan() }}" style="border-radius: 20px;">
        <!-- <div class="img-pop" style="background-image: url({{ Helper::iklan() }})"></div> -->
    </div>
</div>

@endsection