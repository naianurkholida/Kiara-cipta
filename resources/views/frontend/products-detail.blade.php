@extends('frontend.component.master')

@section('header')

<meta property="og:url" content="https://derma-express.com/products/show/{{$data->getProdukLanguage->seo}}" />
<meta property="og:title" content="{{$data->getProdukLanguage->judul}}" />
<meta property="og:description" content="{{$data->getProdukLanguage->judul}}" />
<meta name="description" content="Product {{$data->getProdukLanguage->judul}} Derma Express">
<meta property="og:image" content="https://derma-express.com/assets/admin/assets/media/derma_produk/500/{{$data->image}}" />
<meta property="og:type" content="article"/>
<link rel="canonical" href="https://derma-express.com/products/show/{{$data->getProdukLanguage->seo}}">
<title>{{$program->judul}}</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">{{$data->getProdukLanguage->judul}}</h3>
        </div>
    </div>
    <div class="container" id="container_luar">
        <div class="container" id="container_dalem">
            <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; padding-top: 0 !important">
                <div class="container" id="container_detail">
                    <div class="row" style="margin-top: 70px;">
                        <div class="col-md-4 col-sm-12">
                            <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px; background-color: #ffffff; background-image: url('{{ asset('assets/admin/assets/media/derma_produk/') }}/{{$data->image}}'); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            {!! $data->getProdukLanguage->deskripsi !!}
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
        $( "#container_luar" ).removeClass("container").addClass("container-fluid");
    } else {
        $( "#container_dalem" ).addClass("container");
        $( "#container_luar" ).removeClass("container-fluid").addClass("container");
    }
</script>
@endsection