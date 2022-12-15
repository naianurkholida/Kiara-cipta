@extends('frontend.component.master')

@section('header')
<meta name="description" content="Privacy Policy Derma Express.">
<link rel="canonical" href="https://derma-express.com/privacy_policy">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/privacy_policy" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Privacy Police" />

<title>Privacy Policy</title>
@endsection

@section('content')
<div class="breadcrumb-page"
    style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }});">
    <div class="overlay-breadcrumb"></div>
    <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Privacy Policy</h2>
</div>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
        </ol>
    </nav>
    <br /><br />
</div>
<div class="container" style="margin-top: 0;padding-left: 100px;padding-right: 110px;">

    <div class="section nobg nobottommargin clearfix" style="margin-top: 0; padding-top: 0;">

        @include('component.alert.global')
        <div class="container-kontak">
            <div class="box-kontak">
                {!! $content->konten_page !!}
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script>
    if (window.matchMedia('(max-width: 425px)')) {
        $("#container_dalem").removeClass("container");
    } else {
        $("#container_dalem").addClass("container");
    }

</script>
@endsection
