@extends('frontend.component.master')
@section('header')
<meta name="description" content="Derma Express - Tentang Kami.">
<link rel="canonical" href="https://derma-express.com/profile">


<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/profile" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Profile Derma di Sini." />

<title>Derma Express - Tentang Kami</title>
@endsection
@section('content')
<div class="breadcrumb-page"
    style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }});">
    <div class="overlay-breadcrumb"></div>
    <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Tentang Kami</h2>
</div>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
        </ol>
    </nav>
    <br /><br />
</div>

<div class="container" style="margin-top: 0;padding-left: 80px;padding-right: 90px;">
    {!! $pages->konten_page !!}
    <!-- <div id="carousel-profile" class="owl-carousel owl-theme">
        @foreach($category as $row)
            @foreach($row->getGallery as $val)
                @if($val->embed != Null)
                    <iframe width="100%" height="600px" src="{{ $val->embed }}" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                @else
                    <img src="{{ asset('assets/admin/assets/media/derma_gallery') }}/{{ $val->image }}"
                        style="height: auto; width: 100%;">
                @endif
            @endforeach
        @endforeach
    </div> -->

    <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
        <div class="container clearfix">
            <center>
                <h2>
                    Award
                </h2>
            </center>
        </div>
    </div>

    <div class="container clearfix">
        <center>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/image/award.jpg') }}" class="img-award">
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/image/award-2.jpg') }}" class="img-award">
                </div>
            </div>
        </center>
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
