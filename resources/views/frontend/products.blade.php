@extends('frontend.component.master')

@section('header')
<meta name="description" content="Products List Derma Express.">

<link rel="canonical" href="http://derma-express.com/products">

<title>Products List Derma Express</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">Product</h3>
        </div>
    </div>
    <div class="container">
        <div class="container" id="container_dalem">
            <div class="row">
                @foreach($data as $row)
                    <div class="col-md-3" style="text-align: center;margin-bottom: 20px;">
                        <div class="box-dokter" style="height: 414px; !important;">
                            <div class="img-dokter" style="background-image: url({{ $row->getFirstMediaUrl('produk') }});"></div>
                            <a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}"><p id="dokter-name">{{ $row->getProdukLanguage->judul }}</p></a>
                            <p style="margin-bottom:10 !important;">{!! Helper::removeTags($row->getProdukLanguage->deskripsi) !!}</p>
                        </div>
                    </div>
                @endforeach
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
    </script>
@endsection