@extends('frontend.component.master')

@section('header')
<meta name="description" content="Derma Express, klinik kecantikan dengan dokter dan layanan estetika terbaik di Indonesia.">

<link rel="canonical" href="http://derma-express.com/">

<title>Dashboard</title>
@endsection

@section('content')

@include('frontend.component.layouts.slider')

@include('frontend.component.layouts.welcome')

@include('frontend.component.layouts.treatment')

@include('frontend.component.layouts.bestseller')

<div class="pop-container">
    <div class="box-pop">
        <div class="close-pop">X</div>
        <div class="img-pop" style="background-image: url({{ Helper::iklan() }})"></div>
    </div>
</div>

@endsection