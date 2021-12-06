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
            
            <h3 class="nott ls0">Promo Event</h3>
            
        </div>
    </div>
    <div class="container-flex container">
        <div class="box-bestseller">
            @foreach($data as $row)
            <div class="item-bestseller">
                <div class="img-bestseller" style="background-image: url({{ asset('assets/admin/assets/media/derma_produk') }}/{{$row->image}}); padding: 8px;" alt="{{ asset('assets/admin/assets/media/derma_produk') }}/{{$row->image}}">
                    <p id="badge-product" style="
                    border-radius: 4px; 
                    background-color: #67b6ab; 
                    color: white;
                    padding: 8px;
                    width: fit-content;">
                    {{ $row->label }}
                </p>
                </div>
                <div class="btn-bestseller" style="border-radius: 6px;"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: white; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
                <div class="overlay-bestseller" style="border: 3px solid #67b6ab; background-color: rgb(0 128 128 / 95%);">
                    <div class="container-overlay">
                        <div>
                            @foreach($row->getSpec as $val)
                            <img src="{{ asset('assets/admin/assets/media/derma_produk_spec') }}/{{ $val->icon_light }}" alt="" style="width: 15% !important; margin-left: 16%; margin-right: 15px;">
                            <span>{{ $val->specification }}</span>
                            <br><br>
                            @endforeach
                        </div>
                    </div>
                    <div class="btn-bestseller-overlay" style="border-radius: 6px;"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: rgb(16, 158, 158) ; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
                </div>
            </div>
            @endforeach
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