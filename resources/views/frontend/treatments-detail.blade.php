{{-- @extends('frontend.component.master_product_and_treatment') --}}
@extends('frontend.component.master')

@section('header')
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Derma Express - {{$data->getTreatmentLanguage->judul}}">
<link rel="canonical" href="https://derma-express.com/jurnal/show/{{$data->getTreatmentLanguage->seo}}">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/products/show/{{$data->getTreatmentLanguage->seo}}" />
<meta property="og:title" content="{{$data->getTreatmentLanguage->judul}}" />
<meta property="og:description" content="{{$data->getTreatmentLanguage->resume}}" />
<meta property="og:image"
    content="https://derma-express.com/assets/admin/assets/media/derma_treatment/500/{{$data->image}}" />
<meta property="article:publisher" content="https://www.facebook.com/dermaxpress/" />
<meta property="article:tag" content="{{$data->getTreatmentLanguage->judul}}" />
<meta property="article:tag" content="Beauty" />
<meta property="article:tag" content="rekomendasi produk" />
<meta property="article:section" content="Beauty &amp; health" />

<title>Derma Express - {{ $data->getTreatmentLanguage->judul }}</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0; padding-top: 0;">
    <div class="breadcrumb-page" style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }});">
        <div class="overlay-breadcrumb"></div>
        <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Treatments</h2>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" style="font-size: 8px !important;"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item" style="font-size: 8px !important;"><a href="{{ url('treatments') }}">Treatments</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$data->getTreatmentLanguage->judul}}</li>
            </ol>
        </nav>
        <br /><br />
    </div>
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">{{$data->getTreatmentLanguage->judul}}</h3>
        </div>
    </div>
    <div class="container" id="container_luar">
        <div class="container" id="container_dalem">
            @include('frontend.component.layouts.item-detail-treatments', ['related' => 'getTreatmentLanguage', 'column'
            => 'deskripsi','image' => $data->image])
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    if (window.matchMedia('(max-width: 425px)')) {
        $("#container_dalem").removeClass("container");
        $("#container_luar").removeClass("container").addClass("container-fluid");
        $("#container_detail").removeClass("container");
    } else {
        $("#container_dalem").addClass("container");
        $("#container_detail").addClass("container");
        $("#container_luar").removeClass("container-fluid").addClass("container");
    }

</script>
@endsection
