@extends('frontend.component.master')

@section('header')
<meta name="description" content="Gallery Derma Express.">
<link rel="canonical" href="http://derma-express.com/gallery/show">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/gallery/show" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Suasana dan Perawatan Derma di Sini." />

<title>Derma Express - Gallery</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix">
    <div class="container clearfix container-gallery">

        <!-- Portfolio Filter
        ============================================= -->
        <div class="portfolio-filter style-2 center clearfix filter-box" data-container="#portfolio" id="boxmenu">

            <!-- <li class="activeFilter" id="menu-item-gallery"><a href="#" data-filter="*">Show All</a></li> -->
            @foreach($category as $row)
                @if($row->category != "Profile")
                    <li id="menu-item-gallery"><a href="#" data-filter=".pf-{{ str_replace(' ', '-', $row->category) }}">{{ $row->category }}</a></li>
                @endif
            @endforeach

        </div>
        <!-- #portfolio-filter end -->
    </div>

    <!-- Portfolio Items
    ============================================= -->
    <div class="container">
        <div class="container">
            <div id="portfolio" class="portfolio grid-container portfolio-nomargin clearfix">

                @foreach($category as $row)
                    @if($row->category != "Profile")
                        @foreach($row->getGallery as $item)
                            @php
                                if ($item->image != null) {
                                    $url_asset = asset('assets/admin/assets/media/derma_gallery/') ."/". $item->image;
                                    $thumbnail = asset('assets/admin/assets/media/derma_gallery/') ."/". $item->image;
                                    $hover_text = "Open Image";
                                } else {
                                    $url_asset = $item->embed;
                                    $thumbnail = "http://img.youtube.com/vi/".explode("v=",$item->embed)[1]."/mqdefault.jpg";
                                    $hover_text = "Watch Video";
                                }
                            @endphp

                            <article class="portfolio-item pf-media pf-{{ str_replace(' ', '-', $row->category) }}" style="border: 1px solid rgb(101, 181, 170);">
                                <div class="portfolio-image">
                                    <a href="{{ $url_asset }}" data-lightbox="gallery">
                                        <div id="item-gallery" style ="background-image:url({{ $thumbnail }})"></div>
                                        <div class="portfolio-overlay">
                                            <div class="portfolio-desc">
                                                <h3>{{ $hover_text }}</h3>
                                            </div>
                                        </div>    
                                    </a>
                                </div>
                            </article>

                        @endforeach
                    @endif
                @endforeach
        
            </div>
        </div>
    </div>
   
    <!-- #portfolio end -->
</div>
@endsection