@extends('frontend.component.master')

@section('header')

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Derma Express - {{ $data->getPostingLanguage->judul }}">
<link rel="canonical" href="https://derma-express.com/jurnal/show/{{ $data->getPostingLanguage->seo }}">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/products/show/{{ $data->getPostingLanguage->seo }}" />
<meta property="og:title" content="{{ $data->getPostingLanguage->judul }}" />
<meta property="og:description" content="{{ $data->getPostingLanguage->resume }}" />
<meta property="og:image"
    content="https://derma-express.com/assets/admin/assets/media/posting/500/{{ $data->image }}" />
<meta property="article:publisher" content="https://www.facebook.com/dermaxpress/" />
<meta property="article:tag" content="{{ $data->getPostingLanguage->judul }}" />
<meta property="article:tag" content="Beauty" />
<meta property="article:tag" content="rekomendasi produk" />
<meta property="article:section" content="Beauty &amp; health" />

@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0; padding-top: 0;">
    <div class="breadcrumb-page"
        style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }});">
        <div class="overlay-breadcrumb"></div>
        <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Promo</h2>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('event') }}">Promo</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->getPostingLanguage->judul }}</li>
            </ol>
        </nav>
        <br /><br />
    </div>
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">{{ $data->getPostingLanguage->judul }}</h3>
        </div>
        <div class="container-detail-jurnal">
            <center><img
                    src="{{ asset('assets/admin/assets/media/posting') }}/{{ $data->image }}"
                    alt="{{ $data->getPostingLanguage->judul }}" class="img-header-jurnal"></center>
            <div class="row" style="margin-top: 70px;">
                <div class="col-12">
                    {!! $data->getPostingLanguage->content !!}
                </div>
            </div>
        </div>
    </div>
    <br><br>


    <div id="section-articles" class="section page-section nomargin bgcolor clearfix"
        style="padding-top: 100px;background-color: #f9f9f9 !important;">

        <div class="container">
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <div class="carousel-inner" role="listbox">
                    <h4 style="margin-left: 15px;">Promo Lainnya</h4>
                    <div class="carousel-item active">
                        @foreach($event_lainnya as $item)
                            <div class="col-md-4" style="float:left">
                                <div class="card mb-2" style="height: 320px;">
                                    <img class="card-img-top"
                                        src="{{ asset('assets/admin/assets/media/posting/') }}/{{ $item->image }}"
                                        alt="{{ $item->getPostingLanguage->judul }}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $item->getPostingLanguage->judul }}</h4>
                                        <a href="{{ route('dermaster.event.show', $item->getPostingLanguage->seo) }}"
                                            class="btn btn-success"
                                            style="position: absolute; bottom: 10px; background-color: #28a745; border-color: #28a745;">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
