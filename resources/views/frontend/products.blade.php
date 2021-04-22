@extends('frontend.component.master')

@section('header')
<meta name="description" content="Products List Derma Express.">
<link rel="canonical" href="https://derma-express.com/products">
<title>Products List Derma Express</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            @if ($category)
            <h3 class="nott ls0">{{$category->category}}</h3>
            @else
            <h3 class="nott ls0">Product</h3>
            @endif
        </div>
    </div>
    <div class="container-flex container">
        @foreach($data as $row)
        <div class="item-bestseller">
            <!-- <div class="box-dokter" style="height: 414px;"> -->
            <div class="img-bestseller" style="height: 414px; border: 3px solid #67b6ab; text-align: center;">
                <div class="img-dokter" style="background-image: url({{ asset('assets/admin/assets/media/derma_produk') }}/{{$row->image}});" alt="{{ asset('assets/admin/assets/media/derma_produk') }}/{{$row->image}}"></div>
                <a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}"><p id="dokter-name">{{ $row->getProdukLanguage->judul }}</p></a>
                <p style="margin-bottom:10 !important;">{!! Helper::removeTags($row->getProdukLanguage->deskripsi) !!}</p>
            </div>
            <div class="overlay-bestseller" style="border: 3px solid #67b6ab;">
                <div class="container-overlay">
                    <div>
                        <?php //$icon = Helper::iconProdukBestSeller($row->id); ?>
                        @foreach($row->getSpec as $val)
                        <img src="{{ asset('assets/admin/assets/media/derma_produk_spec') }}/{{ $val->icon_light }}" alt="" style="width: 50px;">
                        <span>{{ $val->specification }}</span>
                        <br><br>
                        @endforeach
                    </div>
                </div>
                <div class="btn-bestseller-overlay"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: rgb(16, 158, 158) ; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
            </div>
        </div>
        @endforeach
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